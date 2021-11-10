<?php 
	require_once "conexion.php";

	class ModeloUsuarios {

		static public function mdlEditarUsuario($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,password=:password,perfil=:perfil,nota=:nota WHERE usuario=:usuario");
			$stmt -> bindParam(":nombre", $datos['nombre'],PDO::PARAM_STR);
			$stmt -> bindParam(":usuario", $datos['usuario'],PDO::PARAM_STR);
			$stmt -> bindParam(":password", $datos['password'],PDO::PARAM_STR);
			$stmt -> bindParam(":perfil", $datos['perfil'],PDO::PARAM_STR);
			$stmt -> bindParam(":nota", $datos['nota'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlMostrarUsuarios($tabla,$item,$valor){
			
			if($item!=null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt ->execute();
				return $stmt ->fetch();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt ->execute();
				return $stmt->fetchAll();
			}	


			$stmt ->close();
			$stmt = null;
		}

		static public function mdlIngresarUsuario ($tabla,$datos){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, nacimiento, edad, nota) VALUES (:nombre, :usuario, :password, :perfil, :nacimiento, :edad, :nota)");


					$stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
					$stmt -> bindParam(":usuario", $datos["usuario"],PDO::PARAM_STR);
					$stmt -> bindParam(":password", $datos["password"],PDO::PARAM_STR);
					$stmt -> bindParam(":perfil", $datos["perfil"],PDO::PARAM_STR);
					$stmt -> bindParam(":nacimiento", $datos["nacimiento"],PDO::PARAM_STR);
					$stmt -> bindParam(":edad", $datos["edad"],PDO::PARAM_STR);
					$stmt -> bindParam(":nota", $datos["nota"],PDO::PARAM_STR);
					
				if($stmt->execute()){
							
						return "ok";
				}else{
						
						return "error";

				}

				$stmt->close();
				$stmt = null;
	 	}

	 	static public function mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
			$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;

		}

	 		static public function mdlBorrarUsuario($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
			$stmt -> bindParam(":id",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}
	}


