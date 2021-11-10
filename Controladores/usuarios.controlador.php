<?php 
	
	class ControladorUsuarios{

		static public function ctrEditarUsuario(){
			if(isset($_POST['editarUsuario'])){
				if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+$/',$_POST['editarNombre'])){

					$tabla = "usuarios";
					if($_POST['editarPassword']!=""){
						if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['editarPassword'])){
							$salt = md5($_POST['editarPassword']);
							$passwordEncriptado = crypt($_POST['editarPassword'],$salt);
						}else{
							echo"<script>
							Swal.fire({ 
								title: 'Error!',
								text: '¡No puedes usar caraceres especiales en el campo contraseña!',
								icon: 'error',
								confirmButtonText:'Ok'
								});
							</script>";
						}
						
					}else{
						$passwordEncriptado = $_POST['passwordActual'];
					}

					$datos = array("nombre"=>$_POST['editarNombre'],
									"usuario"=>$_POST['editarUsuario'],
									"password"=>$passwordEncriptado,
									"perfil"=>$_POST['editarPerfil'],
									"nota"=>$_POST['editarNota']);


					$respuesta  = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
					if($respuesta=="ok"){
						echo"<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡El usuario ha sido actualizaddo correctamente!',
								icon: 'success',
								confirmButtonText:'Ok'
								}).then((result)=>{
									if(result.value){
										window.location = 'usuarios';
									}
								})
						</script>";
					}
				}else{
					echo"<script>
							Swal.fire({ 
								title: 'Error!',
								text: '¡No puedes usar caraceres especiales en el campo nombre!',
								icon: 'error',
								confirmButtonText:'Ok'
								})
						</script>";
				}
				}
		}

		static public function ctrCrearUsuario(){
			if(isset($_POST['nuevoUsuario'])){
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevoNombre'])&&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoUsuario'])&&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoPassword'])){


					$tabla = "usuarios";
					$salt = md5($_POST['nuevoPassword']);
					$passwordEncriptado = crypt($_POST['nuevoPassword'],$salt);
					$datos = array("nombre" => $_POST['nuevoNombre'],
						"usuario" => $_POST['nuevoUsuario'],
						"password" => $passwordEncriptado,
						"perfil" => $_POST['nuevoPerfil'],
						"nacimiento" => $_POST['nuevoNacimiento'],
						"edad" => $_POST['nuevoEdad'],
						"nota" => $_POST['nuevoNota']);
					$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);
						if($respuesta =="ok"){

							echo ("<script>

							Swal.fire({
									  title: 'Success!',
									  text: '¡Registro Exitoso!',
									  icon: 'success',
									  confirmButtonText: 'Ok'
								
									});

						    </script>");

						}

				}else{
					//echo ('<script>alert ("ingreso");</script>');
					echo ("<script>

						Swal.fire({
								  title: 'Error!',
								  text: '¡No puedes usar caraacteres especiales!',
								  icon: 'error',
								  confirmButtonText: 'Ok'
							
								});

					</script>");
				}
			}
		}

		static public function ctrIngresar(){
			if (isset($_POST['ingUsuario'])) {
				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUsuario'])&&preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])){
					$tabla = "usuarios";
					$item = "usuario";
					$valor = $_POST['ingUsuario']; 
					$salt = md5($_POST['ingPassword']);
					$passwordEncriptado = crypt($_POST['ingPassword'],$salt);
					$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
					if($respuesta['usuario']==$_POST['ingUsuario']&&$respuesta['password']==$passwordEncriptado){
						$_SESSION['iniciarSesion']="ok";
						$_SESSION['nombre']=$respuesta['nombre'];
						$_SESSION['usuario']=$respuesta['usuario'];
						$_SESSION['perfil']=$respuesta['perfil'];
						$_SESSION['usuario']=$respuesta['usuario'];
						$_SESSION['nacimiento']=$respuesta['nacimiento'];
						$_SESSION['edad']=$respuesta['edad'];
						
						echo '<script>
							window.location = "inicio";
							</script>';
					}else{
						echo ("<div class='alert alert-danger'>Errot al ingresar al sistema</div>");

					}
				}
			}
		}


		static public function ctrBorrarUsuario(){
			if(isset($_GET['idusuario'])){
				$tabla = "usuarios";
				$datos = $_GET['idusuario'];
					$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla,$datos);
					if($respuesta=="ok"){
						echo"<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡El usuario ha sido actualizaddo correctamente!',
								icon: 'success',
								confirmButtonText:'Ok'
								}).then((result)=>{
									if(result.value){
										window.location = 'usuarios';
									}
								})
						</script>";
					}
				
			}
		}

		static public function ctrMostrarUsuarios($item,$valor){
			$tabla="usuarios";
			$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
			return $respuesta;
		}
	}