jQuery(document).ready(function($){
    var data = {
        action: 'hello',
        name: 'Юзверь'
    };

    // с версии 2.8 'ajaxurl' всегда определен в админке
    $.post( ajaxurl, data, function(response) {
        alert('Получено с сервера: ' + response);
    });
});