<?php
    session_start();

    class Conectar{
        protected $dbh; // variable protejida data base host

        protected function Conexion(){
            try {
                $conexion = $this-> dbh = new PDO("mysql:local=localhost;dbname=ticket_sistem", "root", ""); // declaramos la variable connection y hacemos la conexion
                return $conexion;
            } catch(Exception $e) {
                print "!Error in DB connection".$e-> getMessage()."<br/>";
                die();
            }

        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        static public function ruta(){ 
            return "http://localhost/sistem-ticket/";
        }        
        
        // static public function ruta(){ 
        //     return "http://soporte.matiasnzamora.com.ar/";
        // }

        // probar ruta para deploy.

    };

?>