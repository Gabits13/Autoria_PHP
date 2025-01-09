<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir PHP</title>
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
            <a class="nav-link dropdown-toggle active" href="#" id="autorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i> Autor
            </a>
            <ul class="dropdown-menu" aria-labelledby="autorDropdown">
                <li><a class="dropdown-item" href="cadastrar_autor.php">Cadastrar</a></li>
                <li><a class="dropdown-item color-especial" href="listar_autor.php">Listar</a></li>
                <li><a class="dropdown-item" href="#">Excluir</a></li>
                <li><a class="dropdown-item" href="alterar_autor.php">Alterar</a></li>
                <li><a class="dropdown-item" href="consultar_autor.php">Pesquisar</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="autoriaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-pencil"></i> Autoria
            </a>
            <ul class="dropdown-menu" aria-labelledby="autoriaDropdown">
                <li><a class="dropdown-item" href="cadastrar_autoria.php">Cadastrar</a></li>
                <li><a class="dropdown-item color-especial" href="listar_autoria.php">Listar</a></li>
                <li><a class="dropdown-item" href="excluir_autoria.php">Excluir</a></li>
                <li><a class="dropdown-item" href="alterar_autoria.php">Alterar</a></li>
                <li><a class="dropdown-item" href="consultar_autoria.php">Pesquisar</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4 mt-4">Exclusão de Autores</h1>
    <form name="cliente" method="post" action="" onsubmit="return validateForm()">
        <fieldset class="border p-4 mt-2">
            <legend class="w-auto"><b>Informe o Codigo do Autor desejado:</b></legend>
            <div class="mb-3">
                <label for="txtcod" class="form-label">Código do Autor:</label>
                <input name="txtcod" type="text" class="form-control" id="txtnome" placeholder="Código do Autor">
            </div>
        </fieldset>
        <br>
        <fieldset class="border p-4">
            <legend class="w-auto"><b>Opções:</b></legend> <br>
            <button name="btnenviar" type="submit" class="btn btn-primary">Excluir</button>
            <button name="limpar" type="reset" class="btn btn-secondary">Limpar</button>
        </fieldset>
    </form>

    
    <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnenviar)) {
            include_once 'autor.php';
            $pro = new Autor();
            $pro->setCod_Autor($txtcod);
            echo "<h3 class='mt-4'>" . $pro->exclusao() . "</h3>"; //chamada do metodo e retorno enviado

        

        
        }
    ?>
    <div class="text-center mt-4">
        <a href="menu.html" class="btn btn-primary">Voltar</a>
        <a href="listar_autor.php" class="btn btn-secondary">Ir para a página Listar</a>
    </div>
</div>

<script src= "js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
