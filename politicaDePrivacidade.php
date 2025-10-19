<?php
// politicaDePrivacidade.php
// UTF-8
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EcoLuxo - Política de Privacidade</title>

  <!-- Estilos -->
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="stylePoliticaDePrivacidade.css">
  <link rel="stylesheet" href="styleFooter.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <!-- ===== HEADER ===== -->
  <header>
    <div class="logo">
      <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="80px">
    </div>

    <nav>
      <a href="index.php"><i class="fa-solid fa-house"></i> Home</a>
      <a href="Produtos.php"><i class="fa-solid fa-store"></i> Produtos</a>
      <a href="Carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
      <a href="login.php"><i class="fa-solid fa-user"></i> Login</a>
    </nav>

    <div class="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>

  <!-- ===== CONTEÚDO PRINCIPAL ===== -->
  <main class="politica-container">

    <section class="politica-hero">
      <h1>Política de Privacidade</h1>
      <p class="subtitulo">Última atualização: <?php echo date('d/m/Y'); ?></p>
    </section>

    <section class="politica-content">
      <h2>1. Introdução</h2>
      <p>
        Bem-vindo(a) à EcoLuxo. Esta Política de Privacidade descreve como coletamos, usamos,
        armazenamos e protegemos os dados pessoais dos clientes e visitantes do nosso site.
        Ao utilizar nossos serviços ou visitar o site, você concorda com as práticas descritas aqui.
      </p>

      <h2>2. Dados que coletamos</h2>
      <ul>
        <li><strong>Dados fornecidos por você:</strong> nome, e-mail, telefone, endereço de entrega, CPF (quando necessário para emissão de nota), informações de pagamento (via provedor de pagamento).</li>
        <li><strong>Dados de navegação:</strong> IP, tipo de dispositivo, sistema operacional, páginas visitadas, tempo de permanência, origem do acesso.</li>
        <li><strong>Cookies e tecnologias similares:</strong> para manter sessão, personalizar a experiência e melhorar a navegação.</li>
      </ul>

      <h2>3. Finalidades do tratamento</h2>
      <ul>
        <li>Processar pedidos, entregas e devoluções;</li>
        <li>Emitir notas fiscais e cumprir obrigações legais;</li>
        <li>Comunicar status do pedido, promoções e novidades (quando houver consentimento);</li>
        <li>Melhorar nossos serviços, analisar tráfego e prevenir fraudes;</li>
        <li>Atender solicitações de suporte ao cliente.</li>
      </ul>

      <h2>4. Base legal</h2>
      <p>
        Tratamos dados pessoais com base nas hipóteses previstas na Lei Geral de Proteção de Dados (LGPD):
        execução de contrato, cumprimento de obrigação legal, consentimento do titular e interesses legítimos.
      </p>

      <h2>5. Compartilhamento de dados</h2>
      <ul>
        <li>Prestadores de serviço (transportadoras, gateways de pagamento, plataformas de email marketing);</li>
        <li>Autoridades públicas, quando exigido por lei;</li>
        <li>Parceiros técnicos para análise e hospedagem.</li>
      </ul>

      <h2>6. Segurança</h2>
      <p>
        Adotamos medidas técnicas e organizacionais compatíveis com o mercado para proteger os dados pessoais.
        Nenhum método de transmissão pela internet ou armazenamento eletrônico é 100% seguro.
      </p>

      <h2>7. Retenção dos dados</h2>
      <p>
        Reteremos seus dados pelo tempo necessário para cumprir as finalidades descritas nesta política,
        obrigações legais/fiscais, ou enquanto houver relação contratual e interesse legítimo.
      </p>

      <h2>8. Cookies e preferências</h2>
      <p>
        Usamos cookies para melhorar a experiência, lembrar preferências e analisar visitas. Você pode bloquear cookies,
        mas algumas funcionalidades podem ser impactadas.
      </p>

      <h2>9. Direitos do titular</h2>
      <ul>
        <li>Confirmação da existência de tratamento;</li>
        <li>Acesso aos dados;</li>
        <li>Correção de dados incompletos ou desatualizados;</li>
        <li>Anonimização, bloqueio ou eliminação de dados desnecessários;</li>
        <li>Portabilidade dos dados;</li>
        <li>Revogação do consentimento;</li>
        <li>Informação sobre compartilhamento com terceiros.</li>
      </ul>

      <h2>10. Dados de menores</h2>
      <p>
        Nosso site não coleta dados pessoais de menores de 18 anos sem consentimento dos responsáveis.
        Caso haja coleta sem autorização, tomaremos medidas para remoção.
      </p>

      <h2>11. Alterações nesta política</h2>
      <p>
        Podemos atualizar esta política periodicamente. A versão mais recente estará sempre disponível nesta página.
      </p>

      <h2>12. Contato</h2>
      <ul>
        <li><strong>E-mail:</strong> ecoluxocti@gmail.com</li>
        <li><strong>Telefone/WhatsApp:</strong> (14) 98765-4321</li>
        <li><strong>Endereço:</strong> (inserir se houver)</li>
      </ul>
    </section>
  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="rodape">
    <div class="footer-container">
      <div class="footer-coluna">
        <h3>ECO LUXO</h3>
        <p>Sua lojinha virtual</p>
      </div>
      <div class="footer-coluna">
        <h4>Institucional</h4>
        <ul>
          <li><a href="QuemSomos.php">Sobre nós</a></li>
        </ul>
      </div>
      <div class="footer-coluna">
        <h4>Ajuda</h4>
        <ul>
          <li><a href="QuemSomos.php" id="contato">Contato</a></li>
          <li><a href="PoliticaDePrivacidade.php">Política de Privacidade</a></li>
        </ul>
      </div>
      <div class="footer-pagamentos">
        <h4>Formas de Pagamento</h4>
        <div class="pagamentos-icones">
          <img src="https://cdn-icons-png.flaticon.com/512/639/639365.png" alt="Dinheiro" title="Dinheiro" style="width:25px;height:25px;">
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2025 Giovanna, Henrique Hikaru, Guilherme, Jefferson, Renan, Matheus Sgorlon. Todos os direitos reservados.</p>
    </div>
  </footer>

  <!-- JS para menu toggle -->
  <script>
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('nav');

    menuToggle.addEventListener('click', () => {
      nav.classList.toggle('active');
    });
  </script>
</body>
</html>
