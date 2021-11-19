<?php

include 'config/diretorio.php';
include $diretorio .'\\models\\Pedidos.php';

$pedidos = new Pedidos;

if (!empty($_POST))
{
    $controle = $_POST['control'];
    
    switch ($controle) 
    {
        case 'inserir':
    
            $retorno = $pedidos->cadastrar($_POST);
    
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível cadastrar este endereço! Tente novamente.';
            }
        break;

        case 'deletar':
    
            $retorno = $pedidos->deletar($_POST);
    
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível cadastrar este endereço! Tente novamente.';
            }
        break;

        case 'confirmar':
    
            $retorno = $pedidos->confirmar($_POST);
    
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível cadastrar este endereço! Tente novamente.';
            }
        break;

        case 'carregarTabela':
            $retorno = $pedidos->tabelaMaster();
    
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