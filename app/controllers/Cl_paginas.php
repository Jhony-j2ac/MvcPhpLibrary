<?php

class Cl_paginas extends Cl_controlador{
    public function __construct(){
        //echo 'Paginasc cargada';
    }

    public function index(){
        $datos = ["titulo" => "Bienvenidos a mi sitio mvc"];
        $this->vista('pages/inicio', $datos);
    }

    public function articulo(){
        $this->vista('pages/articulos');
    }

    public function actualizar($idregistro){
        //echo $idregistro;
    }
}