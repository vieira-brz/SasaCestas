// TEMA DA APLICAÇÃO
theme = localStorage.getItem('dark');
if (theme == null) { $('html').removeClass('dark'); }
else { $('html').addClass('dark'); }


// PEGANDO DADOS DA SESSÃO
$.get('../controllers/session', function(data)
{
    var config = JSON.parse(data);
    configId = config.ID;
    configEmail = config.EMAIL;
    configUsuario = config.USUARIO;
    configAcesso = config.ACESSO;

    // DOCUMENTO CARREGADO
    $(document).ready(function()
    {
        /* ----------------------------------------------------------
            CAIXA LABEL DOS INPUTS 
        -----------------------------------------------------------*/

        // Foco no input - cor label
        $('input').focus(function(e) { $(this).closest('div').find('label').css('color', 'var(--effect)'); });


        // Desfoco no input - cor label
        $('input').focusout(function(e) { $(this).closest('div').find('label').css('color', 'var(--border-text)'); });
        
        
        /* ----------------------------------------------------------
        CAIXA DE MODAIS 
        -----------------------------------------------------------*/

        // Desfoque select modal ativar classe label
        $('.modal').find('select').change(function(e) {

            $(this).closest('.text-field').find('label').css({
                'top':'-4px',
                'font-size':'14px',
            })
        });


        // Fechando modais
        $('[name="close-modal"]').click(function(e) {
            
            $('.container-modal').addClass('none');
            $('.over-modal').removeClass('active');
            $(this).closest('.modal').addClass('none');
        });


        // Removendo aba "estatísticas" para clientes
        if (configAcesso != 'MASTER')
        {
            $('header.toolbar').find('.container-link:last-child').remove();
        }


        // Configurando mini modal de configuração de conta
        $('.container-profile-config-bg').find('#config-acc-email').html(configEmail);
        $('.container-profile-config-bg').find('#config-acc-name').html(configUsuario);


        // Clicando na foto de perfil e abrindo mini modal de configuração de conta
        $('.relative-profile img.profile').click(function(e) { $('.container-profile-config-bg').toggleClass('none'); $('h3.address').find('svg, path').removeClass('rotate180'); $('.container-config').addClass('visible-config'); }); 
       

        // Deslogando da aplicação
        $('[name="config-acc-logoff"]').click(function(e)
        {
            $.get('../controllers/logoff.php', function(response)
            {
                if (response == '1' || response == '0' || response.charAt(response.length - 1) == '1' || response.charAt(response.length - 1) == '0') { location.reload(); }
                else { noty('error', response); }
            });
        });
    });
});