<?php
    class Connection{
        public static function Connect(){
            define('server','localhost');
            define('database','wayne_sale');
            define('username','root');
            define('password','');
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            try{
                $conection = new PDO("mysql:host=".server."; dbname=".database, username, password, $options);
                return $conection;
            }catch(Exception $e){
                die("Erro de conexão: ". $e->getMessage());
            }
        }
    }
    