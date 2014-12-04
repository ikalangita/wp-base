<?php
	/*
	=====================================
	ADMINISTRATION LOGIN SCREEN
	1- Change login logo
	2- Login url
	3- Custom login title
	4- Admin bar, remove elements
	for more informations : http://goo.gl/pxmHzM
	=====================================*/
	add_action( 'login_head', 'custom_login_logo' );
	add_filter( 'login_headerurl', 'custom_login_url' );
	add_filter( 'login_headertitle', 'custom_login_title' );
	add_action( 'wp_before_admin_bar_render', 'admin_bar_remove', 0);

	function custom_login_logo() { ?>
		<style type="text/css">
			h1 a { 
				background-image:url(<?php echo get_template_directory_uri(); ?>/images/logo.png) !important; 
				-webkit-background-size: inherit !important;
				background-size: inherit !important; 
				height: 115px !important;
				width: 274px !important
			}

		</style>
		<?php
	}

	function custom_login_url() {
    	return home_url( '/' );
	}

	function custom_login_title() {
		$title = '';
    	return $title;
	}

	function admin_bar_remove() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('wp-logo');
	    $wp_admin_bar->remove_menu('comments');
	    $wp_admin_bar->remove_menu('new-content');
	    $wp_admin_bar->remove_menu('updates');
	    #...
	}