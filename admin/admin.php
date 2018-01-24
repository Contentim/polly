<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//$page1 = add_submenu_page('msp_helloworld', 'Overview : Creative Image Slider', 'Overview', 'manage_options', 'msp_helloworld', 'wpcis_admin');

function cccp_polly_add_options_link() {
    echo '<script src="'.plugin_dir_url( __FILE__ ) .'/js/jquery-ui.js"></script>';
    echo '<script src="'.plugin_dir_url( __FILE__ ) .'/js/custom.js"></script>';
//    echo '<link href="'.plugin_dir_url( __FILE__ ) .'/css/bootstrap.min.css" rel="stylesheet" type="text/css">';
    echo '<link href="'.plugin_dir_url( __FILE__ ) .'/css/jquery-ui.css" rel="stylesheet" type="text/css">';
    echo '<link href="'.plugin_dir_url( __FILE__ ) .'/css/common.css" rel="stylesheet" type="text/css">';
}

 
function cccp_polly_admin_pages(){
    $icon_url=plugins_url( '/images/icon.png' , __FILE__ );
    add_menu_page(
        'Тестовая страница',
        'CCCP Polly',
        8,
        'cccp_polly',
        'cccp_options_page',
        $icon_url
    );
    // add_submenu_page('index.php','HW Submenu','msp_helloworld-submenu',1,'banners-status.php','banner-off');
    add_submenu_page(
        'cccp_polly',
        __( 'Произвольная страница подменю 1', 'CCCP Polly' ),
        __( 'Подпункт 1', 'CCCP Polly' ),
        'manage_options',
        CCCP_POLLY_PLUGIN_DIR . '/admin/cccp-polly-submenu.php'
    );
    add_submenu_page(
        'cccp_polly',
        'Произвольная страница подменю 2',
        'Подпункт 2(empty)',
        'manage_options',
        CCCP_POLLY_PLUGIN_DIR . '/admin/cccp-polly-sub.php'
    );
//    add_submenu_page('msp_options_page', 'Основное доп. меню', 'Мое основное меню', 'manage_options', 'helloworld-submenu');
//    add_submenu_page( 'helloworld-submenu.php', 'Заголовок страницы', 'Название пункта меню', 'manage_options', basename(dirname(__FILE__)).'/helloworld-submenu.php' );
}



