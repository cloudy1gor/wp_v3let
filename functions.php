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
  add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('image') );
  register_nav_menus( [
    'header_menu' => 'Меню в шапке',
		// 'footer_menu' => 'Меню в подвале'
    ] );
    add_theme_support( 'title-tag' );
  }

add_action( 'after_setup_theme', 'vzlet_setup' );

$termlink = apply_filters( 'category_link', $termlink, $term->term_id );

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

