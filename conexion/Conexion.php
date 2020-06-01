<?php
  
   class Conexion{      

      protected $conn;
      protected $host = 'localhost';
      protected $db = 'gestoria';
      protected $username = 'root';
      protected $password = '';

      public function Conexion(){


         try{
            
            $this->conn = new mysqli($this->host,$this->username,$this->password,$this->db);
            $this->conn->set_charset("utf8");
            
            
         } 
         catch(EXCEPTION $e){
            echo $e;  
         }

      }
}

?>