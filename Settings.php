<?php

    class Settings{
        public $host="localhost";
        public $db="stockapp";
        public $user="root";
        public $pwd="mukeshaeric";
        public $con;

        public function DBConnect(){

            try{
                $setting="mysql:host=$this->host;dbname=$this->db";
                $this->con=new PDO($setting,$this->user,$this->pwd);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $this->con;
            }
            catch(PDOException $x){
                echo $x->getMessage();
            }
        }
    }

?>