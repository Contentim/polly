jQuery(document).ready(function($){

    function showStickySuccessToast() {
        $().toastmessage('showSuccessToast', "Запись обновлена");

    }

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

        $(this).parents('ul').find('.loading_polly').show();
        $.post(ajaxurl, data, function () {
            $(this).parents('ul').find('.loading_polly').show();
        })
        .done(function(data) {
            $('#client').text('Запрос на добавление новой записи отправлен на сервер!');
            $('.loading_polly').hide();

            var data = {
                action: 'query_last_question_answers'
            };

            $.post(
                ajaxurl,
                data
            ).done(function(element) {
                $('#list_question_answers').append(element);
            });
        });
    });

    // update question_answers
    $('body').on('click','button[id ^= save_question_]', function(){

        showStickySuccessToast();

        var id_question = $(this).parents('ul').find('input[type=hidden]').val();
        var question_answers = {};

        $.each($(this).parents('ul').find('input[type ^= text].answer'), function(){
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
        $.post(ajaxurl, data, function () {})
        .done(function(data) {
            $('#client').text('Запрос отправлен на сервер!');
            $('.loading_polly').hide();
        })
        .fail(function() { $('#client').text('Error!'); });

    });

    // REMOVE question_answers
    $('body').on('click','input[name ^= remove_question_]', function(){
        var id_question = $(this).parents('ul').find('input[type=hidden].id_question').val();
        var $this = $(this);

        var data = {
            action: 'remove_current_question',
            id_question: id_question
        };

        $(this).parents('ul').find('.loading_polly').show();
        $.post(ajaxurl, data, function () {})
            .done(function() {
                $('#client').text('Запрос отправлен на сервер!');
                $('.loading_polly').hide();
                $this.parents('ul').remove();
            })
            .fail(function() { $('#client').text('Error!'); });

    });

});