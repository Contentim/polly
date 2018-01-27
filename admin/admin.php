<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//$page1 = add_submenu_page('msp_helloworld', 'Overview : Creative Image Slider', 'Overview', 'manage_options', 'msp_helloworld', 'wpcis_admin');

// подключение скриптов на всех страницах админки
add_action('init', 'init_scripts_method');
function init_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );

    $jquery_ui = plugins_url( 'js/jquery-ui.js', __FILE__ );
    wp_enqueue_script('jquery_ui', $jquery_ui, array('jquery') );

    $polly_common_js = plugins_url( 'js/polly_common.js', __FILE__ );
    wp_enqueue_script('polly_common_js', $polly_common_js, array('jquery') );

}

function cccp_polly_add_options_link() {

//    echo '<script src="'.plugin_dir_url( __FILE__ ) .'js/jquery-1.11.3.min.js"></script>';
//    echo '<script src="'.plugin_dir_url( __FILE__ ) .'js/123213123.js"></script>';
//    echo '<script src="'.plugin_dir_url( __FILE__ ) .'js/jquery-ui.js"></script>';
//    echo '<link href="'.plugin_dir_url( __FILE__ ) .'/css/bootstrap.min.css" rel="stylesheet" type="text/css">';
    echo '<link href="'.plugin_dir_url( __FILE__ ) .'css/jquery-ui.css" rel="stylesheet" type="text/css">';
    echo '<link href="'.plugin_dir_url( __FILE__ ) .'css/common.css" rel="stylesheet" type="text/css">';


}

