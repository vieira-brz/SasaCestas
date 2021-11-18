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
            <style>
                .container-car {
                    width: 100%;
                    height: 65vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                button {
                    color: white;
                    border: none;
                    margin-top: 20px;
                    padding: 10px 15px;
                    border-radius: 4px;
                    background: var(--effect);
                }
                button:hover { background: var(--vermelho); }


                .car {
                    height: 100%;
                    display: flex;
                    max-height: 300px;
                    margin: 20px 40px;
                    border-radius: 4px;
                    align-items: center;
                    padding: 0 20px 0 0;
                    justify-content: center;
                    background: var(--background2);
                    -webkit-box-shadow: 0 0 10px #00000030;
                }
                .car .car-header img {
                    width: 100%;
                    border-top-left-radius: 4px;
                    border-bottom-left-radius: 4px;
                }
                
                .car-body { padding: 0 0 0 20px; }

                .texto { height: 36px; overflow: hidden; text-overflow: ellipsis; }
                
                .config-pagamento { display: flex; margin-top: 20px; align-items: center; } 

                .config-pagamento select {
                    width: 60%;
                    border: none;
                    padding: 10px; 
                    border-radius: 4px;
                    margin: 0 0 0 15px;
                    border: 1px solid #d3d3d3;
                    background: var(--background);
                }

                @media (max-width: 765px) {
                    .config-pagamento { align-items: start; flex-direction: column; justify-content: flex-start; }
                    select { margin: 10px 0 0 0 !important; }
                }
            </style>

            <div class="container-car">
                <div class="car">
                    <div class="car-header"> <img src="../img/loader.gif"> </div>
                    <div class="car-body">
                        <div>
                            <h4>NOME DA CESTA</h4>  
                            <h5 class="texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias sed repellat, perspiciatis quidem nisi optio blanditiis quis porro autem impedit dolorum non voluptates aliquid incidunt ex expedita laudantium, dolores assumenda?</h5>
                        </div>
                        <div class="config-pagamento">
                            <h4>SELECIONE A FORMA DE PAGAMENTO</h4> 
                            <select name="meio-pagamento">
                                <option value="#">Selecione um item...</option>
                                <option value="pix">PIX</option>
                                <option value="debito">Cartão de débito</option>
                                <option value="credito">Cartão de crédito</option>
                                <option value="dupla">Cartão de débito/crédito</option>
                            </select>
                        </div>
                        <button name="comprar">CONFIRMAR COMPRA</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include_once 'template/modals.html'; ?>
</body>
</html>