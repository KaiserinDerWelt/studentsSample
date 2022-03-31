<?php

if ($_POST['g-recaptcha-response'] == '') {
echo "Captcha invalido";
} else {
$obj = new stdClass();
$obj->secret = "6Lchay8fAAAAAJW2UWPREEQf2cce35R2DCgPn7hZ";
$obj->response = $_POST['g-recaptcha-response'];
$obj->remoteip = $_SERVER['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify';

$options = array(
'http' => array(
'header' => "Content-type: application/x-www-form-urlencoded\r\n",
'method' => 'POST',
'content' => http_build_query($obj)
)
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$validar = json_decode($result);

/* FIN DE CAPTCHA */

if ($validar->success) {
$form3Example1c = trim($_POST['form3Example1c']);
$form3Example1c2 = trim($_POST['form3Example1c2']);
$form3Example3c = trim($_POST['form3Example3c']);
$form3Example4c = trim($_POST['form3Example4c']);
$form3Example4cd = trim($_POST['form3Example4cd']);

$consulta = "Nombre: " . $form3Example1c . " Rol: " . $form3Example1c2 . " Email: " . $form3Example3c;

mail("desjmariana@gmail.com", "Contacto desde Formulario", $consulta);
} else {
echo "Captcha invalido";
}
}
?>