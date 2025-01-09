  <?php

include_once 'conectar.php';

class Livro
{
    private $cod_livro;
    private $titulo;
    private $categoria;
    private $isbn;
    private $idioma;
    private $qtdepag;
    private $conn;

    public function getCod_Livro()
    {
        return $this->cod_livro;
    }

    public function setCod_Livro($cod_livro)
    {
        $this->cod_livro = $cod_livro;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getISBN()
    {
        return $this->isbn;
    }

    public function setISBN($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getIdioma()
    {
        return $this->idioma;
    }

    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }

    public function getQtdePag()
    {
        return $this->qtdepag;
    }

    public function setQtdePag($qtdepag)
    {
        $this->qtdepag = $qtdepag;
    }

    // Métodos para interação com o banco de dados

    public function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro values (null, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $this->titulo, PDO::PARAM_STR);
            $sql->bindParam(2, $this->categoria, PDO::PARAM_STR);
            $sql->bindParam(3, $this->isbn, PDO::PARAM_STR);
            $sql->bindParam(4, $this->idioma, PDO::PARAM_STR);
            $sql->bindParam(5, $this->qtdepag, PDO::PARAM_INT);
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
            $sql = $this->conn->prepare("SELECT * FROM livro WHERE cod_livro = ?");
            @$sql->bindParam(1, $this->cod_livro, PDO::PARAM_INT);
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
            $sql = $this->conn->prepare("UPDATE livro SET titulo = ?, categoria = ?, isbn = ?, idioma = ?, qtdepag = ? WHERE cod_livro = ?");
            $sql->bindParam(1, $this->titulo, PDO::PARAM_STR);
            $sql->bindParam(2, $this->categoria, PDO::PARAM_STR);
            $sql->bindParam(3, $this->isbn, PDO::PARAM_STR);
            $sql->bindParam(4, $this->idioma, PDO::PARAM_STR);
            $sql->bindParam(5, $this->qtdepag, PDO::PARAM_INT);
            $sql->bindParam(6, $this->cod_livro, PDO::PARAM_INT);
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
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from livro where titulo like ?");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            $sql ->execute();
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
            $sql = $this->conn->prepare("DELETE FROM livro WHERE cod_livro = ?");
            $sql->bindParam(1, $this->cod_livro, PDO::PARAM_INT);
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
            $sql = $this->conn->query("SELECT cod_livro, titulo, categoria, isbn, idioma, qtdepag FROM livro ORDER BY titulo");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta " . $exc->getMessage();
        }
    }
}

?>
