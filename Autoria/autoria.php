<?php

include_once 'conectar.php';

class Autoria
{
    private $cod_autor;
    private $cod_livro;
    private $editora;
    private $data_lancamento;
    private $conn;

    public function getCod_Autor()
    {
        return $this->cod_autor;
    }

    public function setCod_Autor($cod_autor)
    {
        $this->cod_autor = $cod_autor;
    }

    public function getCod_Livro()
    {
        return $this->cod_livro;
    }

    public function setCod_Livro($cod_livro)
    {
        $this->cod_livro = $cod_livro;
    }

    public function getEditora()
    {
        return $this->editora;
    }

    public function setEditora($editora)
    {
        $this->editora = $editora;
    }

    public function getData_Lancamento()
    {
        return $this->data_lancamento;
    }

    public function setData_Lancamento($data_lancamento)
    {
        $this->data_lancamento = $data_lancamento;
    }

    // Métodos para interação com o banco de dados

    public function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autoria values (?, ?, ?, ?)");
            $sql->bindParam(1, $this->cod_autor, PDO::PARAM_INT);
            $sql->bindParam(2, $this->cod_livro, PDO::PARAM_INT);
            $sql->bindParam(3, $this->editora, PDO::PARAM_STR);
            $sql->bindParam(4, $this->data_lancamento, PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("SELECT * FROM autoria WHERE cod_autor = ?");
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
            $sql = $this->conn->prepare("UPDATE autoria SET editora = ?, data_lancamento = ? WHERE cod_autor = ? AND cod_livro = ?");
            $sql->bindParam(1, $this->editora, PDO::PARAM_STR);
            $sql->bindParam(2, $this->data_lancamento, PDO::PARAM_STR);
            $sql->bindParam(3, $this->cod_autor, PDO::PARAM_INT);
            $sql->bindParam(4, $this->cod_livro, PDO::PARAM_INT);
            if ($sql->execute()) {
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
            $sql = $this->conn->prepare("select * from autoria where editora like ?");
            @$sql-> bindParam(1, $this->getEditora(), PDO::PARAM_STR); 
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
            $sql = $this->conn->prepare("DELETE FROM autoria WHERE cod_autor = ? AND cod_livro = ?");
            $sql->bindParam(1, $this->cod_autor, PDO::PARAM_INT);
            $sql->bindParam(2, $this->cod_livro, PDO::PARAM_INT);
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
            $sql = $this->conn->query("SELECT cod_autor, cod_livro, editora, data_lancamento FROM autoria");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta " . $exc->getMessage();
        }
    }
}
?>
