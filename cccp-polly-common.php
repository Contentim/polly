<?php

add_action('init','cccp_polly_init');
function cccp_polly_init(){

    // подключение скрипта JS на фронтенд
    add_action( 'wp_enqueue_scripts', 'frontend_scripts' );

    function frontend_scripts() {
        $polly_frontend = plugins_url( '/js/polly_frontend.js', __FILE__ );
        wp_enqueue_script('polly_frontend', $polly_frontend, array('jquery') );
    }

    // Работает только для зарегистрированых в фронтэнде
    add_action( 'wp_ajax_front_test', 'front_test' );

    // Только для не загестрированых в фронтэнде
    add_action( 'wp_ajax_nopriv_front_test', 'front_test' );

    function front_test(){
        $id_question = $_POST['id'];
        $val_checked = $_POST['val_checked'];

        echo $id_question;
        echo "<br>";
        echo $val_checked;

        wp_die();
    }



}

