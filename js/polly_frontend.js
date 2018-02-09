(function($) {
    $(document).ready(function() {

        function get_polly_result(container, id, value, symbol){
            container.each(function(){

                var regex = /(\d+)/;
                var id_item = $(this).prop('id');
                var val = id_item.match(regex);

                if (id == val[0]){
                    if (symbol!=undefined){
                        $(this).text(value+symbol);
                    } else {
                        $(this).text(value);
                    }
                }

            });
        }

        $('input[name ^= result_question_]').on('click',function(){
            var id_question = $(this).parents('div[id^=poll_]').find('.button input[type=hidden]').val();

            $(this).parents('div[id^=poll_]').find('input[name=answer]').hide();
            $(this).parents('div[id^=poll_]').find('input[name^=result_question_]').hide();
            /*$('#poll input[name=answer]').hide();
            $('#poll input[name^=result_question_]').hide();*/

            var val_checked = $('input[name=answer]:checked').val();

            $.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                data:{
                    'action': 'polly_result',
                    'id': id_question,
                    'val_checked': val_checked
                },
                success: function(json) {
                    var common_counter = 0;

                    var data = JSON.parse(json);
                    $.each(data, function(i, e){

                        common_counter += Number(e.counter);

                        get_polly_result($('div[id^=polly_counter_]'), e.id, e.counter);
                        get_polly_result($('div[id^=polly_percentage_]'), e.id, e.percent, '%');

                        $('.common_counter').text('Количество ответов - ' + common_counter);
                    });

                }
            });
        });

    });
})(jQuery);