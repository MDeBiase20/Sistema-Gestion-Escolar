<?php
include('../app/config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND estado = '1'";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
//print_r($usuarios);
$contador_usuario = 0; //para determinar si hay o no información del usuario

foreach($usuarios as $usuario){
    $password_ecriptada = $usuario['password'];
    $contador_usuario++;
}

if ($contador_usuario>0 && (password_verify($password, $password_ecriptada))) {
    session_start();
    $_SESSION['mensaje'] = 'Bienvenido al sistema';
    $_SESSION['icono'] = 'success';

    //Sesión para que primer pase por el login y después a la vista principal
    $_SESSION['sesion_email'] = $email;
    header('Location:'.APP_URL."/admin");
}else{
    session_start();
    $_SESSION['mensaje'] = 'Los datos introducidos son incorrectos';
    header('Location:'.APP_URL."/login");
}
?>