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
                <label for="usuario">E-mail</label>
                <input name="usuario" type="text" id="usuario" placeholder="Digite seu e-mail">

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
    /*include ("cabecalho.php");

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
    }*/

    if ( $_POST ) {
        include "util.php";
        session_start();
        setcookie('usuario', $usuario, time() + 86400);
        setcookie('senha', base64_encode($senha), time() + 86400);

        $usuario = $_POST['usuario'];
        $conn = conecta();

        $select = $conn->prepare("select nome,senha,admin 
                                    from usuario 
                                    where email=:usuario");

        $select->bindParam(":usuario",$usuario);


        /*
            OBSERVACAO, ao adotarmos criptografia na senha, 
            lembre que insertUsuario.php precisara passar por uma melhoria:
            (...)
            $senhaCripto = password_hash($senha,PASSWORD_DEFAULT);
            $insert->bindParams(":senha",$senhaCripto);
            (...)
        */

        $senha  = $_POST['senha'];

        $select->execute();
        $linha = $select->fetch();
        
        if ( password_verify($senha,$linha['senha']) ) {
            $_SESSION['statusConectado'] = true;
            $_SESSION['admin'] = $linha['admin'];
            $_SESSION['login'] = $linha['nome'];
            header("location: index.php"); 
        } else {
            $_SESSION['statusConectado'] = false;
            $_SESSION['admin'] = false;
            $_SESSION['login'] = ""; 
            echo "<script>
                    alert('Usuário ou senha incorreta!!');
                </script>";
        }
        
                   
                    
    }   

?>

