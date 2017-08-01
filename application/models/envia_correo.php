<?php

$correo_usuario =$_POST["correo_usuario"];
// Varios destinatarios
$para  = 'edubega_0707@hotmail.com'; // atención a la coma

// título
$asunto = 'Recordatorio de cumpleaños para Agosto';


// mensaje
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales

$cabeceras .= 'From: ' . $correo_usuario . " \r\n";
$cabeceras .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$cabeceras .= "Mime-Version: 1.0 \r\n";

 if (mail($para, $asunto, $mensaje, $cabeceras))
  {
       echo "Se encio Correo";  
  } 
  else 
  {
        echo "No se envio nada";
  } 


?>