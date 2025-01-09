<?php

include_once 'conectar.php';

class Autor
{
    private $cod_autor;
    private $nome_autor;
    private $sobrenome;
    private $email;
    private $data_nascimento;
    private $conn;

    public function getCod_Autor()
    {
        return $this->cod_autor;
    }

    public function setCod_Autor($cod_autor)
    {
        $this->cod_autor = $cod_autor;
    }

    public function getNome_Autor()
    {
        return $this->nome_autor;
    }

    public function setNome_Autor($nome_autor)
    {
        $this->nome_autor = $nome_autor;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getData_Nascimento()
    {
        return $this->data_nascimento;
    }

    public function setData_Nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    // Métodos para interação com o banco de dados

    public function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autor values (null, ?, ?, ?, ?)");
            $sql->bindParam(1, $this->nome_autor, PDO::PARAM_STR);
            $sql->bindParam(2, $this->sobrenome, PDO::PARAM_STR);
            $sql->bindParam(3, $this->email, PDO::PARAM_STR);
            $sql->bindParam(4, $this->data_nascimento, PDO::PARAM_STR);
            if($sql->execute() == 1)
            {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc)
        {
            echo "Erro ao salvar o registro. " . $exc->getMessage();
        }
       }

    public function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM autor WHERE cod_autor = ?");
            $sql->bindParam(1, $this->cod_autor, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar. " . $exc->getMessage();
        }
    }

    public function alterar2()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("UPDATE autor SET nome_autor = ?, sobrenome = ?, email = ?, data_nascimento = ? WHERE cod_autor = ?");
            @$sql->bindParam(1, $this->getNome_Autor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getData_Nascimento(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getCod_Autor(), PDO::PARAM_INT);
            if($sql->execute() == 1) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar o registro. " . $exc->getMessage();
        }
    }

    public function consultar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM autor WHERE nome_autor LIKE ?");
            $sql->bindParam(1, $this->nome_autor, PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta " . $exc->getMessage();
        }
    }

    public function exclusao()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("DELETE FROM autor WHERE cod_autor = ?");
            $sql->bindParam(1, $this->cod_autor, PDO::PARAM_INT);
            if ($sql->execute()) {
                return "Excluído com sucesso!";
            } else {
                return "Erro na exclusão!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao excluir " . $exc->getMessage();
        }
    }

    public function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("SELECT cod_autor, nome_autor, sobrenome, email, data_nascimento FROM autor ORDER BY nome_autor");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta " . $exc->getMessage();
        }
    }
}
?>

