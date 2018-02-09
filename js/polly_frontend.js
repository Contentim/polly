(function($) {
    $(document).ready(function() {

        // console.log($('input[name=answer]:checked').val());

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
            var id_question = $('#poll .button input[type=hidden]').val();

            $('#poll input[name=answer]').hide();

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
                    // console.log(json);

                    var common_counter = 0;

                    var data = JSON.parse(json);
                    $.each(data, function(i, e){

                        common_counter += Number(e.counter);

                        get_polly_result($('div[id^=polly_counter_]'), e.id, e.counter);
                        get_polly_result($('div[id^=polly_percentage_]'), e.id, e.percent, '%');

                        /*$('div[id^=polly_counter_]').each(function(){

                            var regex = /(\d+)/;
                            var id = $(this).prop('id');
                            var val = id.match(regex);

                            if (e.id == val[0]){
                                $(this).text(e.counter);
                             }

                        });*/



                        /*$('div[id^=polly_percentage_]').each(function(){

                            var regex = /(\d+)/;
                            var id = $(this).prop('id');
                            var val = id.match(regex);

                            if (e.id == val[0]){
                                $(this).text(e.percent+'%');
                            }

                        });*/

                        $('.common_counter').text('Количество ответов - ' + common_counter);
                    });

                    // $('h1').text(json);

                }
            });
        });



    });
})(jQuery);