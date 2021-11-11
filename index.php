<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">
  
    <!-- FONTAWESOME -->
    <script src="plugins/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- JQUERY -->
    <script src="plugins/jquery/jquery.js"></script>

    <!-- JQUERY -->
    <script src="plugins/mask/mask.js"></script>

    <!-- NOTY ALERT -->
    <link href="plugins/node_modules/noty/lib/noty.css" rel="stylesheet">
    <link href="plugins/node_modules/noty/lib/themes/mint.css" rel="stylesheet">
    <script src="plugins/node_modules/noty/lib/noty.js"></script>
    <script src="js/notifier.js"></script>

    <!-- JAVASCRIPT -->
    <script src="js/login.js"></script>

    <title>Sasa Cestas</title>
</head>
<body id="app">
  
    <!-- MOJS CONFIG -->
    <script src="plugins/node_modules/@mojs/core/dist/mo.umd.js"></script>
    <script src="js/mo.config.js"></script>
    
    <!-- APPLICATION -->
    <div class="container">
    <div class="forms-container">
      <div class="entrar-cadastrar">

      <!-- LOGIN FORM -->
        <form class="entrar-form">
          <h2 class="titulo">ENTRAR</h2>
                    
          <div class="input-field">
            <div class="text-field">
              <input autocomplete="off" type="text" placeholder="..." name="email" required>
              <label>Insira seu email ou usuário:</label>
            </div>
            <small class="entrar-usuario none">* Campo email/usuário obrigatório</small>
          </div>
          
          <div class="input-field">
            <div class="text-field">
              <input autocomplete="off" type="password" placeholder="..." name="senha" required>
              <label>Insira sua senha:</label>
            </div>
            <small class="entrar-senha none">* Campo senha obrigatório</small>
          </div>
          
          <button type="button" class="btn solid" name="logar" onclick="entrar('entrar')"> ACESSAR </button>
          
          <p class="social-texto">Entre em contato pelas redes sociais</p>
          
          <div class="redes-sociais">
            <a href="#" class="redes-sociais-icones"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="redes-sociais-icones"><i class="fab fa-twitter"></i></a>
            <a href="#" class="redes-sociais-icones"><i class="fab fa-google"></i></a>
            <a href="#" class="redes-sociais-icones"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </form>

        <!-- CADASTRO FORM -->
        <form class="cadastrar-form">
          <h2 class="titulo">CADASTRO</h2>

          <div class="input-field">
            <div class="text-field">
              <input autocomplete="off" type="email" placeholder="..." name="email" required>
              <label>Digite seu email:</label>
            </div>
            <small class="cadastrar-email none">* Campo email obrigatório</small>
          </div>

          <div class="input-field">
            <div class="text-field">
              <input autocomplete="off" type="text" placeholder="..." name="usuario" required>
              <label>Digite seu nome de usuário:</label>
            </div>
            <small class="cadastrar-usuario none">* Campo usuário obrigatório</small>
          </div>

          <div class="input-field">
            <div class="text-field">
              <input autocomplete="off" type="password" placeholder="..." name="senha" required>
              <label>Digite sua senha:</label>
            </div>
            <small class="cadastrar-senha none">* Campo senha obrigatório</small>
          </div>

          <button type="button" class="btn" onclick="entrar('cadastrar')"> CONFIRMAR </button>
          
          <p class="social-texto">Entre em contato pelas redes sociais</p>
          
          <div class="redes-sociais">
            <a href="#" class="redes-sociais-icones"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="redes-sociais-icones"><i class="fab fa-twitter"></i></a>
            <a href="#" class="redes-sociais-icones"><i class="fab fa-google"></i></a>
            <a href="#" class="redes-sociais-icones"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </form>
      </div>
    </div>

    <!-- EFEITO DESLIZAR TRANSITIONS -->
    <div class="painel-container">

        <!-- LOGIN CONTAINER -->
       <div class="panel left-panel">
          <div class="content">
            <h3> Novo aqui ? </h3>
            <p> Clique no botão abaixo para se cadastrar e receber novidades, promoções, ofertas e mais! </p>
            <button class="btn transparent" onclick="scrollToCadastro()"> CADASTRAR-SE </button>
          </div>
          <img src="assets/login.svg" class="image" alt="" />
        </div>

        <!-- CADASTRO CONTAINER -->
        <div class="panel right-panel">
          <div class="content">
            <h3> Um de nós ? </h3>
            <p> Clique no botão abaixo caso ainda já possua uma conta e continue por dentro das novidades junto conosco. </p>
            <button class="btn transparent" onclick="scrollToLogin()"> ENTRAR </button>
          </div>
          <img src="assets/cadastro.svg" class="image" alt="" />
        </div>
      </div>    
    </div>
</body>
</html>