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
        // Buscando dados do pedido
        if (configAcesso == 'MASTER')
        {
            $('.loading-gif').removeClass('none');

            $.post('../controllers/pedidos', { control: 'carregarTabela' }, function(response)
            {
                $('.loading').addClass('none');

                if (response.charAt(0) != '<' && response.charAt(0) != 'E')
                {
                    $('table').removeClass('none');
                    $('.loading').addClass('none');

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
                        );
                    });
                }
                else { noty('error', 'Nenhum pedido pendente!', '', true, false, true); $('.loading').addClass('none'); $('.loading-no-data').removeClass('none'); }    
            });
        }
        else 
        {
            $.post('../controllers/pedidos', { control: 'carregarTabela' }, function(response)
            {
                if (response.charAt(0) != '<' && response.charAt(0) != 'E')
                {
                    $('table').removeClass('none');
                    $('.loading').addClass('none');
                    
                    let jsonParse = JSON.parse(response);
                    if (jsonParse.length == 1 && jsonParse[0].ID_USER != configId) { $('table').addClass('none'); $('.loading').addClass('none'); $('.loading-no-data').removeClass('none'); $('#etapas-pedido-titulo').addClass('none'); }
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
                                        '<td><button onclick="verEtapas('+ key.ID_PEDIDO +')" name="ver-etapas">ETAPA PEDIDO <i class="fas fa-truck-loading"></i> </button></td>'+
                                    '</tr>'
                                );
                            }
                        });
                    }
                }
                else { noty('error', 'Nenhum pedido pendente!', '', true, false, true); $('table').addClass('none'); $('.loading').addClass('none'); $('.loading-no-data').removeClass('none'); $('#etapas-pedido-titulo').addClass('none'); }    
            });
        }

        // Voltando a tabela 
        $('[name="voltarBtn"]').click(function(e)
        {
            e.preventDefault();
            
            $(this).addClass('none');
            $('table').removeClass('none');
            $('.container-rastreador').addClass('none');

            e.stopImmediatePropagation();
        });
    });    
});

function verEtapas(id)
{
    $('table').addClass('none');
    $('.container-rastreador').find('.dot').each(function(el){$(this).removeClass('active');});
    $('.container-rastreador').attr('id', id);
    $('[name="voltarBtn"]').removeClass('none');
    $('.container-rastreador').removeClass('none');

    $.post('../controllers/pedidos', { control: 'buscarId', id: id }, function(response)
    {        
        if (response.charAt(0) != '<' && response.charAt(0) != 'E')
        {
            let pedido = JSON.parse(response); pedido = pedido[0];

            if (pedido.ENVIADO == 'S')
            {
                $('.container-rastreador').find('.dot:nth-child(1)').addClass('active');
                $('.container-rastreador').find('.dot:nth-child(2)').find('button').removeClass('none');

                if (pedido.CONFIRMADO == 'S')
                {
                    $('.container-rastreador').find('.dot:nth-child(2)').addClass('active');
                    $('.container-rastreador').find('.dot:nth-child(3)').find('button').removeClass('none');
                    
                    $('.container-rastreador').find('.dot:nth-child(2)').find('button').addClass('none');

                    if (pedido.SAIDA == 'S')
                    {
                        $('.container-rastreador').find('.dot:nth-child(3)').addClass('active');
                        $('.container-rastreador').find('.dot:nth-child(4)').find('button').removeClass('none');
                        
                        $('.container-rastreador').find('.dot:nth-child(1)').find('button').addClass('none');
                        $('.container-rastreador').find('.dot:nth-child(2)').find('button').addClass('none');
                        $('.container-rastreador').find('.dot:nth-child(3)').find('button').addClass('none');

                        if (pedido.CHEGADA == 'S')
                        {
                            $('.container-rastreador').find('.dot:nth-child(4)').addClass('active');
                            $('.container-rastreador').find('.dot:nth-child(5)').find('button').removeClass('none');

                            $('.container-rastreador').find('.dot:nth-child(1)').find('button').addClass('none');
                            $('.container-rastreador').find('.dot:nth-child(2)').find('button').addClass('none');
                            $('.container-rastreador').find('.dot:nth-child(3)').find('button').addClass('none');
                            $('.container-rastreador').find('.dot:nth-child(4)').find('button').addClass('none');
                        
                            if (pedido.ENCERRADO  == 'S')
                            {
                                $('.container-rastreador').find('.dot:nth-child(5)').addClass('active');
                            }
                        }
                    }
                }
            }
        }
        else 
        { 
            $('table').addClass('none');
            $('.loading').removeClass('none');

            noty('error', 'Nenhum pedido pendente!', '', true, false, true); 
        }    
    });
}

function confirmar(acao)
{   
    let id = $('.container-rastreador').attr('id');
    
    $.post('../controllers/pedidos', { control: 'confirmar', acao: acao, id: id }, function(response)
    {
        if (response == '1') 
        {
            if (acao == 'encerrar')
            {
                location.reload();
            }
            else 
            {
                verEtapas(id); 
            }
        }
        else { noty('error', response, 'topLeft', true, false, true); }
    });
}