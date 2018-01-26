jQuery(document).ready(function($){

    $('#add_new_question').click(function(){
        var new_question = $("#new_question").val();

        var data = {
            action: 'new_question'
        };

        // с версии 2.8 'ajaxurl' всегда определен в админке
        $.post(ajaxurl, data, function (data) {
            console.log(data);

            if (data != '') {
                $('#result').html(data);
            } else {
                $('#result').text('empty');
            }

        });

        /*$.ajax({
            // url: "../admin.php",
            // type: "POST",
            // data: {new_question : new_question},
            // dataType: "json"
            cache: false,
            success: function(data){
                // $("#result").text(data);
            }
        });*/
        /*.complete(function(data) {
            console.log(data);
        })
        .success(function(data){
            // console.log(data);
            console.log('Получено с сервера: ' + data);
        })
        .error(function(data){
            console.log(data);
        });*/

    });

    /*var data = {
        action: 'hello',
        cccp_polly_new_question: 'Юзверь'
    };*/


    /*$.post( ajaxurl, data, function(response) {

    });*/
});