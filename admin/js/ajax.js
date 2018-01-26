jQuery(document).ready(function($){
    var data = {
        action: 'new_question',
        name: 'Юзверь'
    };

    // с версии 2.8 'ajaxurl' всегда определен в админке
    $.post( ajaxurl, data, function(response) {
        alert('Получено с сервера: ' + response);
    });
});