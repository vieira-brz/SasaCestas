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
        setTimeout(() => 
        {
            let idEndereco = $('.tools').find('h3.address').attr('id');

            $('.loading-gif').removeClass('none');
    
            $.post('../controllers/carrinho', { control: 'buscarCar', idU: configId }, function(response)
            {
                $('.loading').addClass('none');

                if (response.charAt(0) != '<' && response.charAt(0) != 'E')
                {
                    let jsonParse = JSON.parse(response);
    
                    $('.container-car').removeClass('none');
                    
                    if (jsonParse[0].IMG == '')
                    {
                        $('.container-car').append(
                            '<div class="car">'+
                                '<div class="car-header"> <img src="../img/cesta-foto-padrao.jpg"> </div>'+
                                '<div class="car-body">'+
                                    '<div>'+
                                        '<h4>'+ jsonParse[0].DADOS.NOME_CESTA +'</h4>'+
                                        '<h5 class="texto">'+ jsonParse[0].DADOS.DESC_CESTA +'</h5>'+
                                    '</div>'+
                                    '<div class="config-pagamento">'+
                                        '<h4>FORMA DE PAGAMENTO</h4>'+
                                        '<select name="meio-pagamento">'+
                                            '<option value="#">Selecione um item...</option>'+
                                            '<option value="pix">PIX</option>'+
                                            '<option value="debito">Cartão de débito</option>'+
                                            '<option value="credito">Cartão de crédito</option>'+
                                            '<option value="dupla">Cartão de débito/crédito</option>'+
                                        '</select>'+
                                    '</div>'+
                                    '<button onclick="cancelar('+ jsonParse[0].DADOS.ID_CARRINHO +')" name="cancelar" style="background:var(--dark) !important; margin-right: 10px;">CANCELAR COMPRA</button>'+
                                    '<button onclick="confirmar('+ jsonParse[0].DADOS.ID_CARRINHO +', '+ jsonParse[0].DADOS.ID_USER +', '+ jsonParse[0].DADOS.ID +', '+ idEndereco +')" name="comprar">CONFIRMAR COMPRA</button>'+
                                '</div>'+
                            '</div>'  
                        );
                    }
                    else
                    {
                        $('.container-car').append(
                            '<div class="car">'+
                                '<div class="car-header" style="height:100%;"> <img style="height: 100%;" src="data:image/'+ jsonParse[0].EXT +';base64,'+ jsonParse[0].IMG +'" alt="image"/> </div>'+
                                '<div class="car-body">'+
                                    '<div>'+
                                        '<h4>'+ jsonParse[0].DADOS.NOME_CESTA +'</h4>'+
                                        '<h5 class="texto">'+ jsonParse[0].DADOS.DESC_CESTA +'</h5>'+
                                    '</div>'+
                                    '<div class="config-pagamento">'+
                                        '<h4>FORMA DE PAGAMENTO</h4>'+
                                        '<select name="meio-pagamento">'+
                                            '<option value="#">Selecione um item...</option>'+
                                            '<option value="pix">PIX</option>'+
                                            '<option value="debito">Cartão de débito</option>'+
                                            '<option value="credito">Cartão de crédito</option>'+
                                            '<option value="dupla">Cartão de débito/crédito</option>'+
                                        '</select>'+
                                    '</div>'+
                                    '<button onclick="cancelar('+ jsonParse[0].DADOS.ID_CARRINHO +')" name="cancelar" style="background:var(--dark) !important; margin-right: 10px;">CANCELAR COMPRA</button>'+
                                    '<button onclick="confirmar('+ jsonParse[0].DADOS.ID_CARRINHO +', '+ jsonParse[0].DADOS.ID_USER +', '+ jsonParse[0].DADOS.ID +', '+ idEndereco +')" name="comprar">CONFIRMAR COMPRA</button>'+
                                '</div>'+
                            '</div>'  
                        );
                    }
                }
                else { noty('warning', 'Nada no carrinho!', '', true, false, true); $('.loading-no-data').removeClass('none'); }    
            });
        }, 100);
    });    
});

function cancelar(car)
{
    $.post('../controllers/carrinho', { control: 'deletar', id: car }, function(response)
    {
        if (response == '1') { window.open('http://localhost/SasaCestas/sasa-cestas', '_self'); }
        else { noty('error', response, 'topLeft', true, false, true); }
    });
}

function confirmar(car, user, cesta, endereco)
{
    if ($('select[name="meio-pagamento"]').val() != '' && $('select[name="meio-pagamento"]').val() != '#')
    {
        $.post('../controllers/carrinho', { control: 'confirmar', id: car }, function(response)
        {
            if (response == '1') 
            { 
                noty('success', 'Aguarde o pedido ser enviado ao proprietário!', 'topLeft', true, false, true);

                $.post('../controllers/pedidos', { control: 'inserir', idU: user, idC: cesta, idE: endereco }, function(response)
                {
                    if (response == '1') { window.open('http://localhost/SasaCestas/sasa-cestas/pedidos', '_self'); }
                    else { noty('error', 'Pedido não enviado!', 'topLeft', true, false, true); } 
                });
            }
            else { noty('error', 'Confirmação do pedido não realizada!', 'topLeft', true, false, true); }
        });
    }
    else { noty('warning', 'Selecione uma forma de pagamento!', 'topLeft', true, false, true); }
}