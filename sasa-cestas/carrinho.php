<?php include 'verifySession.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/carrinho.css">

    <?php include 'template/head.html'; ?>

    <!-- JAVASCRIPT -->
    <script src="../js/carrinho.js"></script>

    <title>Sasa Cestas | Pedidos</title>
</head>
<body id="app">

    <!-- MOJS CONFIG -->
    <script src="plugins/node_modules/@mojs/core/dist/mo.umd.js"></script>
    <script src="js/mo.config.js"></script>

    <div class="over-modal">
        <?php include 'template/cabecalho.php'; ?>
    
        <main>
            <center> <div class="loading loading-gif"> <img src="../img/loader.gif" alt="Sem dados..."> </div> </center>
            <center> <div class="loading loading-no-data none"> <img src="../img/smile.png" alt="Sem dados..."> <h1>Nada no carrinho!</h1> </div> </center>
            <div class="container-car none"> </div>
        </main>
    </div>

    <?php include_once 'template/modals.html'; ?>
</body>
</html>