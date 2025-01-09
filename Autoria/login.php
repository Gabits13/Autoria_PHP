<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/loginpage.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos adicionais */
    body  {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url('img/home.jpg'); /* Imagem de fundo */
      background-size: cover;
      background-position: center;
      position: relative;
    }
    .login-container {
      padding: 40px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .invalid-feedback {
      display: none;
    }
    .is-invalid ~ .invalid-feedback {
      display: block;
    }
  </style>
</head>
<body>
<div class="wrapper">
          <form id="loginForm" method="post" class="needs-validation" novalidate>
            <h1>Login</h1>
            
            <!-- Mensagem de sucesso/erro será exibida aqui -->
           
            
            <div class="input-box">
                <input type="text" placeholder="Nome de usuário" id="username" name="txtusu" required>
                <i class='bx bxs-user'></i>
                <div class="invalid-feedback">
                    Nome obrigatório
                </div>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Senha" id="password" maxlength="3" name="txtsenha" required onkeypress="return blockletras(window.event.keyCode)">
                <i class='bx bxs-lock-alt'></i>
                <div class="invalid-feedback">
                    Senha obrigatória
                </div>
            </div>
           
            <button type="submit" name="btnenviar" class="btn">Acessar</button>
            <p class="mt-3 text-danger small">
                *Somente 3 caracteres na senha, sendo eles todos números.<br>
            </p>
            <div class="register-link">
                <p>Não tem uma conta? <a href="#">Crie uma!</a></p>
            </div>
            <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnenviar)) {
                    include_once 'usuario.php';
                    $u = new Usuario();
                    $u->setUsu($txtusu); 
                    $u->setSenha($txtsenha); 
                    $pro_bd = $u->logar();

                    $existe = false;
                    foreach ($pro_bd as $pro_mostrar) {
                        $existe = true;
                        echo "<div class='alert alert-success text-center'><b>Bem Vindo! Usuário: " . $pro_mostrar[0] . "</b></div>"; 
                        echo "<a href='menu.html'><button type='button' name='btnentrar' class='btn btn-primary w-100'>Entrar</button></a>";
                    }
                    if (!$existe) {
                        echo "<div class='alert alert-danger text-center'><b>Login inválido! Tente novamente.</b></div>";
                    }
                }
            }
            ?>
        </form>
    </div>

    <script>
        function blockletras(keypress) {
            // Bloqueia letras no campo senha
            if (keypress >= 48 && keypress <= 57) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <!-- Bootstrap JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>