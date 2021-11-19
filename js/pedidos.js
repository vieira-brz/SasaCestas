// PEGANDO DADOS DA SESSÃO
$.get('../controllers/session', function(data)
{
    var config = JSON.parse(data);
    configId = config.ID;
    configEmail = config.EMAIL;
    configUsuario = config.USUARIO;
    configAcesso = config.ACESSO;
    
    $(document).ready(function()
    {
        if (configAcesso == 'MASTER')
        {
            $.post('../controllers/pedidos', { control: 'carregarTabela' }, function(response)
            {
                if (response.charAt(0) != '<' && response.charAt(0) != 'E')
                {
                    let jsonParse = JSON.parse(response);
                    $.each(jsonParse, function(index, key)
                    {
                        $('#tabela-master').append(
                            '<tr>'+
                                '<td>'+ key.ID_PEDIDO +'</td>'+
                                '<td>'+ key.NOME_CESTA +'</td>'+
                                '<td>R$ '+ key.VALOR_CESTA +'</td>'+
                                '<td>'+ key.ENDERECO +'</td>'+
                                '<td><button onclick="verEtapas('+ key.ID_PEDIDO +')" name="ver-etapas">ETAPA PEDIDO <i class="fas fa-truck-loading"></i> </button></td>'+
                            '</tr>'
                        )
                        console.log(index, key);
                    });
                }
                else { noty('error', 'Nenhum pedido pendente!', '', true, false, true); }    
            });
        }
    });    
});

// carregarTabela