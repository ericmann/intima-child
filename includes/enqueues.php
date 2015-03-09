<?php
namespace EAM\Enqueues;

function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp_enqueue_scripts', $n( 'theme_enqueue_styles' ) );
}

function theme_enqueue_styles() {
	wp_dequeue_style( 'default' );

	wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css'                         );
	wp_enqueue_style( 'child-style',  get_stylesheet_uri(),                       array( 'parent-style' ) );
	wp_enqueue_style( 'default',      get_stylesheet_directory_uri() . '/css/default.css' );
}