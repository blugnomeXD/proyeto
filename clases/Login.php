<?php
    require_once('../conexion/Conexion.php');

    class Login extends Conexion{

     protected $nia;
     protected $password;

            public function __construct(){
               
                parent::__construct();
 
            }

    public function login($nia,$password){

        $sql = "SELECT id, nia,password,nombre,tipo_usuario FROM usuario WHERE nia = ? AND password = ?";

           
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('is',$nia,$password);
            $stmt->bind_result($id,$nia,$password,$nombre,$tipo_usuario);
            $stmt->execute(); 


            if($stmt->fetch()){  
                    session_start();  
                    $_SESSION['$nia'] = $nia;
                    $_SESSION['$tipo_usuario'] = $tipo_usuario;
                    $_SESSION['$id'] = $id;
                    $_SESSION['$nombre'] = $nombre;
                    return true;
            }else{

               // header('Location: ../index.php');
            }
            
        $stmt->close();
        $this->conn->close();
     }  

        public function validarLogin($nia){

            if( !isset($_SESSION['$id']) ){
                header("Location:../index.php");
                exit();
            }      
        }

        public function logout(){
            
            session_unset();
            session_destroy();
        }

    }
    
?>