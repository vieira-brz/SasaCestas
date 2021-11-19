<?php include 'verifySession.php'; if ($acesso != 'MASTER') { header('Location: http://localhost/SasaCestas/sasa-cestas/'); } ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/estatisticas.css">

    <?php include 'template/head.html'; ?>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- JAVASCRIPT -->
    <script src="../js/estatisticas.js"></script>

    <title>Sasa Cestas | Sobre</title>
</head>
<body id="app">

    <!-- MOJS CONFIG -->
    <script src="plugins/node_modules/@mojs/core/dist/mo.umd.js"></script>
    <script src="js/mo.config.js"></script>

    <div class="over-modal">
        <?php include 'template/cabecalho.php'; ?>
    
        <main>
            <div class="chart container-1">
                <div class="container-chart container-chart-stats">
                    <div class="container-chart-header"> Usuários cadastrados mensalmente <i class="fas fa-ellipsis-v"></i> </div>
                    <div class="container-chart-body">
                        <center class="loading"> <img src="../img/loader.gif" alt="Carregando dados..."> </center>
                        <canvas class="none" id="chart1"></canvas>
                    </div>
                </div>
                <div class="container-chart container-chart-stats">
                    <div class="container-chart-header"> Top 3 pedidos <i class="fas fa-ellipsis-v"></i> </div>
                    <div class="container-chart-body">
                        <center class="loading"> <img src="../img/loader.gif" alt="Carregando dados..."> </center>
                        <canvas class="none" id="chart2"></canvas>
                    </div>
                </div>
            </div>
            <div class="chart container-2">
                <div class="container-chart container-chart-stats">
                    <div class="container-chart-header"> Formas de pagamento <i class="fas fa-ellipsis-v"></i> </div>
                    <div class="container-chart-body">
                        <center class="loading"> <img src="../img/loader.gif" alt="Carregando dados..."> </center>
                        <canvas class="none" id="chart3"></canvas>
                    </div>
                </div>
                <div class="container-chart container-chart-stats">
                    <div class="container-chart-header"> Renda mensal de pedidos<i class="fas fa-ellipsis-v"></i> </div>
                    <div class="container-chart-body">
                        <center class="loading"> <img src="../img/loader.gif" alt="Carregando dados..."> </center>
                        <canvas class="none" id="chart4"></canvas>
                    </div>
                </div>
            </div>
            <!-- <canvas id="chart1"></canvas> -->
        </main>
    </div>

    <?php include_once 'template/modals.html'; ?>
</body>
</html>