$(document).ready(function()
{
    // Clicar nos cards aparecer mensagem de serviço não dsponível
    $('.linha-card-options').find('.linha-card').click(function(e)
    {
        noty('error', 'Serviço indisponível no momento!', '', 5000, false, true);
    });


    // Removendo loaders
    setTimeout(() => {
        $('.loading').addClass('none');
        $('.not-loader').removeClass('none');
    }, 1000);

});