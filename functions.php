<?php

require __DIR__ . '/menu.php';

function vzlet_debug( $data ) {
	echo '<pre>' . print_r( $data, 1 ) . '</pre>';
}

function vzlet_scripts() {
	wp_enqueue_style('vzlet-main', get_template_directory_uri() . '/assets/css/style.min.css');
	// wp_enqueue_style( 'vzlet-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'vzlet-main', get_template_directory_uri() . '/assets/js/main.min.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'vzlet_scripts' );

// настройка тайтла страницы
add_filter( 'document_title', 'wp_kama_document_title_filter' );

function document_title_filter( $title ){
	// filter...
	return $title;
}

// настройка отрывка (длинна и вставка в конце)
add_filter( 'excerpt_more', function ( $more ) {
	return '...';
} );

add_filter( 'excerpt_length', function(){
	return 98;
} );


function vzlet_get_human_time() {
	$time_diff = human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) );

	return "Опубликовано $time_diff назад.";
}

function vzlet_setup() {
  	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('image') );
  register_nav_menus( [
    'header_menu' => 'Меню в шапке',
		// 'footer_menu' => 'Меню в подвале'
    ] );
    add_theme_support( 'title-tag' );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
  }

add_action( 'after_setup_theme', 'vzlet_setup' );

// $termlink = apply_filters( 'category_link', $termlink, $term->term_id );

function vzlet_post_thumb($id, $size = 'full', $wrapper_class = '', $img_class = '') {
$default_attr = array(
	'src'   => $src,
	'class' => $img_class,
	'alt'   => trim(strip_tags( $attachment->post_excerpt )),
	'title' => trim(strip_tags( $attachment->post_title )),
);

	// global $post;
	// $html = '<div class="' . $wrapper_class . '">';
	if ( has_post_thumbnail() ) {
		$html .= get_the_post_thumbnail( $id, $size, $default_attr );
	} else {
		// $html .= '<img src="https://picsum.photos/1200/900?grayscale" alt="" width="278px" height="170px" >';
	}
	// $html .= '</div>';

	return $html;
}

function vzlet_get_media( $types = array() ) {
	$content = apply_filters( 'the_content', get_the_content() );
	$items = get_media_embedded_in_content( $content, $types );
	return $items[0] ?? $items;
}

// Ограничение ревизий записи
if( ! defined( 'WP_POST_REVISIONS' ) ){
	define( 'WP_POST_REVISIONS', 3 );
}

## Полное Удаление версии WP
## Также нужно удалить файл readme.html в корне сайта
remove_action('wp_head', 'wp_generator'); // из заголовка
add_filter('the_generator', '__return_empty_string'); // из фидов и URL

// Отключим выводи ошибок на странице авторизации
add_filter('login_errors', 'login_obscure_func');
function login_obscure_func(){
	return 'Ошибка: вы ввели неправильный логин или пароль.';
}

## Отключим возможность редактировать файлы в админке для тем, плагинов
define('DISALLOW_FILE_EDIT', true);

## закроем возможность публикации через xmlrpc.php
add_filter('xmlrpc_enabled', '__return_false');

remove_filter ('the_content', 'wpautop');

// отключение уведомлений об обновлении
if( ! current_user_can( 'edit_users' ) ){
	add_filter( 'auto_update_core', '__return_false' );   // обновление ядра

	add_filter( 'pre_site_transient_update_core', '__return_null' );
}

// /* Выводим кол-во просмотров поста */
// function getPostViews($postID){
//     $count_key = 'post_views_count';
//     $count = get_post_meta($postID, $count_key, true);
//     if($count==''){
//         delete_post_meta($postID, $count_key);
//         add_post_meta($postID, $count_key, '0');
//         return "0 просмотров";
//     }
// 	echo _e(' &#128065; ', 'dot-b');
//     return $count;
// }
// function setPostViews($postID) {
//     $count_key = 'post_views_count';
//     $count = get_post_meta($postID, $count_key, true);
//     if($count==''){
//         $count = 0;
//         delete_post_meta($postID, $count_key);
//         add_post_meta($postID, $count_key, '0');
//     }else{
//         $count++;
//         update_post_meta($postID, $count_key, $count);
//     }
// }


// Подсчет количества посещений страниц
add_action( 'wp_head', 'kama_postviews' );

/**
 * @param array $args
 *
 * @return null
 */
function kama_postviews( $args = [] ){
	global $user_ID, $post, $wpdb;

	if( ! $post || ! is_singular() )
		return;

	$rg = (object) wp_parse_args( $args, [
		// Ключ мета поля поста, куда будет записываться количество просмотров.
		'meta_key' => 'views',
		// Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
		'who_count' => 1,
		// Исключить ботов, роботов? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.
		'exclude_bots' => true,
	] );

	$do_count = false;
	switch( $rg->who_count ){

		case 0:
			$do_count = true;
			break;
		case 1:
			if( ! $user_ID )
				$do_count = true;
			break;
		case 2:
			if( $user_ID )
				$do_count = true;
			break;
	}

	if( $do_count && $rg->exclude_bots ){

		$notbot = 'Mozilla|Opera'; // Chrome|Safari|Firefox|Netscape - все равны Mozilla
		$bot = 'Bot/|robot|Slurp/|yahoo';
		if(
			! preg_match( "/$notbot/i", $_SERVER['HTTP_USER_AGENT'] ) ||
			preg_match( "~$bot~i", $_SERVER['HTTP_USER_AGENT'] )
		){
			$do_count = false;
		}

	}

	if( $do_count ){

		$up = $wpdb->query( $wpdb->prepare(
			"UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s",
			$post->ID, $rg->meta_key
		) );

		if( ! $up )
			add_post_meta( $post->ID, $rg->meta_key, 1, true );

		wp_cache_delete( $post->ID, 'post_meta' );
	}

}

