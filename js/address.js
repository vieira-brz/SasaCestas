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
        // Consultando CEP
        const cep = $("#cep");
        cep.mask('00000-000');

        const showData = (result)=> 
        { 
            for(const campo in  result) 
            { 
                if($("#"+campo)) 
                { 
                    $("#"+campo).val(result[campo]);
                    $('#'+campo).closest('div').find('label').css('color', 'var(--border-text)');
                } 
            } 
        }
        
        cep.on("keyup" , ()=>
        {
            if (cep.val().length == 9)
            {
                $('.modal-cadastro-endereco').find('input').each(function(el) { $(this).prop('disabled', false); });

                let search = cep.val().replace("-","");

                $('.modal-cadastro-endereco').find('.loading').removeClass('none');

                const options = {
                    method: 'GET' ,
                    mode: 'cors' ,
                    cache: 'default'
                }
                fetch(`https://viacep.com.br/ws/${search}/json/`, options)
                .then(response => 
                {
                    response.json().then( data => showData(data))
                    $('.modal-cadastro-endereco').find('.loading').addClass('none');
                })
                .catch(e => console.log('Erro: '+ e.message))

                cep.focusout();
                $('.input-field').each(function(el){$(this).removeClass('none');});
            }
        });
        cep.focusout(function(e) { $(this).toggle(); });


        // Clicar no endereço e abrir/fechar caixa de configuração
        $('h3.address').click(function(e) {

            $(this).find('svg, path').toggleClass('rotate180');
            
            $('.container-profile-config-bg').addClass('none');
            $('.container-config').toggleClass('visible-config');
        });


        // Abrindo modais
        $('button[name="add-address"]').click(function(e) {

            $('.over-modal').addClass('active');
            $('.container-modal').removeClass('none');
            $('.modal-cadastro-endereco').removeClass('none');

            $('.container-config').toggleClass('visible-config');
            $('.tools').find('h3.address').find('svg, path').toggleClass('rotate180');
        });


        // Cadastrando novo endereço do usuário
        $('button[name="addAddress"]').click(function(e)
        {
            e.preventDefault();

            let uf = $('#uf').val();
            let cep = $('#cep').val();
            let numero = $('#numero').val();
            let logradouro = $('#logradouro').val();
            let localidade = $('#localidade').val();
            let ambiente = $('select[name="ambiente"]').val();

            if (uf == '') { noty('warning', 'O campo "UF" é obrigatório e deve ser preenchido!', 'topLeft', true, false, false); }
            if (cep == '') { noty('warning', 'O campo "CEP" é obrigatório e deve ser preenchido!', 'topLeft', true, false, false); }
            if (numero == '') { noty('warning', 'O campo "NUMERO" é obrigatório e deve ser preenchido!', 'topLeft', true, false, false); }
            if (logradouro == '') { noty('warning', 'O campo "ENDERECO" é obrigatório e deve ser preenchido!', 'topLeft', true, false, false); }
            if (localidade == '') { noty('warning', 'O campo "CIDADE" é obrigatório e deve ser preenchido!', 'topLeft', true, false, false); }
            if (ambiente == '' || ambiente == '#' || ambiente == null) { noty('warning', 'O campo "FAVORITAR" é obrigatório e deve ser preenchido!', 'topLeft', true, false, false); }
            
            if (
                uf != '' && 
                cep != '' && 
                numero != '' && 
                logradouro != '' && 
                localidade != '' && 
                ambiente != null && ambiente != '' && ambiente != '#'  
            )
            {
                $.post('../controllers/endereco', 
                {
                    control: {
                        action: 'cadastrar',
                        idUser: configId,
                        endereco: logradouro,
                        numero: numero,
                        ambiente: ambiente,
                        cep: cep,
                        cidade: localidade,
                        estado: uf,
                        ativo: 'N',
                    }
                },
                function(data)
                {
                    if (data == '1')
                    {
                        $('.config-tools-card').find('.config-tools:last-child').click();
                        location.reload();
                    }
                    else 
                    {
                        noty('error', data, 'topLeft', true, false, true);
                    }
                });
            }

            e.stopImmediatePropagation();
        });


        // Clicando no svg e abrindo caixa de configurações
        $('.config-tools-card').on('click', '.config-address', function(e) {

            e.preventDefault();

            $('.config-address-settings').each(function(el){$(this).addClass('none');});
            $(this).find('.config-address-settings').toggleClass('none');
        });


        // Deletando um endereço
        $('.config-tools-card').on('click', '.config-address-settings', function(e) {

            e.preventDefault();

            let id = $(this).closest('.config-tools').attr('id');
            $.post('../controllers/endereco', 
            {
                control: {
                    action: 'deletar',
                    id: id,
                    idUser: configId
                }
            }, 
            function(data)
            {
                if (data == '1')
                {
                    location.reload();
                }
                else 
                {
                    noty('error', data, 'topLeft', true, false, true);
                }
            });
        });


        // Clicando no card do endereço e selecionando ele como padrão de entrega
        $('.config-tools-card').on('click', '.address-info', function(e) {
            
            e.preventDefault();

            let id = $(this).closest('.config-tools').attr('id');
            $.post('../controllers/endereco', 
            {
                control: {
                    action: 'selecionar',
                    id: id,
                    idUser: configId
                }
            }, 
            function(data)
            {
                if (data == '1')
                {
                    $('.config-tools').each(function(el)
                    {
                        $(this).removeClass('selected');
                    });

                    $('#'+ id).addClass('selected');
                    
                    let novoEnderecoSelecionado = $('#'+ id).find('.config-address-info').text();
                    novoEnderecoSelecionado = novoEnderecoSelecionado.split(' - ');
                    novoEnderecoSelecionado = novoEnderecoSelecionado[0];
                    
                    $('.tools').find('h3.address').html(novoEnderecoSelecionado +' &nbsp <i class="fas fa-chevron-down rotate180" style="margin-bottom:-.5%;"></i>');
                
                    $('.container-config').toggleClass('visible-config');            
                }
                else 
                {
                    noty('error', data, 'topLeft', true, false, true);
                }
            });

            e.stopImmediatePropagation();
        });


        // Buscando todos os endereços do usuário
        $.post('../controllers/endereco',
        {
            control: {
                action: 'buscaEnderecos',
                id: configId
            }
        }, 
        function(enderecos)
        {
            let jsonParse = JSON.parse(enderecos);

            $.each(jsonParse, function(i, k)
            {
                let icon = '';
                switch (k.AMBIENTE) 
                {
                    case 'Casa':
                        icon = 'fa-home';
                    break;
                    case 'Trabalho':
                        icon = 'fa-mug-hot';
                    break;
                    default:
                        icon = 'fa-qualquer';
                    break;
                }

                if (k.ATIVO == 'S' || jsonParse.length == 1)
                {
                    $('.container-config').find('.config-tools-card').prepend(
                    `
                        <div class="config-tools selected" id="`+ k.ID +`" style="cursor:pointer;">
                            <i class="fas `+ icon +`"></i>
                            <div class="address-info">
                                <h4>`+ k.AMBIENTE +`</h4>
                                <h4 class="config-address-info">`+ k.ENDERECO +`, `+ k.NUMERO +` - `+ k.CIDADE +`, `+ k.ESTADO +` - `+ k.CEP +`</h4>
                            </div>
                            <div class="config-address"> <div class="v-icon"> <i class="fas fa-ellipsis-v"></i> </div>  <div class="config-address-settings none"> <i class="fas fa-trash"></i> &nbsp <label>Excluir</label></div> </div>
                        </div>
                    `
                    );

                    let headerEndereco = '';
                    headerEndereco = k.ENDERECO.split(' ');
                    headerEndereco = headerEndereco[0];
                    
                    headerEndereco = k.ENDERECO.replace('Rua', 'R.');
                    headerEndereco = k.ENDERECO.replace('Avenida', 'Av.');

                    $('.tools').find('h3.address').html(headerEndereco +', '+ k.NUMERO +' &nbsp <i class="fas fa-chevron-down" style="margin-bottom:-.5%;"></i>');
                }
                else 
                {
                    $('.container-config').find('.config-tools-card').prepend(
                    `
                        <div class="config-tools" id="`+ k.ID +`" style="cursor:pointer;">
                            <i class="fas `+ icon +`"></i>
                            <div class="address-info">
                                <h4>`+ k.AMBIENTE +`</h4>
                                <h4 class="config-address-info">`+ k.ENDERECO +`, `+ k.NUMERO +` - `+ k.CIDADE +`, `+ k.ESTADO +` - `+ k.CEP +`</h4>
                            </div>
                            <div class="config-address"> <div class="v-icon"> <i class="fas fa-ellipsis-v"></i> </div>  <div class="config-address-settings none"> <i class="fas fa-trash"></i> &nbsp <label>Excluir</label></div> </div>
                        </div>
                    `
                    );
                }
            });
        });
    });
});