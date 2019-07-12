<?php
class Cl_base{
    private $at_host = DB_HOST;
    private $at_usuario = DB_USER;
    private $at_password = DB_PASS;
    private $at_base = DB_DB;


    private $at_con;
    private $at_sql;
    private $at_error;

    public function __construct(){
        //conexion configurar
        $dsn = "mysql:host" . $this->at_host . ';dbname' . $this->at_base;

        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //instancioar pdo
        try{
            $this->at_con = new PDO($dsn, $this->at_usuario, $this->at_password, $opciones);

            $this->at_con->exec('set names: utf-8');
        }catch(PDOException $e){
            $this->at_error = $e->getMessage();
            echo $this->at_error;
        } 
    }

}