<?php
include_once 'conectar.php';

class Usuario {
    private $usu;
    private $senha;
    private $conn;

    public function getUsu() {
        return $this->usu;
    }
    public function setUsu($usuario) {
        $this->usu = $usuario;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    function logar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM usuario WHERE login = ? AND senha = ?");
            @$sql->bindParam(1, $this->getUsu(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
}
?>