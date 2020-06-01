<?php


    include_once('../clases/Email.php');
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];



  $body = " <html> 
    <body> 
        <p style='max-width: 100%; white-space: pre-line;'>$mensaje</p>
        <hr>
        <p> <strong>El email para ponerse en contacto con el usuario es $email  </strong></p>
    </body> 
</html>";

   $mailing = new Email;

 $mailing->envioEmail('detenber@gmail.com',$subject,$body);
?>