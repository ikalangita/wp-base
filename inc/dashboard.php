<?php
	/*
	=====================================
	REMOVE UNUSED MENU FROM DASHBOARD
	index.php, edit-comments.php, tools.php, edit.php etc...
	for details visit http://goo.gl/SbLgKE
	=====================================*/
	add_action( 'admin_menu', 'remove_menus' );
	add_action( 'wp_before_admin_bar_render', 'admin_bar_remove', 0);

	function remove_menus(){

		# remove_menu_page( 'index.php' );         
		# remove_menu_page( 'edit-comments.php' ); 
		# remove_menu_page( 'tools.php' );         
		# remove_menu_page( 'edit.php' ); 
		#...
	}

	function admin_bar_remove() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('wp-logo');
	    $wp_admin_bar->remove_menu('comments');
	    $wp_admin_bar->remove_menu('new-content');
	    $wp_admin_bar->remove_menu('updates');
	    #...
	}

	/*
	============================================
	TINYMCE FORMAT STYLE
	to get format dropdown, use advanced tinymce
	plugin
	--------------------------------------------
	1- custom style for format dropdown
	2- custom style for tinymce editor
	For more informations visit : 
	============================================
	*/

	function mce_styles_format( $init_array ) {  

		$style_formats = array(  

			array(  
				'title' => 'style_title',  
				'block' => 'tag_name',  
				'classes' => 'class_name',
				'wrapper' => true,
				)
			),
			array(  
				'title' => 'style_title',  
				'block' => 'tag_name',  
				'classes' => 'class_name',
				'wrapper' => true,
				)
			); 

		$init_array['style_formats'] = json_encode( $style_formats );  

		return $init_array;  

	} 

	add_filter( 'tiny_mce_before_init', 'mce_styles_format' ); 

	function editor_style() {
		add_editor_style( 'css/editor-style.css' );
	}
	add_action( 'init', 'editor_style' );

	/*
	===================================================
	SIMPLE PAGE ORDERING
	http://goo.gl/6D36R7
	order posts with drag and drop from admin dashboard
	Note : for post type, remplace post_type_name
	by the name of a post type
	===================================================
	*/
	function my_default_sort() {
		$post_type = (isset($_GET['post_type'])) ? $_GET['post_type'] : '';
		if ($post_type) {
			if ($post_type == 'post_type_name') {
				if (!isset($_GET['orderby'])) $_GET['orderby'] = 'menu_order+title';
			}
		}
	}
	add_action( 'load-edit.php', 'my_default_sort' );