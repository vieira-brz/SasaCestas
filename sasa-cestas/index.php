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
    <div class="over-modal none">
        <?php include_once 'template/cabecalho.html'; ?>
    
        <main>
        </main>
    </div>
    <?php include_once 'template/modals.html'; ?>
</body>
</html>