function cccp_options_page() {

    global $wpdb;

    echo "<h1><span>TEST:</span> Отладочная страница для будущего плагина слайдера</h1>";

    echo "
        <table class='hide'>
            <tr>
                <td>
                    <input type='submit' name='add_slider' value='Создать новый слайдер'/>
                </td>
            </tr>
        </table>
    ";

    echo "
        <table class=\"wp-list-table widefat fixed striped posts wp-listslides-table hide \">
		<thead>
			<tr>
				<th class=\"manage-column column-title column-primary sortable title\" id=\"title\" scope=\"col\">Заголовок</th>
				<th class=\"manage-column column-shortcode sortable shortcode\" id=\"date\" scope=\"col\">Шорткод</th>
				<th class=\"manage-column column-id\" id=\"post_id\" scope=\"col\">ID</th>
				<th class=\"manage-column column-delete\" id=\"post_id\" scope=\"col\"></th>
			</tr>
		</thead>
		<tbody id=\"the-list\">
			<tr class=\"iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto\" id=\"post-4820\">
				<td class=\"mels-slider-title\" ><a href=\"javascript:;\">Слайдер на главной</a></td>
				<td class=\"mels-slider-shortcode\">[slider-4820]</td>
				<td class=\"mels-slider-id\">4820</td>
				<td class=\"mels-slider-delete-current-item\"><a href='javascript:;'>Удалить</a></td>
			</tr>
			<tr class=\"iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto\" id=\"post-4820\">
				<td class=\"mels-slider-title\" ><a href=\"javascript:;\">Слайдер на главной</a></td>
				<td class=\"mels-slider-shortcode\">[slider-4820]</td>
				<td class=\"mels-slider-id\">4820</td>
				<td class=\"mels-slider-delete-current-item\"><a href='javascript:;'>Удалить</a></td>
			</tr>
			<tr class=\"iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto\" id=\"post-4820\">
				<td class=\"mels-slider-title\" ><a href=\"javascript:;\">Слайдер на главной</a></td>
				<td class=\"mels-slider-shortcode\">[slider-4820]</td>
				<td class=\"mels-slider-id\">4820</td>
				<td class=\"mels-slider-delete-current-item\"><a href='javascript:;'>Удалить</a></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th class=\"manage-column column-title column-primary sortable title\" id=\"title\" scope=\"col\">Заголовок</th>
				<th class=\"manage-column column-shortcode sortable shortcode\" id=\"date\" scope=\"col\">Шорткод</th>
				<th class=\"manage-column column-id\" id=\"post_id\" scope=\"col\">ID</th>
				<th class=\"manage-column column-delete\" id=\"post_id\" scope=\"col\"></th>
			</tr>
		</tfoot>
	</table>
    ";

    echo '
        <div class="msp-panel-body hide">
            <div class="wrap_vertical_tab">
                <div id="tabs-msp-slider">
                  <ul>
                    <li><a href="#tabs-1">Background</a></li>
                    <li><a href="#tabs-2">Animation</a></li>
                    <li><a href="#tabs-3">Action</a></li>
                    <li><a href="#tabs-4">Attributes</a></li>
                  </ul>
                  <div id="tabs-1">
                    <h2>Background</h2>
                    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                  </div>
                  <div id="tabs-2">
                    <h2>Animation</h2>
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                  </div>
                  <div id="tabs-3">
                    <h2>Action</h2>
                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                  </div>
                  <div id="tabs-4">
                    <h2>Attributes</h2>
                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                  </div>
                </div>
            </div>
        </div>
    ';

    echo "<h2>Добавить вопрос</h2>";

    echo "
            <form name='cccp_polly_add_polly_form' method='post' action='".$_SERVER['PHP_SELF']."?page=cccp_polly&amp;update=true'>  
        ";

    /*if (function_exists('wp_nonce_field')) {
        wp_nonce_field('cccp_polly_add_polly_form');
    }*/

    $future_id = $wpdb->get_results("
        SELECT max(id) as `maxid` FROM `wp_cccp_polly_question`
    ");

    foreach ($future_id as $value) { $maxid = $value->maxid + 1; }

    echo "
        <table>
            <tr>
                <td>Задайте вопрос...</td>
                <td><input type='text' name='cccp_polly_question' /><br>
                <input type='hidden' name='cccp_polly_future_id' value='".$maxid."'/></td>
            </tr>
            <tr>
                <td>Ответ №1</td>
                <td><input type='text' name='cccp_polly_answer[]' /></td>
            </tr>
            <tr>
                <td>Ответ №2</td>
                <td><input type='text' name='cccp_polly_answer[]' /></td>
            </tr>
            <tr>
                <td>Ответ №3</td>
                <td><input type='text' name='cccp_polly_answer[]' /></td>
            </tr>
            <tr>
                <td><input type='submit' name='cccp_polly_add_polly_btn' value='Создать' /></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
    ";

    $table_question = $wpdb->get_blog_prefix().'cccp_polly_question';
    $table_answer = $wpdb->get_blog_prefix().'cccp_polly_answer';

    if (isset($_POST['cccp_polly_add_polly_btn'])){
        $cccp_polly_question = $_POST['cccp_polly_question'];
        $cccp_polly_answer = $_POST['cccp_polly_answer'];

        $wpdb->insert(
            $table_question,
            array('question'=>$cccp_polly_question,'shortcode'=>''),
            array('%s','%s')
        );

        /*$wpdb->insert(
                $table_answer,
                array('answer'=>$cccp_polly_answer,'counter'=>'0', 'parent'=>$maxid),
                array('%s','%s','%s')
            );*/

        function polly_add_answers($wpdb, $table_answer, $value, $parentId){
            $wpdb->insert(
                $table_answer,
                array('answer'=>$value,'counter'=>'0', 'parent'=>$parentId),
                array('%s','%s','%s')
            );
        }

        foreach($cccp_polly_answer as $value) {
            polly_add_answers($wpdb, $table_answer, $value, $maxid);
        };
        
    }

    echo "<h2>Список вопросов</h2>";
    cccp_polly_change_polly();

    function add_shortcode() {
        echo "sdfsdf";
    }

    // add_shortcode( 'test_shortcode', 'add_shortcode' );
}

function cccp_polly_change_polly() {
    global $wpdb;
    $table_polly = $wpdb->get_blog_prefix().'cccp_polly_question';

    /*
    if (isset($_POST['cccp_polly_add_polly_btn'])){
        $id_polly = $_POST['id'];
        $question_polly = $_POST['question'];
        $shortcode_polly = $_POST['shortcode'];

        $wpdb->update(
            $table_polly,
            array('question'=>$question_polly,'shortcode'=>$shortcode_polly),
            array('id'=>$id_polly),
            array('%s','%s'),
            array('%d')
        );
    }
    */

    // вывод списка вопросов
    /*$questions = $wpdb->get_results("
        SELECT wp_cccp_polly_question.question, wp_cccp_polly_answer.answer FROM `wp_cccp_polly_question`, `wp_cccp_polly_answer` WHERE wp_cccp_polly_question.id = wp_cccp_polly_answer.parent
    ");*/

    $questions = $wpdb->get_results("
        SELECT wp_cccp_polly_question.id, wp_cccp_polly_question.question FROM `wp_cccp_polly_question`
    ");

    $answers = $wpdb->get_results("
        SELECT wp_cccp_polly_answer.parent, wp_cccp_polly_answer.answer FROM `wp_cccp_polly_answer`
    ");

    foreach ($questions as $question) {
            echo "<p><b>ID=".$question->id."</b> ".$question->question."</p>"."<input type='text' value='".$question->question."'>";
            foreach ($answers as $answer) {
                echo "<ul>";
                if ($question->id == $answer->parent) {
                    echo "<li>- ".$answer->answer."</li>";
                }
                echo "</ul>";
            }
        }

}

function cccp_polly_add_polly(){
    global $wpdb;

    $table_question = $wpdb->prefix.cccp_polly_question;
//    $table_answer = $wpdb->prefix.cccp_polly_answer;

    /*if (isset($_POST['cccp_polly_add_polly_btn'])){
        if (function_exists('current_user_can') && !current_user_can('manage_options')) {
            die (_e('Hacker?','cccp'));
        }
    }
    if (function_exists('check_admin_referer')) {
        check_admin_referer('cccp_polly_add_polly_form');
    }*/


}


/*function cccp_submenu_page_content() {
    echo '<div class="wrap">';
    echo '<h2>Page Title</h2>';
    echo '</div>';
}*/



add_action('admin_head', 'cccp_polly_add_options_link');
