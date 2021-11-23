<?php include 'verifySession.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/pedidos.css">

    <?php include 'template/head.html'; ?>

    <!-- JAVASCRIPT -->
    <script src="../js/pedidos.js"></script>

    <title>Sasa Cestas | Pedidos</title>
</head>
<body id="app">

    <!-- MOJS CONFIG -->
    <script src="plugins/node_modules/@mojs/core/dist/mo.umd.js"></script>
    <script src="js/mo.config.js"></script>

    <div class="over-modal">
        <?php include 'template/cabecalho.php'; ?>
    
        <main>

            <button class="none" name="voltarBtn"> <i class="fas fa-arrow-left"></i> VOLTAR </button>

            <?php if ($acesso != 'MASTER') { ?>
                
                <center id="etapas-pedido-titulo"> 
                    <h2>ETAPAS DO PEDIDO</h2>
                </center>
                
                <div class="container-rastreador none">
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">PEDIDO ENVIADO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">CONFIRMADO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">SAIU PRA ENTREGA</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">CHEGADA NO DESTINO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">ENCERRADO</div> </div>
                </div>
            <?php } ?>

            <center> <div class="loading loading-gif"> <img src="../img/loader.gif" alt="Sem dados..."> </div> </center>
            <center> <div class="loading loading-no-data none"> <img src="../img/smile.png" alt="Sem dados...">  <h1>Todos os pedidos foram entregues!</h1> </div> </center>

            <table id="tabela-master" class="none">
                <thead>
                    <th>#</th>
                    <th>PEDIDO</th>
                    <th>PREÇO</th>
                    <th>ENDEREÇO</th>
                    <th>AÇÕES</th>
                </thead>
                <tbody> </tbody>
            </table>

            <?php if ($acesso == 'MASTER') { ?>
                
                <div class="container-rastreador none">
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">PEDIDO ENVIADO</div> </div>
                    <div class="dot"> <button class="none" onclick="confirmar('confirmar')">CONFIRMAR ETAPA</button> <i class="fas fa-check-circle"></i> <div class="status-pedido">CONFIRMADO</div> </div>
                    <div class="dot"> <button class="none" onclick="confirmar('saida')">CONFIRMAR ETAPA</button> <i class="fas fa-check-circle"></i> <div class="status-pedido">SAIU PRA ENTREGA</div> </div>
                    <div class="dot"> <button class="none" onclick="confirmar('chegada')">CONFIRMAR ETAPA</button> <i class="fas fa-check-circle"></i> <div class="status-pedido">CHEGADA NO DESTINO</div> </div>
                    <div class="dot"> <button class="none" onclick="confirmar('encerrar')">ENCERRAR ENTREGA</button> <i class="fas fa-check-circle"></i> <div class="status-pedido">ENCERRADO</div> </div>
                </div>

            <?php } ?>

        </main>
    </div>

    <?php include_once 'template/modals.html'; ?>
</body>
</html>