function cccp_polly_admin_pages(){
    $icon_url = plugins_url( '/images/icon.png' , __FILE__ );
    $page = add_menu_page(
        'Тестовая страница',
        'CCCP Polly',
        8,
        'cccp_polly',
        'cccp_options_page',
        $icon_url
    );
    // add_submenu_page('index.php','HW Submenu','msp_helloworld-submenu',1,'banners-status.php','banner-off');
    $sub_menu = add_submenu_page(
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

    // Используем зарегистрированную страницу для загрузки скрипта
    add_action( 'admin_print_scripts-'.$page, 'init_admin_scripts_main_menu' );

    ## Эта функция будет вызвана только на странице плагина, подключаем скрипт
    function init_admin_scripts_main_menu() {
        $ajax_js = plugins_url( 'js/ajax.js', __FILE__ );
        wp_enqueue_script('ajax_js', $ajax_js, array('jquery') );
    }

}

function cccp_options_page() {

    global $wpdb;
?>
    <h1><span><?php _e('Тестовая страница','CCCP Polly'); ?></span> Отладочная страница для будущего плагина слайдера</h1>

        <table class='hide'>
            <tr>
                <td>
                    <input type='submit' name='add_slider' value='Создать новый слайдер'/>
                </td>
            </tr>
        </table>

        <table class="wp-list-table widefat fixed striped posts wp-listslides-table hide ">
		<thead>
			<tr>
				<th class"manage-column column-title column-primary sortable title" id="title" scope="col">Заголовок</th>
				<th class="manage-column column-shortcode sortable shortcode" id="date" scope="col">Шорткод</th>
				<th class="manage-column column-id" id="post_id" scope="col">ID</th>
				<th class="manage-column column-delete" id="post_id" scope="col"></th>
			</tr>
		</thead>
		<tbody id="the-list">
			<tr class="iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto" id="post-4820">
				<td class="mels-slider-title" ><a href="javascript:;">Слайдер на главной</a></td>
				<td class="mels-slider-shortcode">[slider-4820]</td>
				<td class="mels-slider-id">4820</td>
				<td class="mels-slider-delete-current-item"><a href='javascript:;'>Удалить</a></td>
			</tr>
			<tr class="iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto" id="post-4820">
				<td class="mels-slider-title" ><a href="javascript:;">Слайдер на главной</a></td>
				<td class="mels-slider-shortcode">[slider-4820]</td>
				<td class="mels-slider-id">4820</td>
				<td class="mels-slider-delete-current-item"><a href='javascript:;'>Удалить</a></td>
			</tr>
			<tr class="iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto" id="post-4820">
				<td class="mels-slider-title" ><a href="javascript:;">Слайдер на главной</a></td>
				<td class="mels-slider-shortcode">[slider-4820]</td>
				<td class="mels-slider-id">4820</td>
				<td class="mels-slider-delete-current-item"><a href='javascript:;'>Удалить</a></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th class="manage-column column-title column-primary sortable title" id="title" scope="col">Заголовок</th>
				<th class="manage-column column-shortcode sortable shortcode" id="date" scope="col">Шорткод</th>
				<th class="manage-column column-id" id="post_id" scope="col">ID</th>
				<th class="manage-column column-delete" id="post_id" scope="col"></th>
			</tr>
		</tfoot>
	</table>

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

        <h2>Добавить вопрос</h2>
        <form name='cccp_polly_add_polly_form' method='post' action='<? echo $_SERVER['PHP_SELF']?>' id='add_new_question'>

<?php
    /*if (function_exists('wp_nonce_field')) {
        wp_nonce_field('cccp_polly_add_polly_form');
    }*/

    // init tables DB
    $table_question = $wpdb->get_blog_prefix().'cccp_polly_question';

    $future_id = $wpdb->get_results("
        SELECT max(id) as `maxid` FROM `".$table_question."`
    ");

    foreach ($future_id as $value) { $maxid = $value->maxid + 1; }
?>
        <table id="add_new_polly">
            <tr>
                <td>Задайте вопрос...</td>
                <td><input type='text' name='cccp_polly_new_question' id='new_question' value='' /><br>
                <input type='hidden' name='cccp_polly_future_id' value='<?php echo $maxid; ?>'/></td>
            </tr>
            <tr data-id="1">
                <td>Ответ:</td>
                <td ><input type='text' name='cccp_polly_answer[]' value='' /></td>
            </tr>
            <tr data-id="2">
                <td>Ответ:</td>
                <td ><input type='text' name='cccp_polly_answer[]' value='' /></td>
            </tr>
        </table>

        <table class="control_btn_new_polly">
            <tr>
                <td colspan="2"><input type="button" value="Добавить вопрос" class="button-primary" id="add_new_answer"/><br><br></td>
            </tr>
            <tr>
                <!--<td><input type='submit' name='cccp_polly_add_polly_btn' id='cccp_polly_add_polly_btn' value='Создать' /></td>-->
                <td><input type='button' name='cccp_polly_add_polly_btn' id='cccp_polly_add_polly_btn' class='button-primary' value='Создать' /></td>
                <td><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting loading_polly" style="display: none;"></td>
            </tr>
            <tr>
                <td><p id='client'></p><p id='server'></p></td>
                <td></td>
            </tr>
        </table>
    </form>

<?php

//    echo "<h2>Список вопросов</h2>";
    cccp_polly_change_polly();

    /*function add_shortcode() {
        echo "sdfsdf";
    }*/
    // add_shortcode( 'test_shortcode', 'add_shortcode' );


    //add_action('admin_print_scripts', 'my_action_javascript'); // такое подключение будет работать не всегда
}

add_action( 'wp_ajax_add_new_question', 'add_new_question' ); // For logged in users
//add_action( 'wp_ajax_nopriv_something', 'do_something_callback' ); // For anonymous users

function add_new_question(){
    global $wpdb;

    // init tables DB
    $table_question = $wpdb->get_blog_prefix().'cccp_polly_question';
    $table_answer = $wpdb->get_blog_prefix().'cccp_polly_answer';

    // init maxid in table DB
        $future_id = $wpdb->get_results("
            SELECT max(id) as `maxid` FROM `".$table_question."`
        ");

        foreach ($future_id as $value) { $maxid = $value->maxid + 1; }

    // add new question to DB
        $new_question = $_POST['new_question'];
        $wpdb->insert(
            $table_question,
            array('question'=>$new_question,'shortcode'=>''),
            array('%s','%s')
        );

    // add new answers to DB
        $new_answers = $_POST['new_answers'];

//        echo $table_answer;

        foreach($new_answers as $value) {
            $wpdb->insert(
                $table_answer,
                array('answer'=>$value,'counter'=>'0', 'parent'=>$maxid),
                array('%s','%s','%s')
            );
        };

    wp_die();
}

add_action( 'wp_ajax_update_current_question', 'update_current_question' ); // For logged in users

function update_current_question(){
    global $wpdb;

    // init tables DB
    $table_question = $wpdb->get_blog_prefix().'cccp_polly_question';
    $table_answer = $wpdb->get_blog_prefix().'cccp_polly_answer';

    $id_question = $_POST['id_question'];
    $val_question = $_POST['val_question'];
    $question_answers = $_POST['question_answers'];

    $wpdb->update(
        $table_question,
        array('question'=>$val_question,'shortcode'=>''),
        array('id' => $id_question ),
        array('%s','%s'),
        array( '%d' )
    );

    foreach($question_answers as $id => $value) {
        $wpdb->update(
            $table_answer,
            array('answer'=>$value, 'parent'=>$id_question),
            array('id' => $id ),
            array('%s','%s','%s'),
            array( '%d' )
        );
    };
}


function cccp_polly_change_polly() {
    global $wpdb;

    $table_question = $wpdb->get_blog_prefix().'cccp_polly_question';
    $table_answer = $wpdb->get_blog_prefix().'cccp_polly_answer';

    /*выборка вопросов*/
    $questions = $wpdb->get_results("
        SELECT ".$table_question.".id, ".$table_question.".question FROM `".$table_question."`
    ");

    /*выборка ответов*/
    $answers = $wpdb->get_results("
        SELECT ".$table_answer.".id, ".$table_answer.".parent, ".$table_answer.".answer FROM `".$table_answer."`
    ");

    foreach ($questions as $question) {
        echo "<ul>";
//        echo "<form action='' method='post' name='form_question_".$question->id."'>";
        echo "<li><p><b>ID=".$question->id."</b>
        <input name='question_".$question->id."' id='question_".$question->id."' type='text' value='".$question->question."'>
        <input type='hidden' value='".$question->id."' /></p></li>";

        foreach ($answers as $answer) {
            if ($question->id == $answer->parent) {
                echo "<li><input type='text' class='answer' value='".$answer->answer."'>";
                echo "<input type='hidden' value='".$answer->id."'></li>";
            }
        }
//        echo "<input type='submit' name='submit_question_".$question->id."' id='submit_question_".$question->id."' value='Сохранить вопрос №".$question->id."'>";
        echo "<button id='save_question_".$question->id."' class='button-primary'>Сохранить вопрос №".$question->id."</button> ";
        echo "<img src='/wp-admin/images/wpspin_light.gif' class='waiting loading_polly' style='display: none;'>";
        echo "<input type='button' name='submit_remove_question_".$question->id."' value='Удалить' class='button-primary'>";
        echo "</ul>";
    }

}


add_action('admin_head', 'cccp_polly_add_options_link');
