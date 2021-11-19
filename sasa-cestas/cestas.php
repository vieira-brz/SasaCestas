<?php include 'verifySession.php'; if ($acesso != 'MASTER') { header('Location: http://localhost/SasaCestas/sasa-cestas/'); } ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/cestas.css">

    <?php include 'template/head.html'; ?>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- JAVASCRIPT -->
    <script src="../js/cestas.js"></script>

    <title>Sasa Cestas | Sobre</title>
</head>
<body id="app">

    <!-- MOJS CONFIG -->
    <script src="plugins/node_modules/@mojs/core/dist/mo.umd.js"></script>
    <script src="js/mo.config.js"></script>

    <div class="over-modal">
        <?php include 'template/cabecalho.php'; ?>
    
        <main>
            <div class="formulario">
                
                <div class="input-field">
                    <div class="text-field">
                    <input autocomplete="off" type="text" placeholder="..." name="nome" required>
                    <label>Insira o nome da cesta:</label>
                    </div>
                    <small class="entrar-usuario none">* Campo email/usuário obrigatório</small>
                </div>

                <div class="input-field">
                    <div class="text-field">
                    <input autocomplete="off" type="text" placeholder="..." name="desc" required>
                    <label>Escreva uma breve descrição dos ingredientes da cesta:</label>
                    </div>
                    <small class="entrar-usuario none">* Campo email/usuário obrigatório</small>
                </div>
                
                <div class="input-field">
                    <div class="text-field">
                    <input autocomplete="off" type="number" step=".1" placeholder="..." name="valor" required>
                    <label>Qual o valor da cesta?</label>
                    </div>
                    <small class="entrar-usuario none">* Campo email/usuário obrigatório</small>
                </div>
                
                <div class="input-field">
                    <div class="text-field">
                    <input autocomplete="off" type="file" placeholder="..." name="valor" required style="border: 2px solid var(--effect) !important;">
                    <label>Escolha a foto referente á cesta:</label>
                    </div>
                    <small class="entrar-usuario none">* Campo email/usuário obrigatório</small>
                </div>

                <button name="enviarForm">CADASTRAR CESTA &nbsp <i class="fas fa-save"></i> </button>
            </div>
        </main>
    </div>

    <?php include_once 'template/modals.html'; ?>
</body>
</html>