(function($) {
    $(document).ready(function() {

        // console.log($('input[name=answer]:checked').val());



        $('input[name ^= result_question_]').on('click',function(){
            var id_question = $('#poll .button input[type=hidden]').val();

            // использовать скрипт когда не станет кнопки Голосовать
            /*$("input[name=answer]") // select the radio by its id
                .change(function(){ // bind a function to the change event
                    if( $(this).is(":checked") ){ // check if the radio is checked
                        var val_checked = $(this).val(); // retrieve the value
                    }
                });*/

            var val_checked = $('input[name=answer]:checked').val();

            // console.log(val_checked);


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

                        $('div[id^=polly_counter_]').each(function(){

                            var regex = /(\d+)/;
                            var id = $(this).prop('id');
                            var val = id.match(regex);

                            if (e.id == val[0]){
                                $(this).text(e.counter);
                             }

                        });

                        $('div[id^=polly_percentage_]').each(function(){

                            var regex = /(\d+)/;
                            var id = $(this).prop('id');
                            var val = id.match(regex);

                            if (e.id == val[0]){
                                $(this).text(e.percent+'%');
                            }

                        });

                        console.log("common_counter => " + common_counter);

                    });

                    $('h1').text(json);

                }
            });
        });



    });
})(jQuery);