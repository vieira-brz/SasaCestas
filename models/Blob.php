<?php

class Blob_Upload 
{
  /*
  -- PHASES
     1° INPUT MUST HAVE THE NAME 'image' TO ACCESS $_FILES['image']
     2° USE BLOB CONTROLLER IN 'controllers/blobController.php'
        CURRENTLY THE BLOB CONTAINS THE FOLLOWING CONTROLS
        1 - Insert (Need to have order and fill)
        2 - Read All
        3 - Read Order Item (Need to have order)
  */

  public function generate($arquivo, $indice)
  {
    // CONFIGURANDO EXTENSÃO DO ARQUIVO
    $tipo = explode('/',$arquivo['type'][$indice]);
    $tipo = $tipo[1];

    // NOVO NOME DE ARQUIVO GERADO AUTOMÁTICAMENTE
    $nomeFinal = time().'.'.$tipo;

    // SE MOVER ARQUIVO COM NOVO NOME PARA PASTA TEMPORÁRIA EXECUTE
    if (move_uploaded_file($arquivo['tmp_name'][$indice], $nomeFinal))
    {
      // PEGANDO O TAMANHO DO ARQUIVO
      $tamanhoImg = filesize($nomeFinal);

      // DESCRIPTOGRAFANDO IMAGEM PARA BINÁRIO
      $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

      // CRIANDO ARRAY PARA RETORNO
      $arrayImg = array(
        "TIPO"    => $tipo,
        "IMAGEM"  => $mysqlImg,
        "TAMANHO" => $tamanhoImg
      );

      // APAGANDO IMAGEM DA PASTA TEMPORÁRIA
      unlink($nomeFinal);

      // RETORNO
      return $arrayImg;
    }
  }
}

?>