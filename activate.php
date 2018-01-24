<?php

function cccp_polly_install(){
    global $wpdb;

    $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";

    $sql_question = $wpdb->get_blog_prefix() . 'cccp_polly_question';
    $sql_question = "CREATE TABLE {$sql_question} (
        id  int(20) unsigned NOT NULL auto_increment COMMENT 'ID вопроса',
        question varchar(255) NOT NULL default '' COMMENT 'Сам вопрос',
        shortcode varchar(64) NOT NULL default '' COMMENT 'Шорткод опроса',
        PRIMARY KEY  (id)
	)
	{$charset_collate};";

    $sql_answer = $wpdb->get_blog_prefix() . 'cccp_polly_answer';
    $sql_answer = "CREATE TABLE {$sql_answer} (
        id  int(20) unsigned NOT NULL auto_increment,
        answer varchar(255) NOT NULL default '' COMMENT 'Ответ',
        counter varchar(64) NOT NULL default '' COMMENT 'Счетчик ответов',
        parent int(20) NOT NULL COMMENT 'ID родителя вопроса',
        PRIMARY KEY  (id)
	)
	{$charset_collate};";

    $sql_user_ip = $wpdb->get_blog_prefix() . 'cccp_polly_user_ip';
    $sql_user_ip = "CREATE TABLE {$sql_user_ip} (
        id  int(20) unsigned NOT NULL auto_increment,
        user_ip varchar(64) NOT NULL default '' COMMENT 'IP юзера',
        parent int(20) NOT NULL COMMENT 'ID родителя вопроса',
        PRIMARY KEY  (id)
	)
	{$charset_collate};";

    $wpdb->query($sql_question);
    $wpdb->query($sql_answer);
    $wpdb->query($sql_user_ip);

}