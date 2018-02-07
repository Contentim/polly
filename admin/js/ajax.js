jQuery(document).ready(function($){

    $('#test').on('click', function(){
        var data = {
            action: 'test_program'
        };

        $.post(ajaxurl, data, function () {
        })
            .done(function(data) {
                showStickySuccessAdd();
                $('#data_test').text(data);
            });
    });



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
        .done(function() {
            $('.loading_polly').hide();

            showStickySuccessAdd();

            var data = {
                action: 'query_last_question_answers'
            };

            $.post(ajaxurl, data)
            .done(function(element) {
                $('#list_question_answers').append(element);

            })
            .error(function() { showErrorAdd() })
            .fail(function() { showErrorAdd() });
        });
    });

    // update question_answers
    $('body').on('click','button[id ^= save_question_]', function(){

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
        .done(function() {
            showStickySuccessUpdate();
            $('.loading_polly').hide();
        })
        .error(function() { showErrorUpdate() })
        .fail(function() { showErrorUpdate() });

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
                $('.loading_polly').hide();
                $this.parents('ul').remove();
                showStickySuccessRemove();
            })
            .error(function() { showErrorRemove() })
            .fail(function() { showErrorRemove() });

    });

    function showStickySuccessAdd() {
        $().toastmessage('showSuccessToast', "Запись создана успешно");
    }

    function showErrorAdd() {
        $().toastmessage('showErrorToast', "Ошибка создания новой записи");
    }

    function showStickySuccessUpdate() {
        $().toastmessage('showSuccessToast', "Запись обновлена");
    }

    function showErrorUpdate() {
        $().toastmessage('showErrorToast', "Ошибка обновления записи");
    }

    function showStickySuccessRemove() {
        $().toastmessage('showSuccessToast', "Запись успешно удалена");
    }

    function showErrorRemove() {
        $().toastmessage('showErrorToast', "Ошибка удаления записи");
    }




});