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
                    'action': 'front_test',
                    'id': id_question,
                    'val_checked': val_checked
                },
                success: function( e ) {
                    console.log(e);

                    // $('polly_counter_')
                    $('b').regex(/id/).css('color','red');
                }
            })
        });



    });
})(jQuery);