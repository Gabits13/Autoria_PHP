<?php
ob_start();  // Inicia o buffer de saída
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar PHP</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body class="custom-bg">
    <nav id="navbar" class="navbar fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <i class="bi bi-bell-fill bell-icon" id="bell-icon"></i>
            <a class="navbar-brand mx-auto" href="menu.html">
              <img src="img/bookicon.png" alt="Logo da Empresa" class="d-inline-block align-middle">
              <span id="logo-texto"></span>
            </a>
            <button style="color: white;" class="navbar-toggler" type="button" id="menu-toggler" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
              <i style="color: white;" class="bi bi-list"></i>
            </button>
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
    <div class="back-button" id="back-button">
    <i class="bi bi-arrow-right"></i> Voltar
    </div>
    <br><br>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="menu.html">
                <i class="bi bi-house"></i> Página Principal
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="livroDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-book"></i> Livro
            </a>
            <ul class="dropdown-menu" aria-labelledby="livroDropdown">
                <li><a class="dropdown-item" href="cadastrar_livro.php">Cadastrar</a></li>
                <li><a class="dropdown-item color-especial" href="listar_livro.php">Listar</a></li>
                <li><a class="dropdown-item" href="excluir_livro.php">Excluir</a></li>
                <li><a class="dropdown-item" href="alterar_livro.php">Alterar</a></li>
                <li><a class="dropdown-item" href="consultar_livro.php">Pesquisar</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="autorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i> Autor
            </a>
            <ul class="dropdown-menu" aria-labelledby="autorDropdown">
                <li><a class="dropdown-item" href="cadastrar_autor.php">Cadastrar</a></li>
                <li><a class="dropdown-item color-especial" href="listar_autor.php">Listar</a></li>
                <li><a class="dropdown-item" href="excluir_autor.php">Excluir</a></li>
                <li><a class="dropdown-item" href="alterar_autor.php">Alterar</a></li>
                <li><a class="dropdown-item" href="consultar_autor.php">Pesquisar</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="autoriaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-pencil"></i> Autoria
            </a>
            <ul class="dropdown-menu" aria-labelledby="autoriaDropdown">
                <li><a class="dropdown-item" href="cadastrar_autoria.php">Cadastrar</a></li>
                <li><a class="dropdown-item color-especial" href="listar_autoria.php">Listar</a></li>
                <li><a class="dropdown-item" href="excluir_autoria.php">Excluir</a></li>
                <li><a class="dropdown-item" href="#">Alterar</a></li>
                <li><a class="dropdown-item" href="consultar_autoria.php">Pesquisar</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4 mt-4">Alteração de Autorias Cadastrados</h1>
        <fieldset class="border p-4 mt-2">
            <legend class="w-auto"><b>Alterar Autoria</b></legend>

            <?php
                $txtcod= $_POST["txtcod"];
                $txtcod2= $_POST["txtcod2"];
                include_once 'autoria.php';
                $p = new Autoria();
                $p->setCod_Autor($txtcod);
                $p->setCod_Livro($txtcod2);
                $pro_bd=$p-> alterar();


            ?>
             <form name="cliente" method="post" action="">
             <?php
             
                foreach($pro_bd as $pro_mostrar)
                {

             ?>
                <input name="txtcod" type="hidden" class="form-control" id="txtcod" value = '<?php echo $pro_mostrar[0]  ?>' >
                <b><?php echo "Código do Autor: " . $pro_mostrar[0]; ?></b> <br><br>
                <input name="txtcod2" type="hidden" class="form-control" id="txtcod2" value = '<?php echo $pro_mostrar[1]  ?>' >
                <b><?php echo "Código do Livro: " . $pro_mostrar[1]; ?></b> <br><br>

               <b> <label for="txteditoralabel" class="form-label">Editora:</label></b>
                <input name="txteditora" type="text" class="form-control mb-3" id="txteditora" value = '<?php echo $pro_mostrar[3]  ?>' > 
              <b>  <label for="txtsdatelabel" class="form-label">Data de Lançamento: </label></b>
                <input name="txtdate" type="text" class="form-control mb-3" id="txtdate" value = '<?php echo $pro_mostrar[2]  ?>' >

                

<?php

             }
             ?>
        </fieldset>
        <br>
        <fieldset class="border p-4">
            <legend class="w-auto"><b>Opções:</b></legend> <br>
            <button name="btnalterar" type="submit" class="btn btn-primary">Alterar</button>
            <button name="Voltar" class="btn btn-secondary"> <a style="text-decoration: none; color: white;" href="alterar_autoria.php">Voltar</a></button>
            <button name="Listar" class="btn btn-secondary"> <a style="text-decoration: none; color: white;" href="listar_autoria.php">Listar</a></button>
        </fieldset>
    </form>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnalterar)) {
            include_once 'autoria.php';
            $pro = new Autoria();
            $pro->setEditora($txteditora);
            $pro->setData_Lancamento($txtdate);
            $pro->setCod_Autor($txtcod);
            $pro->setCod_Livro($txtcod2);
            echo "<h3 class='mt-4'>" . $pro->alterar2() . "</h3>";
            header("Location: alterar_autoria.php");
            exit();  // Encerra a execução após o redirecionamento
        }
    ?>

<div class="text-center mt-4">
        <a href="menu.html" class="btn btn-primary">Voltar pro menu</a>
    </div>


<script src= "js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
ob_end_flush();  // Libera o conteúdo do buffer e encerra
?>