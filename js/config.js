theme = localStorage.getItem('dark');
if (theme == null) { $('html').removeClass('dark'); }
else { $('html').addClass('dark'); }

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
});