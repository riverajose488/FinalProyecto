<?php

	class ControladorCursos{

		static public function ctrEditarCurso(){
			if(isset($_POST['editarCurso'])){
				if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+$/',$_POST['editarCurso'])){

					$tabla = "cursos";
					$datos = array("nombre"=>$_POST['editarNombre'],
									"descripcion"=>$_POST['editarDescripcion'],
									"alumno"=>$_POST['editarAlumno']);


					$respuesta  = ModeloCursos::mdlEditarCurso($tabla, $datos);
					if($respuesta=="ok"){
						echo"<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡El Curso ha sido actualizaddo correctamente!',
								icon: 'success',
								confirmButtonText:'Ok'
								}).then((result)=>{
									if(result.value){
										window.location = 'cursos';
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

		static public function ctrCrearCurso(){
			if(isset($_POST['nuevoCurso'])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevoCurso'])&&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoDescripcion'])&&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoAlumno'])){


				$tabla = "cursos";
				$datos = array("nombre" => $_POST['nuevoCurso'],
					"descripcion" => $_POST['nuevoDescripcion'],
					"alumno" => $_POST['nuevoAlumno']);
				$respuesta = ModeloCursos::mdlIngresarCurso($tabla,$datos);
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

		static public function ctrMostrarCursos($item,$valor){
			$tabla="cursos";
			$respuesta = ModeloCursos::mdlMostrarCursos($tabla,$item,$valor);
			return $respuesta;
		}


		static public function ctrBorrarCurso(){
			if(isset($_GET['curso'])){
				$tabla = "cursos";
				$datos = $_GET['idcurso'];
					$respuesta = ModeloCursos::mdlBorrarCurso($tabla,$datos);
					if($respuesta=="ok"){
						echo"<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡El curso ha sido actualizaddo correctamente!',
								icon: 'success',
								confirmButtonText:'Ok'
								}).then((result)=>{
									if(result.value){
										window.location = 'cursos';
									}
								})
						</script>";
					}
				
			}
		}
	}