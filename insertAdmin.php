<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        nome completo<br>
        <input type="text" name="nome"><br>
        usuario<br><br>
        <input type="text" name="usuario"><br>
        senha<br><br>
        <input type="password" name="senha"><br>
        <input type="submit" value="enviar">
    </form>
</body>
</html>

<?php 
    if ( $_POST ) {
        
        include "util.php";
        
        $conn = conecta();

        $nome    = $_POST['nome'];
        $usuario = $_POST['usuario'];

        $senha   =  password_hash($_POST['senha'],PASSWORD_DEFAULT);

        $insert = $conn->prepare("insert into usuario (nome,email,senha,admin) values
                                (:nome,:usuario,:senha,true)");

        $insert->bindParam(":nome",$nome);
        $insert->bindParam(":usuario",$usuario);
        $insert->bindParam(":senha",$senha);

        if ( $insert->execute() ) {
            echo "Admin $nome criado com sucesso !";
        }
    }
    

?>