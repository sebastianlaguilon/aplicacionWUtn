

<?php

require_once('../controladores/formularios.controlador.php');
require_once('../modelos/formularios.modelos.php');

/*==== Clase de AJAX ====*/

class AjaxFormularios
{

/*==== VALIDAR DATOS ====*/

	public $validarBoleta;
	public $validarImpote;
	public $validarCategoria;

	public function ajaxValidarEmail()
	{

		$item = "n_boleta";
		$valor = $this->validarBoleta;

		$item1 = "importe";
		$valor1 = $this->validarImpote;

		$item2 = "id_categoria";
		$valor2 = $this->validarCategoria;



		$respuesta = ControladorFormularios::ctrValidarGastos($item, $valor, $item1, $valor1, $item2, $valor2);
		


		echo json_encode($respuesta);
	}
}


/*===== Objeto de AJAX que recibe la variable POST ====*/


if (isset($_POST["validarBoleta"]) && isset($_POST["validarImporte"])) {

	$validar = new AjaxFormularios();
	$validar->validarBoleta = $_POST["validarBoleta"];
	$validar->validarImpote = $_POST["validarImporte"];
	$validar->validarCategoria = $_POST["validarCategoria"];
	$validar->ajaxValidarEmail();
}
