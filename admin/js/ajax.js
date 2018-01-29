jQuery(document).ready(function($){

    // add new field answer in empty
    $('#add_new_answer').on('click', function(){
        $('#add_new_polly').append(
            '<tr>' +
            '<td>Ответ:</td>' +
            '<td><input type="text" name="cccp_polly_answer[]" value="" /> <a href="javascript:;" class="remove_current_answer">Удалить</a></td>' +
            '</tr>'
        );
    });

    $('body').on('click','.remove_current_answer', function(){
        $(this).parents('tr').remove();
    });

    // add question_answers
    $('#cccp_polly_add_polly_btn').click(function(){
        var answers = [];
        var new_question = $("#new_question").val();


        $.each($('input[name ^= cccp_polly_answer]'), function(){
            answers.push($(this).val())
        });

        var data = {
            action: 'add_new_question',
            new_question: new_question,
            new_answers: answers
        };

        // с версии 2.8 'ajaxurl' всегда определен в админке
        $(this).parents('ul').find('.loading_polly').show();
        $.post(ajaxurl, data, function (data) {
            $(this).parents('ul').find('.loading_polly').show();
        })
        .done(function(data) {
            $('#client').text('Запрос на добавление новой записи отправлен на сервер!');
            $('.loading_polly').hide();

            var last_question_answers = {
                id: $('#list_question_answers .question_answers:last').find('input[type^=hidden]').val(),
                answers: function () {
                    var r = 'answers';
                    return r;
                }
            };

            // console.log(last_question_answers.id);
            // console.log(last_question_answers.answers());

            var data = {
                action: 'query_last_question_answers'
            };


            $.post(
                ajaxurl,
                data
            ).done(function(element) {
                // var object = $.parseJSON(element);

                console.log(element);
                $('#list_question_answers').append(element);

                /*$.each($(object), function(i,e){
                    $.each($(e), function(ind,el){
                        // console.log(el);
                    });
                });*/
            });

            /*$('#list_question_answers').append('<ul class="question_answers"><li><p><b>ID=31</b></li>' +
                '<li>' +
                '<input name="question_31" id="question_31" type="text" value="'+new_question+'">' +
                '<input type="hidden" value="31">' +
                '</li>' +
                '' +
                '<li><input type="text" class="answer" value="Да"><input type="hidden" value="64"></li>' +
                '<li><input type="text" class="answer" value="Нет"><input type="hidden" value="65"></li>' +
                '<li><input type="text" class="answer" value="Не знаю"><input type="hidden" value="66"></li>' +
                '' +
                '<li>' +
                '<input type="text" class="answer" value="Уверен, что Да">' +
                '<input type="hidden" value="67">' +
                '<li>' +
                '' +
                '<li>' +
                '<button id="save_question_31" class="button-primary">Сохранить вопрос №31</button> ' +
                '<img src="/wp-admin/images/wpspin_light.gif" class="waiting loading_polly" style="display: none;"> ' +
                '<input type="button" name="submit_remove_question_31" value="Удалить" class="button-primary">' +
                '</li>' +
                '</ul>'
            );*/
        });
    });

    // update question_answers
    $('button[id ^= save_question_]').on('click', function(){

        var id_question = $(this).parents('ul').find('input[type=hidden]').val();
        var question_answers = {};

        $.each($(this).parents('ul').find('input[type ^= text].answer'), function(i, el){
            var index = $(this).siblings('input[type ^= hidden]').val();
            var value = $(this).val();
            question_answers[index] = value;
        });

        var val_question = $(this).parents('ul').find('input[name^= question_]').val();

        var data = {
            action: 'update_current_question',
            id_question: id_question,
            val_question: val_question,
            question_answers: question_answers
        };

        $(this).parents('ul').find('.loading_polly').show();
        // с версии 2.8 'ajaxurl' всегда определен в админке
        $.post(ajaxurl, data, function (data) {

        })
        .done(function() {
            $('#client').text('Запрос отправлен на сервер!');
            $('.loading_polly').hide();
        })
        .fail(function() { $('#client').text('Error!'); });

    });

});