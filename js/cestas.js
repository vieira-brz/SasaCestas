$(document).ready(function()
{
    $('button[name="enviarForm"]').click(function(e)
    {
        e.preventDefault();

        var formData = new FormData();
        $.each($("input[type='file']")[0].files, function(i, file) { formData.append("image[]", file); });
        formData.append('control', 'cadastrar');
        formData.append('nome', $('input[name="nome"]').val());
        formData.append('desc', $('input[name="desc"]').val());
        formData.append('valor',$('input[name="valor"]').val());

        let nome = $('input[name="nome"]').val(); let desc = $('input[name="desc"]').val(); let valor = $('input[name="valor"]').val();

        if (nome != '' && desc != '' && valor != '')
        {
            $.ajax({
                url: '../controllers/cestas',
                type: "POST",
                data: formData,
                dataType: false,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    console.log(data);
                    retorno = parseInt(data);
                    if (retorno >= 0)
                    {
                        window.open('http://localhost/SasaCestas/sasa-cestas', '_self');
                    }
                    else
                    {
                        noty('error', data, 'topLeft', true, false, true);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    console.log("Status: " + textStatus);
                    console.log(errorThrown);
                    noty('error', errorThrown, 'topLeft', true, false, true);
                }
            });
        }
        else { noty('warning', 'Preencha todos os campos!', '', true, false, true); }

        e.stopImmediatePropagation();
    });
});