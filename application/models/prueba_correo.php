
<?php 
$correo_usuario =$_POST["correo_usuario"];
$contenido= '<html>'.
'<head> '.
'<title>SOLICITUD DE TABLETA</title>'.
'</head> '.
'<body> '.
'<h3> “TU SOLICITUD HA SIDO ENVIADA CONEXITO”</h3>'.
'<br> '.
'<br>'.
'<b>Favor estar al pendiente del estado de tu evento para saber si fue aceptado o rechazado</b>'.
'<p>Recuerda que el prestamo de tableta es solo en en un dia habil '.
'</p>'.
'</body> '.
'</html> ';
    
     $destinatario="edubega_0707@hotmail.com";   // Digite el destinatario de la dirección de correo aquí 
     $subject = "Solicitud de Prestamo de tableta"; 
     $cabeceras = 'MIME-Version: 1.0' . "\r\n";// texto 
     $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // su dirección de correo válido aquí 
     $cabeceras .=  'From: ASESOR<'.$correo_usuario.'>';

       //$message_body = "Este es un correo de prueba del Webmaster."; 
       mail($destinatario,$subject,$contenido,$cabeceras); 

       echo "su correo ha sido enviado con éxito"; 

 ?>
