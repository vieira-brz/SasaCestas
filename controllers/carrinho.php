<?php

include 'config/diretorio.php';
include $diretorio .'\\models\\Carrinho.php';

$carrinho = new Carrinho;

if (!empty($_POST))
{
    $controle = $_POST['control'];
    
    switch ($controle) 
    {
        case 'inserir':
    
            $retorno = $carrinho->cadastrar($_POST);
    
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
    
            $retorno = $carrinho->deletar($_POST);
    
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
    
            $retorno = $carrinho->confirmar($_POST);
    
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível cadastrar este endereço! Tente novamente.';
            }
        break;

        case 'buscarCar':
            $retorno = $carrinho->buscarCar($_POST);
    
            if (is_array($retorno))
            {
                $retorno = necessary_data($retorno);
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

function necessary_data($imagens)
{
  foreach ($imagens as $key)
  {
    $result[0]['EXT'] = $key["TIPO_IMAGEM"];
    $result[0]['DADOS'] = array_map('utf8_encode', $key);
    $result[0]['IMG'] = base64_encode($key["IMAGEM_CESTA"]);
  }
  return $result;
}
?>