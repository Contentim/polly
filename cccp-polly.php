<?php

/*
Plugin Name: CCCP Polly
Plugin URI: http://contentim.ru/mels-hello-world
Description: Краткое описание плагина.
Version: 1.0
Author: Ivan Goncharenko
Author URI: http://contentim.ru
*/

/*  Copyright 2018  Ivan Goncharenko  (email: contentim@yandex.ru)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Version of the plugin
define('CCCP_POLLY_CURRENT_VERSION', '1.0.0' );

define( 'CCCP_POLLY_PLUGIN', __FILE__ );
define( 'CCCP_POLLY_PLUGIN_DIR', untrailingslashit( dirname( CCCP_POLLY_PLUGIN ) ) );

//require_once (dirname(__FILE__).'/cccp-polly-action.php');
class cccp_polly_plugin{

    public function __construct(){
        if (is_admin()){
            require_once (dirname(__FILE__).'/admin/admin.php'); // backend-plugin
        }

        include_once dirname( __FILE__ ).'/activate.php'; // activation plugin
        include_once dirname( __FILE__ ).'/deactivate.php'; // deactivation plugin
        include dirname( __FILE__ ) . 'includes/shortcode.php'; // shortcode

        register_activation_hook( __FILE__,'cccp_polly_install');
        register_deactivation_hook(__FILE__,'cccp_polly_uninstall');

        add_action('init', array($this,'register_location_content_type')); //регистрирует тип контента местоположения
        add_action('admin_menu','cccp_polly_admin_pages');
        add_action('init','cccp_polly_init');

//        add_action('wp_ajax_(action)', 'my_action_callback');
//        add_action('wp_ajax_nopriv_(action)', 'my_action_callback');



    }
}

new cccp_polly_plugin();

?>