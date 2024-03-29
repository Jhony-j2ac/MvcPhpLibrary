<?php

//namespace main\app\library
/* Mapear url
1) url
2) metodo
3) parametro
*/

class Cl_core{
    protected $At_Controladoractual = "Cl_paginas";
    protected $At_MetodoActual = "index";
    protected $At_parametros = array();
    
    public function __construct(){
        $url = $this->Mt_getUrl();
        // buscar existencia del controlador
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            //si esta se establece como controlador por defecto
            $this->At_Controladoractual = ucwords($url[0]);
            // print_r ($this->At_Controladoractual);
            //limpio el elemento del arrray;
            unset($url[0]);
        }
        // llamo el controlador con la url desde el index
        require_once '../app/controllers/' . $this->At_Controladoractual . '.php';
        // activo el controlador y llamo la clase
        $this->At_Controladoractual = new $this->At_Controladoractual;
        
        // Verificar el metodo a usar
        if(isset($url[1])){
            //verificar existencia de el metodo
            if(method_exists($this->At_Controladoractual, $url[1])){
                $this->At_MetodoActual = $url[1];
                unset($url[1]);
            }

            $this->At_parametros = $url ? array_values($url) : [];
            // <<print_r($this->At_parametros);            
        }

        call_user_func_array([$this->At_Controladoractual,$this->At_MetodoActual], $this->At_parametros);

    }
    
    public function Mt_getUrl(){
        //echo $_GET['url'];
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
    
}