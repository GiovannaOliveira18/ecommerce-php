<nav>
    <?php 
    include "util.php";
    include "cabecalho.php";

      if ( $sessaoConectado ) {

          $idSessao = session_id();
          
          if ($_SESSION['admin'] == true ) {
            echo "
                <a href='index.php'><i class='fa-solid fa-house'></i> Home</a>
                <a href='produtos.php'><i class='fa-solid fa-store'></i> Produtos</a>
                <a href='carrinho.php'><i class='fa-solid fa-cart-shopping'></i> Carrinho</a>
                <a> <i class='fa-solid fa-crown'></i> Olá, $login | ID: <b>$idSessao</b> </a>
                <a href='usuarios.php'><i class='fa-solid fa-users'></i> Usuários </a>
                <a href='insertAdmin.php'><i class='fa-solid fa-user-tie'></i> Admin </a>
                <a href='logout.php'><i class='fa-solid fa-right-from-bracket'></i>Sair</a> 
            ";  
          }
          else {
            echo "
                <a href='index.php'><i class='fa-solid fa-house'></i> Home</a>
                <a href='carrinho.php'><i class='fa-solid fa-cart-shopping'></i> Carrinho</a>
                <a> <i class='fa-solid fa-user'></i> Olá, $login | ID: <b>$idSessao</b> </a>
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