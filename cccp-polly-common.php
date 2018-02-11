<?php

add_action('init','cccp_polly_init');
function cccp_polly_init(){

    // подключение скрипта JS на фронтенд
    add_action( 'wp_enqueue_scripts', 'frontend_scripts' );

    function frontend_scripts() {
        $polly_regex = plugins_url( '/js/regex.js', __FILE__ );
        wp_enqueue_script('polly_regex', $polly_regex, array('jquery') );

        $polly_frontend = plugins_url( '/js/polly_frontend.js', __FILE__ );
        wp_enqueue_script('polly_frontend', $polly_frontend, array('jquery') );

    }

    // Работает только для зарегистрированых в фронтэнде
    add_action( 'wp_ajax_polly_result', 'polly_result' );

    // Только для не загестрированых в фронтэнде
    add_action( 'wp_ajax_nopriv_polly_result', 'polly_result' );

    function polly_result(){
        global $wpdb;

        // init tables DB
        $table_question = $wpdb->get_blog_prefix().'cccp_polly_question';
        $table_answer = $wpdb->get_blog_prefix().'cccp_polly_answer';

        $id_question = $_POST['id'];
        $val_checked = $_POST['val_checked'];

        /*echo $id_question;
        echo " <br> ";
        echo $val_checked;*/

        // выборка и обновление значения выбранного варианта ответов
        $counter = $wpdb->get_row("
            SELECT ".$table_answer.".counter FROM `".$table_answer."` WHERE id=".$val_checked."
        ");
        $this_counter = $counter->counter;
        $wpdb->update(
            $table_answer,
            array( 'counter' => $this_counter + 1),
            array( 'ID' => $val_checked ),
            array( '%d' ),
            array( '%d' )
        );

        // вывод всех значений и расчет соотношения в %
        /*выборка ответов - id+counter*/
        $answers = $wpdb->get_results("
            SELECT ".$table_answer.".id, ".$table_answer.".counter FROM `".$table_answer."` WHERE parent=".$id_question."
        ");

        // подсчет общего кол-ва голосов
        $percentage = 0;
        foreach($answers as $value){
            $percentage = $percentage + $value->counter;
        }

        $data = [];
        foreach($answers as $value){
            $data[] = [
                'id' => $value->id,
                'counter' => $value->counter,
                'percent' => round($value->counter / $percentage * 100)
            ];
        }

        $json = json_encode($data);
        print_r($json);

        wp_die();
    }

}

