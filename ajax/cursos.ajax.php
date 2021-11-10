<?php

require_once "../controladores/cursos.controlador.php";
require_once "../modelos/cursos.modelo.php";

class AjaxUsuarios{

	public $idCurso

	public function ajaxEditarCurso(){

			$item = "id";
			$valor = $this->idCurso;
			$respuesta = ControladorCursos::ctrMostrarCursos($item, $valor);
			echo json_encode($respuesta);
	}

	if(isset($_POST["idCurso"])){
	$editar = new AjaxCursos();
	$editar -> idCurso = $_POST["idCursos"];
	$editar -> ajaxEditarCurso();

}

}