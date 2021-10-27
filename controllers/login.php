<?php
    session_start();
    
    include 'config/diretorio.php';
    include $diretorio .'\\models\\Usuario.php';

    $usuario = new Usuario;

    $control = $_POST['control'];
    switch ($control['action']) 
    {
        case 'entrar':

            // Verificando se existe usuário com mesmos dados
            $verificacao = $usuario->logar($control);

            if (is_array($verificacao))
            {
                // Criando sessão do usuário 
                $_SESSION[session_id()] = array(
                    'id' => $verificacao[0]['ID'],
                    'email' => $verificacao[0]['EMAIL'],
                    'senha' =>  $verificacao[0]['SENHA'],
                    'usuario' =>  $verificacao[0]['USUARIO']
                );

                // Dado encontrado -> logar
                echo '1'; 
            }
            else
            {
                // Removendo sessão
                unset($_SESSION[session_id()]); 

                // Falha ao buscar dado -> não logar
                echo '-1';
            }
        break;

        case 'cadastrar':

            // Verificando se existe usuário com mesmos dados
            $verificacao = $usuario->verificacaoExistencia($control);

            if ($verificacao == true)
            {
                // Usuário já cadastrado
                echo '-2'; 
            }
            else
            {
                // Linhas afetadas do banco de dados
                $affected_rows = $usuario->cadastrar($control);

                if ($affected_rows > 0)
                {
                    // Usuário cadastrado
                    echo '1';
                }
                else 
                {
                    // Usuário não cadastrado
                    echo '-1';
                }
            }
        break;
        
        default:
        break;
    }

?>