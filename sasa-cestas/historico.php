<?php include 'verifySession.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/historico.css">

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
        </main> 
    </div>

    <?php include_once 'template/modals.html'; ?>
</body>
</html>