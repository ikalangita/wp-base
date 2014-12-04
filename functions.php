<?php

	require get_template_directory() . '/inc/login_screen.php';
	require get_template_directory() . '/inc/theme_options.php';
	require get_template_directory() . '/inc/dashboard.php';
	
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
	}

	

	
	
