<?php

/*---------------------------------
* Hébergement
---------------------------------*/
function register_hebergement() {
	
	$labels = array(
		'name' => 'Hébergement',
		'singular_name' => 'hebergement',
		'add_new' => 'Ajouter un Hébergement',
		'add_new_item' => 'Ajouter un nouveau hébergement',
		'edit_item' => 'Editer l\'Hébergement',
		'new_item' => 'Nouveau Hébergement',
		'all_items' => 'Tous les Hébergement',
		'view_item' => 'Voir l\'Hébergement',
		'search_items' => 'Rechercher un hébergement',
		'not_found' =>  'Aucun hébergement trouvé',
		'not_found_in_trash' => 'Aucun hébergement trouvé dans la corbeille', 
		'parent_item_colon' => '',
		'menu_name' => 'Hébergement'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'publicly_queryable' => true,
		'rewrite' => array( 'slug' => 'hegergements' ),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'show_in_nav_menus' => true, 
		'query_var' => true,
		'menu_position' => null,
		'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail'),
		'menu_icon' => get_bloginfo('template_directory') . '/img/icons/rocket.png'  // URL de l'image
	); 

  register_post_type('hebergement', $args);
}
add_action('init', 'register_hebergement' );


/* Création d'une taxonomie Type de produit*/
add_action( 'init', 'create_categorie_presentatin', 0 );
function create_categorie_presentatin() 
{
	$labels = array(
    'name' => 'Gamme de Produit',
    'singular_name' => 'Gamme de Produit',
    'add_new' => 'Ajouter une Gamme',
    'add_new_item' => 'Ajouter une nouvelle Gamme',
    'edit_item' => 'Editer la Gamme',
    'new_item' => 'Nouvelle Gamme',
    'all_items' => 'Toutes les Gammes',
    'view_item' => 'Voir la Gamme',
    'search_items' => 'Rechercher une Gamme',
    'not_found' =>  'Aucune Gamme trouvée',
    'not_found_in_trash' => 'Aucune Gamme trouvée dans la corbeille', 
    'parent_item_colon' => '',
    'menu_name' => 'Gamme / Ss-Gamme'
  );

  $args = array(
    'hierarchical'            => true,
    'labels'                  => $labels,
	'public'				  => true,
    'show_ui'                 => true,
    'show_admin_column'       => true,
	'show_in_nav_menus'	 	  => true,
    'query_var'               => true,
	'hierarchical'	          => true,
    'rewrite'                 => array( 'slug' => 'nos-produits/gamme')
  );

  register_taxonomy('categories', array('presentation'), $args );
}
