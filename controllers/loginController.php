<?php
include_once('models/db.php');
include_once ('models/Usuario.php');
include_once ('models/UsuarioSession.php');

$usuarioSession = new UsuarioSession();
$usuario = new Usuario();


if(isset($_SESSION['usuario'])){
    echo "hay sesion";
    $usuario->setUser($usuarioSession->getCurrentUser());
    //include_once 'views/home.php';

}else if(isset($_POST['cargo']) && isset($_POST['pwd'])){
    
    $cargoForm = $_POST['cargo'];
    $passForm = $_POST['pwd'];
    $pinForm = $_POST['pin'];


    $usuario = new Usuario();
    if($usuario->validarUsuario($cargoForm, $passForm, $pinForm)){
        echo "Existe el usuario";
        $usuarioSession->setCurrentUser($cargoForm);
        $usuario->setUser($cargoForm);

        include_once 'views/home.php';
        
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'views/login.php';
    }
}else{
    //echo "login";
    include_once 'views/login.php';
}





?>