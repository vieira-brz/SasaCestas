<?php include 'verifySession.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/inicial.css">

    <!-- GERAL -->
    <?php include_once 'template/head.html'; ?>

    <!-- JS -->
    <script src="../js/inicial.js"></script>

    <!-- TITULO -->
    <title>Sasa Cestas | Bem-vindo <?php echo $_SESSION[session_id()]['usuario']; ?></title>
</head>
<body>
    <div class="over-modal">
        <?php include_once 'template/cabecalho.php'; ?>
        
        <main>
            <div class="not-loader none">
                <!-- OPÇÕES DE AJUDA -->
                <div class="linha-card-options">
                    <div class="linha-card">
                        <div> <div class="texto"> AJUDA </div> </div>
                        <i class="fas fa-question"></i>
                        <a class="linha-card-hover-action"> Visualizar </a>
                    </div>

                    <div class="linha-card">
                        <div> <div class="texto"> WHATSAPP </div> </div>
                        <i class="fab fa-whatsapp"></i>
                        <a class="linha-card-hover-action"> Visualizar </a>
                    </div>

                    <div class="linha-card">
                        <div> <div class="texto"> CUPONS </div> </div>
                        <i class="fas fa-ticket-alt"></i>
                        <a class="linha-card-hover-action"> Visualizar </a>
                    </div>

                    <div class="linha-card">
                        <div> <div class="texto"> SOBRE </div> </div>
                        <i class="fas fa-info"></i>
                        <a class="linha-card-hover-action"> Visualizar </a>
                    </div>
                </div>


                <!-- CESTAS -->
                <div class="cestas"></div>
            </div>
            
            <center> <div class="loading"> <img src="../img/loader.gif" alt="Carregando..."> </div> </center>
        </main>
    </div>
    <?php include_once 'template/modals.html'; ?>
</body>
</html>