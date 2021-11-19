<?php

include 'config/diretorio.php';
include $diretorio .'\\models\\Cestas.php';

$cestas = new Cestas;

if (!empty($_POST))
{
    $controle = $_POST['control'];
    
    switch ($controle) 
    {
        case 'cadastrar':
    
            $retorno = $cestas->cadastrar($_POST);
    
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível cadastrar este endereço! Tente novamente.';
            }
        break;

        case 'buscarCestas':
    
            $retorno = $cestas->buscarCestas();
    
            if (is_array($retorno))
            {
                echo json_encode($retorno);
            }
            else 
            {
                echo 'Erro: Não foi possível buscar as cestas! Tente recarregar a página.';
            }
        break;
        
        default:
        break;
    }
}
else { var_dump($_POST); }


?>