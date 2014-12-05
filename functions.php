<?php

	require( dirname( __FILE__ ) . '/inc/login_screen.php';
	require( dirname( __FILE__ ) . '/inc/theme_options.php';
	require( dirname( __FILE__ ) . '/inc/dashboard.php';
	
	/*
	=====================================
	AFTER THEME SETUP ADD BASICS SETTINGS
	=====================================*/
	add_action( 'after_setup_theme', 'basics_settings' );
	function basics_settings(){

		// menu navigation
		add_theme_support( 'menus' );

		// post thumbnail support
		add_theme_support( 'post-thumbnails' );

		/* Loads the theme's translated strings. for more info : http://goo.gl/OYw8z6  */
		load_theme_textdomain( 'unique_id', get_template_directory() . '/languages' );
	}


	/*
	================================
	EXCERPT LENGTH
	Custom exceprt &content length
	usage : excerpt(20) - content(20)
	===============================
	*/

	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
	}

	function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'...';
		} else {
			$content = implode(" ",$content);
		}
		$content = preg_replace('/[.+]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	/*
	======================================
	POST THUMBNAIL URL
	Retrieve url from post_thumbnail image
	id : @int (ID of the attached post)
	$thumbnail_size : @int (full, medium, etc...)
	=====================================
	*/

	function thumb_url($id, $thumbnail_size){
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), $thumbnail_size );
		$url = $thumb['0'];
		return $url;
	}
	