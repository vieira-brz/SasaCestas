<?php 
    session_start();  
    
    $sessaoAtiva = $_SESSION;

    if (count($sessaoAtiva) == 0)
    {
        header('Location: ../');
    }

?>