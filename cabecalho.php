<?php 
    session_start();

    if ( isset($_SESSION['statusConectado']) ) {

        $sessaoConectado = $_SESSION['statusConectado'];
        $login = $_SESSION['login'];
    } else {
        $sessaoConectado = false;
    }

    

    // if ( $sessaoConectado ) {

    //     $idSessao = session_id();
    //     echo "
    //     <nav>
    //         <a href='index.php'><i class='fa-solid fa-house'></i> Home</a>
    //         <a href='produtos.php'><i class='fa-solid fa-store'></i> Produtos</a>
    //         <a href='carrinho.php'><i class='fa-solid fa-cart-shopping'></i> Carrinho</a>
    //         <a> <i class='fa-solid fa-user'></i> Olá, $login | ID: <b>$idSessao</b> </a>
    //         <a href='logout.php'><i class='fa-solid fa-right-from-bracket'></i>Sair</a> 
    //     </nav>";

    // } else {
    //     echo "    
    //         <nav>
    //             <a href='index.php'><i class='fa-solid fa-house'></i> Home</a>
    //             <a href='carrinho.php'><i class='fa-solid fa-cart-shopping'></i> Carrinho</a>
    //             <a href='login.php'><i class='fa-solid fa-user'></i> Login</a>
    //         </nav>
    //     ";
    // }
    // echo "<hr>";
?>

<a href=""></a>