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
        // Clicar nos cards aparecer mensagem de serviço não dsponível
        $('.linha-card-options').find('.linha-card').click(function(e)
        {
            noty('error', 'Serviço indisponível no momento!', '', 5000, false, true);
        });


        // Carregando as cestas
        $.post('../controllers/cestas', { control: 'buscarCestas' }, function(response)
        {
            if (response.charAt(0) != '<' && response.charAt(0) != 'E')
            {
                $('.loading').addClass('none');
                $('.not-loader').removeClass('none');

                let jsonParse = JSON.parse(response);
                $.each(jsonParse, function(index, key)
                {
                    console.log(key);
                    if (key.IMAGEM_CESTA == '')
                    {
                        if (configAcesso == 'MASTER')
                        {
                            $('.cestas').append(
                                '<div class="card" id="'+ key.ID +'">'+
                                    '<div class="top-card"> <img style="border-bottom:1px solid #9d9d9d60;" src="../img/cesta-foto-padrao.jpg" alt="image"> </div>'+
                                    '<div class="mid-card">'+
                                    '<h3>'+ key.NOME_CESTA +'</h3>'+
                                        '<p class="cesta">Original de Sasa Cestas</p>'+
                                        '<p class="description"> '+ key.DESC_CESTA +'... </p>'+
                                        '<div class="prices"> <span>R$ '+ key.VALOR_CESTA +'</span> <button onclick="excluir('+ key.ID +')" name="selecionar">EXCLUIR &nbsp<i class="fas fa-trash-alt" style="color:white;"></i></button> </div>'+
                                        // '<div class="prices"> <span>R$ '+ key.VALOR_CESTA +'</span> <button onclick="cadastrar('+ key.ID +', '+ configId +')" name="selecionar">CARRINHO &nbsp<i class="fas fa-shopping-cart" style="color:white;"></i></button> </div>'+
                                        // '<div class="rate"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </div>'+
                                    '</div>'+
                                '</div>'
                            );
                        }
                        else 
                        {
                            $('.cestas').append(
                                '<div class="card" id="'+ key.ID +'">'+
                                    '<div class="top-card"> <img style="border-bottom:1px solid #9d9d9d60;" src="../img/cesta-foto-padrao.jpg" alt="image"> </div>'+
                                    '<div class="mid-card">'+
                                    '<h3>'+ key.NOME_CESTA +'</h3>'+
                                        '<p class="cesta">Original de Sasa Cestas</p>'+
                                        '<p class="description"> '+ key.DESC_CESTA +'... </p>'+
                                        // '<div class="rate"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </div>'+
                                        '<div class="prices"> <span>R$ '+ key.VALOR_CESTA +'</span> <button onclick="cadastrar('+ key.ID +', '+ configId +')" name="selecionar">CARRINHO &nbsp<i class="fas fa-shopping-cart" style="color:white;"></i></button> </div>'+
                                    '</div>'+
                                '</div>'
                            );
                        }
                    }
                });
            }
            else { noty('warning', 'Preencha todos os campos!', '', true, false, true); $('.not-loader').removeClass('none'); $('.loading').addClass('none'); $('.loading-no-data').removeClass('none'); }        
        });
    });    
});

// Carrinho de compras
function cadastrar(id, idU)
{
    $.post('../controllers/carrinho', { control: 'inserir', id: id, idU: idU }, function(response)
    {   
        if (response == '1') { window.open('http://localhost/SasaCestas/sasa-cestas/carrinho', '_self'); }
        else { noty('error', response, 'topLeft', true, false, true); }
    });
}

// Excluir cesta
function excluir(id)
{
    $.post('../controllers/cestas', { control: 'delete', id: id }, function(response)
    {   
        if (response == '1') { location.reload(); }
        else { noty('error', response, 'topLeft', true, false, true); }
    });
}
