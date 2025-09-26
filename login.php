<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ECO LUXO</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="100px">
        </div>
        
    </header>

    <main class="login-container">
        <div class="login-box">
            <h2>Bem Vindo(a) de volta!</h2>
            <p>Faça seu Login e volte às compras</p>

            <form method="post" action="">
                <label for="usuario">Usuário</label>
                <input name="login" type="text" id="usuario" placeholder="Digite seu usuário">

                <label for="senha">Senha</label>
                <input name="senha" type="password" id="senha" placeholder="Digite sua senha">

                <button type="submit" class="btn-login" >Entrar</button>
            </form>

            <p class="criar">Ou crie uma nova conta e comece agora!</p>
            <a href="cadastro.php" class="btn-criar">CRIAR NOVA CONTA</a>
            <br><a href="index.php" class="btn-voltar"> Voltar </a>

        </div>

    </main>
</body>
</html>

<?php
    include ("cabecalho.php");

    $_SESSION['sessaoConectado'] = false;
    $_SESSION['sessaoLogin'] = "";

    if ( isset($_COOKIE['loginCookie']) ) {
        $loginCookie = $_COOKIE['loginCookie'];
    }
    else {
        $loginCookie = '';
    }

    if ( $_POST ) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        setcookie('loginCookie', $login, time()+86400);

        if ( $login == 'user@email' && $senha == '123' ) {
            $_SESSION['sessaoConectado'] = true;
            $_SESSION['sessaoLogin'] = $login;

            header('Location: index.php');
        }

        else { ?>
            <!-- echo "<b>Usuario ou senha invalidos!!</b>
            <br><br><a href='index.php'>Voltar</a>"; -->
                <script>
                    alert("Usuário ou senha incorreta!!");
                </script>
            <?php
        }
    }

    

?>

