<?php
    require_once('../conexion/Conexion.php');
    require '../PHPMailer/class.phpmailer.php';
    require '../PHPMailer/class.smtp.php';

    class Email {

   

            public function __construct(){
        
            }

        public function envioEmail($email,$titulo,$cuerpo){

            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "corominesempleo@gmail.com";
            $mail->Password = "corominesempleo20";
            $mail->SetFrom($email);
            $mail->Subject = $titulo;
            $mail->Body = $cuerpo;
            $mail->AddAddress($email);
   
               if(!$mail->Send()) {
               echo "Mailer Error: " . $mail->ErrorInfo;
               } else {
               echo "Message has been sent";
               }
        }

        }
    
?>