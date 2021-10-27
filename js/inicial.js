$.get('../controllers/session', function(data)
{
    $(document).ready(function()
    {
        $('input').focusout(function(e) { $(this).closest('div').find('label').css('color', 'var(--border-text)'); });

        var config = JSON.parse(data);
        configId = config.ID;
        configEmail = config.EMAIL;
        configUsuario = config.USUARIO;

        
    });
});