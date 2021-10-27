<?php

    include 'config/diretorio.php';
    include $diretorio .'\\models\\Endereco.php';

    $endereco = new Endereco;

    $control = $_POST['control'];
    switch ($control['action']) 
    {
        case 'selecionar':            

            // Selecionando endereço clicado
            $retorno = $endereco->selecionarEndereco($control);
            
            if ($retorno == 1)
            {
                echo '1';
            }
            else 
            {
                echo 'Erro: Não foi possível selecionar este endereço! Tente novamente.';
            }
        break;

        case 'buscaEnderecos':
        
            // Buscando endereços do usuário
            $id = $control['id'];

            $retorno = $endereco->buscaEnderecos($id);

            // Se encontrar algo retorne os dados senão retorne a mensagem de erro
            if (is_array($retorno))
            {
                echo json_encode($retorno);
            }
            else 
            {
                echo 'Erro: Não foi possível buscar seus endereços salvos! Tente recarregar a página.';
            }
        break;

        case 'cadastrar':

            // Buscando os endereços do usuario
            $enderecos = $endereco->buscaEnderecos($control['idUser']);
            
            if (is_array($enderecos))
            {
                // Quantidade de endereços já cadastradas pelo usuário
                $qtd = count($enderecos);

                if ($qtd == 3)
                {
                    echo 'Erro: Limite máximo de 3 endereços atingido.';
                }
                else 
                {
                    // Cadastrando o novo endereço
                    $retorno = $endereco->cadastrar($control);

                    if ($retorno == 1)
                    {
                        echo '1';
                    }
                    else 
                    {
                        echo 'Erro: Não foi possível cadastrar este endereço! Tente novamente.';
                    }
                }
            }
            else 
            {
                // Cadastrando o novo endereço
                $retorno = $endereco->cadastrar($control);

                if ($retorno == 1)
                {
                    echo '1';
                }
                else 
                {
                    echo 'Erro: Não foi possível cadastrar este endereço! Tente novamente.';
                }
            }
        break;
        
        default:
        break;
    }
?>