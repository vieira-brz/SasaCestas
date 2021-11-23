<?php

include 'config/diretorio.php';
include $diretorio .'\\models\\Blob.php';
include $diretorio .'\\models\\Cestas.php';

$cestas = new Cestas;
$blob = new Blob_Upload;

if (!empty($_POST))
{
    $controle = $_POST['control'];
    
    switch ($controle) 
    {
        case 'cadastrar':
    
            if (is_array($_FILES) && !empty($_FILES))
            {
                $arquivo = $_FILES['image'];
                $array = $blob->generate($arquivo, 0);
                $retorno = $cestas->cadastrar($_POST, $array['IMAGEM'], $array['TIPO']);
            }
            else 
            {
                $retorno = $cestas->cadastrar($_POST, '', '');
            }
    
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível cadastrar a cesta! Tente novamente.';
            }
        break;

        case 'delete':
    
            $retorno = $cestas->delete($_POST);
    
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível deletar esta cesta! Tente novamente.';
            }
        break;

        case 'buscarCestas':
    
            $retorno = $cestas->buscarCestas();
    
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

/* -----------------
   FUNÇÕES ÚTEIS
---------------- */

function necessary_data($imagens)
{
  foreach ($imagens as $key)
  {
    $result[$key['ID']]['EXT'] = $key["TIPO_IMAGEM"];
    $result[$key['ID']]['DADOS'] = array_map('utf8_encode', $key);
    $result[$key['ID']]['IMG'] = base64_encode($key["IMAGEM_CESTA"]);
  }
  return $result;
}
?>