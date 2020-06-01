
<?php
    require_once('../conexion/Conexion.php');
    require_once('Email.php');
    class Oferta extends Conexion{

      protected $titulo;
      protected $empresa;
      protected $empresa_email;
      protected $sector;
      protected $localidad;
      protected $descripcion;
      
            public function __construct(){
               
                parent::__construct();
 
            }

 public function listarOfertasSector($sector){

                $sql = "SELECT * FROM ofertas_empleo WHERE sector = '$sector' ";

               $result = $this->conn->query($sql);

                if ($result->num_rows > 0) {

                      $perfil = $result->fetch_all(MYSQLI_ASSOC);

                      return $perfil;
               }                    
                       $this->conn->close();

                       
         }

    public function ofertaCompleta($id){
        
        $sql = "SELECT id_oferta,titulo,fecha_publicacion,empresa,email_empresa,sector,localidad,descripcion_oferta,
                                  estado_oferta  FROM ofertas_empleo WHERE id_oferta = ?";

                $result = $this->conn->prepare($sql);
                 $result->bind_param('i',$id);
                 $result->execute();   
                 $result->bind_result($id,$titulo,$fecha,$empresa,$email,$sector,$localidad,$descripcion,$estado);
                 $result->fetch();

                 $datos = array($id,$titulo,$fecha,$empresa,$email,$sector,$localidad,$descripcion,$estado);
                 return $datos;
                 
                 $result->close();
                 $this->conn->close();
    }

    public function insertarOferta($id_oferta,$id_usuario){

        $sql = "SELECT  id_oferta,id_usuario FROM historial WHERE id_oferta = ? AND id_usuario = ?";

                $stmt = $this->conn->prepare($sql);
                 $stmt->bind_param('ii',$id_oferta,$id_usuario);
                 $stmt->execute();    
                 $stmt->store_result();  
                 
                 $row_cnt = $stmt->num_rows;

                    if($row_cnt == 1){
       
                        return true; 
                    }
                    else{
                            
                        //SI NO ES TRUE,  INGRESAREMOS EL USUARIO Y CONTINUAMOS CON EL EMAIL

                    $sql = "INSERT INTO historial (id_oferta, id_usuario)     
                             VALUES (?,?)";
                                        
                            $stmt= $this->conn->prepare($sql);
                            $stmt->bind_param('ii',$id_oferta,$id_usuario );
                            $stmt->execute();

                                
                 // CONSEGUIR EL EMAIL DE LA EMPRESA  y DATOS DEL USUARIO

                $sql = "SELECT ofertas_empleo.email_empresa,ofertas_empleo.titulo, usuario.nia, usuario.nombre, usuario.apellidos, usuario.email, usuario.especialidad_estudio
                FROM ofertas_empleo      
                INNER JOIN historial 
                ON historial.id_oferta = ofertas_empleo.id_oferta
                INNER JOIN usuario 
                ON historial.id_usuario=usuario.id
                WHERE ofertas_empleo.id_oferta =? AND usuario.id=? ; ";


                $stmt= $this->conn->prepare($sql);
                $stmt->bind_param('ii',$id_oferta,$id_usuario );
                $stmt->execute();
                $stmt -> bind_result($email_empresa,$titulo_oferta,$nia,$nombre,$apellidos,$email_usuario,$especialidad);     
                $stmt -> fetch();

                //PREPARAMOS EL  EMAIL PARA LA EMPRESA
                $mailing = new Email;

                $subject_empresa = "Nuevo usuario inscrito a la oferta  $titulo_oferta ";
                $body_empresa =  "
                    <html> 
                        <body> 
                            <h2>Usuario Inscrito a la oferta</h2> 
                                    <p><strong>Nia:</strong> $nia</p>
                                    <p><strong>Nombre:</strong> $nombre</p>
                                    <p><strong>Apellidos:</strong> $apellidos</p>
                                    <p><strong>Email:</strong> $email_usuario </p>  
                                    <p><strong>Especialidad:</strong> $especialidad</p>  
                        </body> 
                    </html>";

                    //Email Enviado a la Empresa
                        $mailing->envioEmail($email_empresa,$subject_empresa,$body_empresa);


                        $subject_usuario = "Te has inscrito correctamente";     
                    $body_usuario =  "
                    <html> 
                        <body> 
                                <h3>¡Hola $nombre  $apellidos !</h3>
                            <p>Le informamos que se ha inscrito correctamente a la oferta de Empleo $titulo_oferta </p>
                            <p><strong>Mucha suerte ! !</strong></p> 
                        </body> 
                    </html>";

                    //Email Enviado al Usuario
                    $mailing->envioEmail($email_usuario,$subject_usuario,$body_usuario);
                  }

                $stmt->close();  
                $this->conn->close();
                
        }
      
            }
  
 
?>