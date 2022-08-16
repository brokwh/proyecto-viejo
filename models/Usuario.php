<?php
class Usuario{

    private $conn;
    private $usuario;

    public function __construct(){
        require_once("Models/db.php");
        $this->conn=db::conexion();
        $this->usuario = array();
    }

    public function getUsuario(){
        $sql = "SELECT * FROM usuarios";
        $query = mysqli_query($this->conn, $sql);
        
        while($filas = mysqli_fetch_array($query)){
            $this->usuario[] = $filas;
        }
        return $this->usuario;
    }
//se definen los atributos y etodos de cada clase del dominio
}
?>  