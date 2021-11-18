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
    <!-- <script src="../js/sobre.js"></script> -->

    <title>Sasa Cestas | Pedidos</title>
</head>
<body id="app">

    <!-- MOJS CONFIG -->
    <script src="plugins/node_modules/@mojs/core/dist/mo.umd.js"></script>
    <script src="js/mo.config.js"></script>

    <div class="over-modal">
        <?php include 'template/cabecalho.html'; ?>
    
        <main>

            <?php if ($acesso != 'MASTER') { ?>
                
                <center id="etapas-pedido-titulo"> 
                    <h2>ETAPAS DO PEDIDO</h2>
                </center>

                <div class="container-rastreador">
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">PEDIDO ENVIADO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">CONFIRMADO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">SAIU PRA ENTREGA</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">CHEGADA NO DESTINO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">ENCERRADO</div> </div>
                </div>
            <?php } ?>

            <?php if ($acesso == 'MASTER') { ?>

                <table>
                    <thead>
                        <th>#</th>
                        <th>PEDIDO</th>
                        <th>PREÇO</th>
                        <th>ENDEREÇO</th>
                        <th>AÇÕES</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1231</td>
                            <td>CESTA DE CU</td>
                            <td>R$ 49.9</td>
                            <td>RUA CU D EBUNDA DO CARALHO DO MUNDO</td>
                            <td><button name="ver-etapas">ETAPA PEDIDO <i class="fas fa-truck-loading"></i> </button></td>
                        </tr>
                    </tbody>
                </table>

                <div class="container-rastreador none">
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">PEDIDO ENVIADO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">CONFIRMADO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">SAIU PRA ENTREGA</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">CHEGADA NO DESTINO</div> </div>
                    <div class="dot"> <i class="fas fa-check-circle"></i> <div class="status-pedido">ENCERRADO</div> </div>
                </div>

            <?php } ?>

        </main>
    </div>

    <?php include_once 'template/modals.html'; ?>
</body>
</html>