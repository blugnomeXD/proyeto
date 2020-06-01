<?php

    require_once('Usuario.php');
    require_once('../PHPMailer/class.phpmailer.php');
    require_once('../PHPMailer/class.smtp.php');


    class Administrador extends Usuario{

        public function __construct(){

            parent::__construct();
        }


        /*  Funciones para trabajar con el usuario */

        public function listarUsuarios(){

                $sql = "SELECT * FROM usuario";
                $result = $this->conn->query($sql);

                    if ($result->num_rows > 0) {

                        $usuario = $result->fetch_all(MYSQLI_ASSOC);

                        return $usuario;
                    }

                    $this->conn->close();
                 }
    
 
        public function eliminarUsuario($id){

                    $sql = "DELETE FROM usuario WHERE id =?";

                    
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bind_param('i',$id);
                        $stmt->execute();
                    
                $stmt->close();
                $this->conn->close();        
        }  


        public function editarUsuario($id,$nia,$password,$nombre,$apellidos,$email,$telefono,$tipo,$especialidad,$bolsa){

            $sql = "UPDATE usuario SET nia=? , password=? , nombre= ? , apellidos=? , email=? ,telefono=? ,tipo_usuario=?, 
                                        especialidad_estudio=? , bolsa_ofertas=? WHERE id = ?";
            

               $stmt = $this->conn->prepare($sql);
               $stmt->bind_param('issssisssi',$nia,$password ,$nombre,$apellidos,$email,$telefono,$tipo,$especialidad,$bolsa,$id);
               $stmt->execute();      
               
               $stmt->close();
               $this->conn->close();
        
         }    
                    
            /*  Funciones para trabajar con ofertas */

        public function listarOfertas(){
                
                $sql = "SELECT * FROM ofertas_empleo";
                   
                   $result = $this->conn->query($sql);
   
                    if ($result->num_rows > 0) {
   
                          $oferta = $result->fetch_all(MYSQLI_ASSOC);
   
                        return $oferta;
                   }                    
                           $this->conn->close();
   
             }

             public function listarOferta($id){

                $sql = "SELECT  id_oferta,titulo,fecha_publicacion,empresa,email_empresa,sector,localidad,descripcion_oferta,
                                  estado_oferta  FROM ofertas_empleo WHERE id_oferta = ?";

                $result = $this->conn->prepare($sql);
                 $result->bind_param('i',$id);
                 $result->execute();   
                 $result->bind_result($id_oferta,$titulo,$fecha,$empresa,$email,$sector,$localidad,$descripcion,$estado);
                 $result->fetch();

                 $datos = array($id_oferta,$titulo,$fecha,$empresa,$email,$sector,$localidad,$descripcion,$estado);
                 return $datos;
                 
                 $result->close();
                 $this->conn->close();
         }


         public function historialInscripcion(){
                
            $sql = "SELECT historial.id_usuario,ofertas_empleo.id_oferta, titulo, empresa, email_empresa, sector, localidad, historial.fecha_inscripcion 
            FROM ofertas_empleo 
            INNER JOIN historial 
            ON ofertas_empleo.id_oferta=historial.id_oferta";
            
               
               $result = $this->conn->query($sql);

                if ($result->num_rows > 0) {

                      $historial = $result->fetch_all(MYSQLI_ASSOC);

               }                    
                       $this->conn->close();
                       
              return $historial;

         }

        public function eliminarOferta($id){

                $sql = "DELETE FROM ofertas_empleo WHERE id_oferta =?";

                
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param('i',$id);
                    $stmt->execute();
                
                        $stmt->close();
                        $this->conn->close();        
        } 


        public function editarOferta($id_oferta,$titulo,$empresa,$email_empresa,$sector,$localidad,$descripcion_oferta,$estado,$subject,$body){

            $sql = "UPDATE ofertas_empleo SET titulo = ? , empresa = ? , email_empresa = ? , sector = ? , 
                                       localidad = ? , descripcion_oferta = ? , estado_oferta = ?  WHERE id_oferta = ?";
            

               $stmt = $this->conn->prepare($sql);
               $stmt->bind_param('sssssssi',$titulo,$empresa,$email_empresa,$sector,$localidad,$descripcion_oferta,$estado,$id_oferta);
               $check =  $stmt->execute();      
              
              if($check) {
                  
             $sql = "SELECT DISTINCT usuario.email           
             FROM usuario
             INNER JOIN historial
             ON usuario.id = historial.id_usuario
             WHERE historial.id_oferta=$id_oferta";

            $stmt = $this->conn->query($sql);
            $email = $stmt->fetch_all(MYSQLI_ASSOC);

            $stmt->close();
            $this->conn->close();
            
            $mail = new PHPMailer(); // create a new object
                    
            foreach( $email  as  $emails ){
                
                 $mail->IsSMTP(); // enable SMTP
                 $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                 $mail->SMTPAuth = true; // authentication enabled
                 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                 $mail->Host = "smtp.gmail.com";
                 $mail->Port = 465; // or 587
                 $mail->IsHTML(true);
                 $mail->Username = "corominesempleo@gmail.com";
                 $mail->Password = "corominesempleo20";
                 $mail->SetFrom($emails['email']);
                 $mail->Subject = $subject;
                 $mail->Body = $body;
                 $mail->AddAddress($emails['email']);
                 $mail->send();
                 $mail->ClearAddresses();
        
            } 
        }
              
        
         }   

         public function agregarOferta($titulo,$empresa,$email_empresa,$sector,$localidad,$descripcion_oferta,$nombreImg,$destino){
        
            $sql = "INSERT INTO ofertas_empleo (titulo, empresa, email_empresa, sector, localidad,descripcion_oferta,imagen_oferta,RUTA)     
            VALUES (?,?,?,?,?,?,?,?)";
                                
        $stmt= $this->conn->prepare($sql);

            $stmt->bind_param('ssssssss',$titulo,$empresa ,$email_empresa,$sector,$localidad,$descripcion_oferta,$nombreImg,$destino);

                $stmt->execute();
                $stmt->close();
                
         }


         public function getEmail($titulo,$cuerpo,$empresa){

            $sql = "SELECT usuario.email FROM usuario WHERE usuario.tipo_usuario = 'usuario' AND usuario.bolsa_ofertas ='activado' 
                     UNION 
                    SELECT ofertas_empleo.email_empresa FROM ofertas_empleo WHERE ofertas_empleo.empresa = '$empresa';";
            
                   
            $result = $this->conn->query($sql);

             if ($result->num_rows > 0) {

                $email = $result->fetch_all(MYSQLI_ASSOC);

            }                    
                    $this->conn->close();
                    
                    $mail = new PHPMailer(); // create a new object
                    
            foreach( $email  as  $emails ){
                
                 $mail->IsSMTP(); // enable SMTP
                 $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                 $mail->SMTPAuth = true; // authentication enabled
                 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                 $mail->Host = "smtp.gmail.com";
                 $mail->Port = 465; // or 587
                 $mail->IsHTML(true);
                 $mail->Username = "corominesempleo@gmail.com";
                 $mail->Password = "corominesempleo20";
                 $mail->SetFrom($emails['email']);
                 $mail->Subject = $titulo;
                 $mail->Body = $cuerpo;
                 $mail->AddAddress($emails['email']);
                 $mail->send();
                 $mail->ClearAddresses();
                    
            }      
         }
        }
  
   

    
?>