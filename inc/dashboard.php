<?php
	/*
	=====================================
	REMOVE UNUSED MENU FROM DASHBOARD
	index.php, edit-comments.php, tools.php, edit.php etc...
	for details visit http://goo.gl/SbLgKE
	=====================================*/
	add_action( 'admin_menu', 'remove_menus' );
	function remove_menus(){

		# remove_menu_page( 'index.php' );         
		# remove_menu_page( 'edit-comments.php' ); 
		# remove_menu_page( 'tools.php' );         
		# remove_menu_page( 'edit.php' ); 
		#...
	}