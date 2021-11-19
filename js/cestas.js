$(document).ready(function()
{
    $('button[name="enviarForm"]').click(function(e)
    {
        e.preventDefault();

        let nome = $('input[name="nome"]').val();
        let desc = $('input[name="desc"]').val();
        let valor = $('input[name="valor"]').val();
        let file = $('input[name="file"]').val();

        if (nome != '' && desc != '' && valor != '')
        {
            $.post('../controllers/cestas', { control: 'cadastrar', nome: nome, desc: desc, valor: valor, file: file }, function(response)
            {
                if (response == '1') { window.open('http://localhost/SasaCestas/sasa-cestas', '_self'); }
                else { noty('error', response, 'topLeft', true, false, true); }
            });
        }
        else { noty('warning', 'Preencha todos os campos!', '', true, false, true); }

        e.stopImmediatePropagation();
    });
});