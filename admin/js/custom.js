(function($) {
    $( document ).ready(function() {
        $("#tabs-msp-slider").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
        $("#tabs-msp-slider li").removeClass("ui-corner-top" ).addClass("ui-corner-left");
    });

    var output = $('#output'); // блок вывода информации
    $('#submit_question_1').on('click', function(){
        console.log('sdnfsndf.,');
        /*$.ajax({
            url: '/action.php', // путь к php-обработчику
            type: 'POST', // метод передачи данных
            dataType: 'json', // тип ожидаемых данных в ответе
            data: {key: 1}, // данные, которые передаем на сервер
            beforeSend: function(){ // Функция вызывается перед отправкой запроса
                output.text('Запрос отправлен. Ждите ответа.');
            },
            error: function(req, text, error){ // отслеживание ошибок во время выполнения ajax-запроса
                output.text('Хьюстон, У нас проблемы! ' + text + ' | ' + error);
            },
            complete: function(){ // функция вызывается по окончании запроса
                output.append('<p>Запрос полностью завершен!</p>');
            },
            success: function(json){ // функция, которая будет вызвана в случае удачного завершения запроса к серверу
                // json - переменная, содержащая данные ответа от сервера. Обзывайте её как угодно ;)
                output.html(json); // выводим на страницу данные, полученные с сервера
            }
        });*/
    });


})(jQuery)