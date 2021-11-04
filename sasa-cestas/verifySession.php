<?php 
    session_start();  
    
    $sessaoAtiva = $_SESSION;

    $acesso = $_SESSION[session_id()]['acesso'];

    if (count($sessaoAtiva) == 0) { header('Location: ../'); }

?>