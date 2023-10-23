<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administrador.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/fechas.controlador.php";
require_once "controladores/formularios.controlador.php";

require_once "modelos/administrador.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/fhechas.modelo.php";
require_once "modelos/formularios.modelos.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();






