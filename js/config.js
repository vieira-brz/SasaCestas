// TEMA DA APLICAÇÃO
theme = localStorage.getItem('dark');
if (theme == null) { $('html').removeClass('dark'); $('input[name="checkbox-theme"]').prop('checked', false); } else { $('html').addClass('dark'); $('input[name="checkbox-theme"]').prop('checked', true); }


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
        // Alterando status de checagem do tema escuro na configuração de usuário
        if (theme == null) { $('input[name="checkbox-theme"]').prop('checked', false); } else { $('input[name="checkbox-theme"]').prop('checked', true); }

        // Abrindo estatisticas na nova pagina
        $('button[name="config-acc-stats"]').click(function(e)
        {
            window.location.href = 'http://localhost/SasaCestas/sasa-cestas/estatisticas';
        });

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
            $('button[name="config-acc-stats"]').remove();
            // $('header.toolbar').find('.container-link:last-child').remove();
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


        // Ativando / desativando modo escuro 
        $('input[name="checkbox-theme"]').change(function(e)
        {
            e.preventDefault();

            let checked = $(this).prop('checked');

            if (checked == true)
            {
                $('html').addClass('dark');
                localStorage.setItem('dark', true);
            }
            else 
            {
                $('html').removeClass('dark');
                localStorage.removeItem('dark');
            }
            e.stopImmediatePropagation();
        });


        // MENU MARCADO 
        let url = window.location.href.split('/'); url = url[url.length - 1];
        switch (url) 
        {
            case '': $('.container-link:nth-child(1)').addClass('active'); break;
            case 'historico': $('.container-link:nth-child(2)').addClass('active'); break;
            case 'pedidos': $('.container-link:nth-child(3)').addClass('active'); break;
            case 'carrinho': $('.container-link:nth-child(4)').addClass('active'); break;        
        }
    });
});