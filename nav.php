<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<nav>
    <?php 
    // include "util.php";
    include "cabecalho.php";

      if ( $sessaoConectado ) {

          $idSessao = session_id();
          
          if ($_SESSION['admin'] == true ) {
            echo "
                <a> <i class='fa-solid fa-crown'></i> Olá, $login  </a>
                <a href='index.php'><i class='fa-solid fa-house'></i> Home</a>
                <a href='produtos.php'><i class='fa-solid fa-truck-fast'></i>Produtos</a>
                <a href='carrinho.php'><i class='fa-solid fa-cart-shopping'></i>Carrinho</a>
                <a href='usuarios.php'><i class='fa-solid fa-users'></i> Usuários </a>
                <a href='insertAdmin.php'><i class='fa-solid fa-user-tie'></i> Admin </a>
                <a href='logout.php'><i class='fa-solid fa-right-from-bracket'></i>Sair</a>                
            ";  
          }
          else {
            echo "
                <a> <i class='fa-solid fa-user'></i> Olá, $login </a>
                <a href='index.php'><i class='fa-solid fa-house'></i> Home</a>
                <a href='carrinho.php'><i class='fa-solid fa-cart-shopping'></i> Carrinho</a>
                <a href='logout.php'><i class='fa-solid fa-right-from-bracket'></i>Sair</a> 
            ";
          }
          

      } else {
          echo "    
              
                  <a href='index.php'><i class='fa-solid fa-house'></i> Home</a>
                  <a href='carrinho.php'><i class='fa-solid fa-cart-shopping'></i> Carrinho</a>
                  <a href='login.php'><i class='fa-solid fa-user'></i> Login</a>
              
          ";
      }
    ?>
    </nav>


