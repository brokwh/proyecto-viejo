<?php
include_once 'db.php';

class Usuario extends DB{
    private $nombre;
    private $username;


    public function validarUsuario($user, $pass, $pin){
        //$md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE tipo = :user AND pass = :pass OR pin = :pin');
        $query->execute(['user' => $user, 'pass' => $pass, 'pin' => $pin] );

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE tipo = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?> 