$(document).ready(function()
{   
    // Foco no input - cor label
    $('input').focus(function(e) { $(this).closest('div').find('label').css('color', 'var(--effect)'); });


    // Desfoco no input - cor label
    $('input').focusout(function(e) { $(this).closest('div').find('label').css('color', 'var(--border-text)'); });
    
    
    // DIGITAÇÃO NO INPUT - REMOVE SMALL
    $('input').keyup(function(e) { 
        
        if ($(this).val().length >= 5)
        {
            $(this).closest('.input-field').removeClass('mb');
            $(this).closest('.input-field').find('small').addClass('none');
        }
    });

    // INPUT DOS 2 FORM - EQUIVALENTE AO V-MODEL
    $('input[name="email"]').on('keyup keydown paste', function(e) {
        
        let equivalentValue = $(this).val();
        v_model(equivalentValue, 'email');
    });

    $('input[name="senha"]').on('keyup keydown paste', function(element) {

        let equivalentValue = $(this).val();
        v_model(equivalentValue, 'senha');
    });
});

// Validação de e-mail
function validaEmail(email) {

    var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return regex.test(email);
}

// Cadastro e login
function entrar(action) {

    if (action == 'entrar')
    {
        let usuario = $('input[name="email"]').val();
        let senha = $('input[name="senha"]').val();

        if (usuario == '')  
        { 
            $('small.entrar-usuario').removeClass('none');
            $('small.entrar-usuario').closest('.input-field').addClass('mb'); 
        }
        
        if (senha == '') 
        { 
            $('small.entrar-senha').removeClass('none');
            $('small.entrar-senha').closest('.input-field').addClass('mb'); 
        }
        
        if (usuario != '' && senha != '') 
        {
            $('small.entrar-usuario').addClass('none');   
            $('small.entrar-usuario').closest('.input-field').removeClass('mb'); 

            $('small.entrar-senha').addClass('none');   
            $('small.entrar-senha').closest('.input-field').removeClass('mb'); 

            $.post('controllers/login', 
            {
                control: {
                    action: 'entrar',
                    user: usuario,
                    pass: senha,
                }
            },
            function(data)
            {   
                if (data == '1')
                {
                    window.open('sasa-cestas/','_self');
                }
                else 
                {
                    noty('error', 'Erro: usuário ou senha inválidos!', '', true, false, true);
                }
            });
        }
    }
    else 
    {
        let email = $('input[name="email"]').val();
        let usuario = $('input[name="usuario"]').val();
        let senha = $('input[name="senha"]').val();

        if (validaEmail(email)) 
        {   
            if (usuario == '')  
            {
                $('small.cadastrar-usuario').removeClass('none'); 
                $('small.cadastrar-usuario').closest('.input-field').addClass('mb'); 
            }
            
            if (email == '')  
            { 
                $('small.cadastrar-email').removeClass('none'); 
                $('small.cadastrar-email').closest('.input-field').addClass('mb'); 
            }
            
            if (senha == '') 
            { 
                $('small.cadastrar-senha').removeClass('none'); 
                $('small.cadastrar-senha').closest('.input-field').addClass('mb'); 
            }
            
            if (email != '' && usuario != '' && senha != '') 
            {
                $('small.cadastrar-usuario').addClass('none');   
                $('small.cadastrar-usuario').closest('.input-field').removeClass('mb'); 

                $('small.cadastrar-email').addClass('none');   
                $('small.cadastrar-email').closest('.input-field').removeClass('mb'); 

                $('small.cadastrar-senha').addClass('none');   
                $('small.cadastrar-senha').closest('.input-field').removeClass('mb'); 

                $.post('controllers/login', 
                {
                    control: {
                        action: 'cadastrar',
                        email: email,
                        user: usuario,
                        pass: senha,
                    }
                },
                function(data)
                {
                    if (data == '-2') 
                    {
                        noty('error', 'Usuário ou e-mail digitado já está em uso, tente novamente com outros dados!', 'topLeft', true, false, true);
                    }
                    else if (data == '-1')
                    {
                        noty('error', 'Lamentamos, mas não foi possível realizar o seu cadastro!', 'topLeft', true, false, true);
                    }
                    else 
                    {
                        window.open('sasa-cestas/','_self');
                    }
                });
            }
        } 
        else { noty('error', 'Erro: insira um email válido!', 'topLeft', true, false, true); }
    }
}

// Mesmo value para inputs iguais
function v_model(value, name) { $('input[name="'+ name +'"]').each(function(el) { $(this).val(value);  }); }

// Rolagem para tela de cadastro
function scrollToCadastro() { 

    $('.container').addClass("sign-up-mode"); 
    $('input').each(function(element) { $(this).focusout() });
}

// Rolagem para tela de login
function  scrollToLogin() { 

    $('.container').removeClass("sign-up-mode"); 
    $('input').each(function(element) { $(this).focusout() });
}