<?php
//autocarga de archivos (librerias prueba)
spl_autoload_register(function($ruta){
    echo ("$ruta" . ".php");
});

require_once("library/Cl_base.php");
require_once("library/Cl_controlador.php");
require_once("library/Cl_core.php");