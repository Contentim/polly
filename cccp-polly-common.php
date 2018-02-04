<?php

/** регистрация фильтров и событий **/
add_action('init','cccp_polly_init');
function cccp_polly_init(){

    add_action( 'wp_enqueue_scripts', 'frontend_scripts' );
    function frontend_scripts() {
        $polly_frontend = plugins_url( '/js/polly_frontend.js', __FILE__ );
        wp_enqueue_script('polly_frontend', $polly_frontend, array('jquery') );
    }


//    echo "fsdflskdf";
    /*wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );

    $jquery_ui = plugins_url( 'js/jquery-ui.js', __FILE__ );
    wp_enqueue_script('jquery_ui', $jquery_ui, array('jquery') );

    $toastmessage = plugins_url( 'js/jquery.toastmessage-min.js', __FILE__ );
    wp_enqueue_script('toastmessage', $toastmessage, array('jquery') );*/

    /*$polly_common_js = plugins_url( 'js/polly_common.js', __FILE__ );
    wp_enqueue_script('polly_common_js', $polly_common_js, array('jquery') );*/
}

