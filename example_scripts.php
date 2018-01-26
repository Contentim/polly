/*
// вывод скриптов при инициализации каждой страницы админки
add_action('init', 'init_scripts_method');
function init_scripts_method() {
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script( 'jquery' );

$jquery_ui = plugins_url( 'js/jquery-ui.js', __FILE__ );
wp_enqueue_script('jquery_ui', $jquery_ui, array('jquery') );

$custom_js = plugins_url( 'js/custom.js', __FILE__ );
wp_enqueue_script('custom_js', $custom_js, array('jquery') );

$ajax_js = plugins_url( 'js/ajax.js', __FILE__ );
wp_enqueue_script('ajax_js', $ajax_js, array('jquery') );
}
*/