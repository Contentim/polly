<?php

function cccp_polly_uninstall(){
    global $wpdb;

    $table_question = $wpdb->get_blog_prefix() . 'cccp_polly_question';
    $table_question = "DROP TABLE `".$table_question."`;";

    $table_answer = $wpdb->get_blog_prefix() . 'cccp_polly_answer';
    $table_answer = "DROP TABLE `".$table_answer."`;";

    $table_user_ip = $wpdb->get_blog_prefix() . 'cccp_polly_user_ip';
    $table_user_ip = "DROP TABLE `".$table_user_ip."`;";

    $wpdb->query($table_question);
    $wpdb->query($table_answer);
    $wpdb->query($table_user_ip);

}