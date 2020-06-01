<?php

require_once('../conexion/Conexion.php');


    Class Usuario extends Conexion{

                protected $nia;
                protected $password;
                protected $nombre;
                protected $apellidos;
                protected $email;
                protected $telefono;
                protected $especialidad;


            public function __construct(){

                parent::__construct();
            }

        
           public function registro($nia,$password,$nombre,$apellidos,$email,$telefono,$especialidad){

                        $sql = "INSERT INTO usuario (nia, password,nombre,apellidos,email,telefono,especialidad_estudio)     
                            VALUES (?,?,?,?,?,?,?)";
                                                
                        $stmt= $this->conn->prepare($sql);
  
                    $stmt->bind_param('issssis',$nia,$password ,$nombre,$apellidos,$email,$telefono,$especialidad);
                
                       $resultado = $stmt->execute();
                      
                        $stmt->close();
                        $this->conn->close();

                return  $resultado;
         }


        public function mostrarPerfil($id){
                
            $sql = "SELECT id,nia,password,nombre,apellidos,email,telefono,tipo_usuario,especialidad_estudio,bolsa_ofertas FROM usuario WHERE id = ?";
            $result = $this->conn->prepare($sql);
            $result->bind_param('i',$id);
            $result->execute();
            $result->bind_result($id,$nia,$password,$nombre,$apellidos,$email,$telefono,$tipo,$especialidad,$bolsa);
            $result->fetch();

            $datos = array($id,$nia,$password,$nombre,$apellidos,$email,$telefono,$tipo,$especialidad,$bolsa);
                return $datos;
                $result->close();
                $this->conn->close();
            
        }
    
          
        public function bajaUsuario($nia,$password){

                    $sql = "DELETE FROM usuario WHERE nia=? AND password = ?";

                        $stmt = $this->conn->prepare($sql);
                        $stmt->bind_param('is',$nia,$password);
                        $stmt->execute();
                    
                $stmt->close();
                $this->conn->close();        
        }

         
             public function Actualizar($id,$nia,$password,$nombre,$apellidos,$email,$telefono,$especialidad,$estado_bolsa ){


               $sql = "UPDATE usuario SET nia=? , password=? , nombre= ? , apellidos=? , email=? ,telefono=? , especialidad_estudio=? , bolsa_ofertas=? WHERE id = ?";
               

                  $stmt = $this->conn->prepare($sql);
                  $stmt->bind_param('issssissi',$nia,$password ,$nombre,$apellidos,$email,$telefono,$especialidad,$estado_bolsa,$id);
                  $stmt->execute();      
                  
                  $stmt->close();
                  $this->conn->close();
                  
                 } 
                 
                 public function listarHistorial($id_usuario){

                    $sql = "SELECT ofertas_empleo.id_oferta, titulo, empresa, email_empresa, sector, localidad, historial.fecha_inscripcion,ofertas_empleo.estado_oferta 
                    FROM ofertas_empleo INNER JOIN historial ON ofertas_empleo.id_oferta=historial.id_oferta WHERE historial.id_usuario = $id_usuario ;";
                    
                            $result = $this->conn->query($sql);

                    if ($result->num_rows > 0) {
    
                          $perfil = $result->fetch_all(MYSQLI_ASSOC);
    
                        return $perfil;
                   }                    
                           $this->conn->close();
             }
   
        }
      
     
?>