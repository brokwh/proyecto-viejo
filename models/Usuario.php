<?php
include_once 'db.php';

class Usuario extends DB{
    private $nombre;
    private $username;
    


    public function validarUsuario($user, $pass, $pin){
        //$md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE tipo = :user AND pwd = :pass OR pin = :pin');
        $query->execute(['user' => $user, 'pass' => $pass, 'pin' => $pin] );

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE tipo = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['tipo'];
            $this->username = $currentUser['user'];
        }

           echo $this->nombre = $currentUser['tipo'];


    }

    public function getNombre(){
        return $this->nombre;
    }
}

?> 