<?php
	require_once "conexion.php";

	class ModeloCursos {

		static public function mdlEditarCurso($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,descripcion=:descripcion,alumno=:alumno, WHERE curso=:curso");
			$stmt -> bindParam(":nombre", $datos['nombre'],PDO::PARAM_STR);
			$stmt -> bindParam(":descripcion", $datos['descripcion'],PDO::PARAM_STR);
			$stmt -> bindParam(":alumno", $datos['alumno'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlActualizarCurso($tabla,$item1,$valor1,$item2,$valor2){
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

		static public function mdlMostrarCursoss($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt ->fetch();
			$stmt ->close();
			$stmt = null;

		}

		static public function mdlMostrarCursos($tabla,$item,$valor){
			
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

		static public function mdlIngresarCurso($tabla,$datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion, alumno) VALUES (:nombre, :descripcion, :alumno)");


		$stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);
		$stmt -> bindParam(":alumno", $datos["alumno"],PDO::PARAM_STR);
		
		if($stmt->execute()){
					
				return "ok";
		}else{
				
				return "error";

		}

		$stmt->close();
		$stmt = null;
	}


		
	}