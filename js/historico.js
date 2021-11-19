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
        $('.loading-gif').removeClass('none');

        $.post('../controllers/pedidos', { control: 'carregarTabelaToda' }, function(response)
        {
            $('.loading').addClass('none');
            
            if (response.charAt(0) != '<' && response.charAt(0) != 'E')
            {
                $('.loading').addClass('none');
                $('.history').removeClass('none');
                $('.loading-no-data').addClass('none');
                
                let jsonParse = JSON.parse(response);
                if (jsonParse.length == 1 && jsonParse[0].ID_USER != configId) { $('table').addClass('none'); $('.loading').removeClass('none'); $('#etapas-pedido-titulo').addClass('none'); }
                else 
                {
                    $.each(jsonParse, function(index, key)
                    {
                        if (configId == key.ID_USER)
                        {
                            $('#tabela-master').append(
                                '<tr>'+
                                    '<td>'+ key.ID_PEDIDO +'</td>'+
                                    '<td>'+ key.NOME_CESTA +'</td>'+
                                    '<td>R$ '+ key.VALOR_CESTA +'</td>'+
                                    '<td>'+ key.ENDERECO +'</td>'+
                                    // '<td><button onclick="verEtapas('+ key.ID_PEDIDO +')" name="ver-etapas">ETAPA PEDIDO <i class="fas fa-truck-loading"></i> </button></td>'+
                                '</tr>'
                            );
                        }
                    });
                }
            }
            else { noty('error', 'Nenhum pedido realizado!', '', true, false, true); $('.history').addClass('none'); $('.loading-no-data').removeClass('none'); }    
        });
    });    
});
