<?php
	// Champs custom pour les taxos
// http://pippinsplugins.com/adding-custom-meta-fields-to-taxonomies/

function produit01_taxo_meta_fields($term) {
	// put the term ID into a variable
	$termID = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array // disp ($term_meta);
	$term_meta = get_option( 'taxonomy_' . $termID ); 
	
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[prod1]">Produit à la Une N°1</label></th>
		<td>
        	<?php
        	$args = array( 'post_type' => 'produit', 'order' => 'DESC');
			query_posts($args);
			?>
            <select  name="term_meta[prod1]" id="term_meta[prod1]">
            	<option value="">Selectionner un produit...</option>
				<?php
                while ( have_posts() ) : the_post();
					$postid = get_the_ID();
                    ?><option value="<?php echo $postid; ?>" <?php if($term_meta['prod1']==$postid) { echo 'selected="selected"'; } ?>><?php the_title(); ?></option><?php
                endwhile;
                ?>
        	</select>
			<p class="description">Sélectionnez le produit qui sera à la Une de la Gamme </p>
		</td>
	</tr>
	<?php
}

function save_produit01_taxo_meta_fields( $termID ) {
	$term_meta = get_option( 'taxonomy_' . $termID );
	if ( isset( $_POST['term_meta']['prod1'] ) ) {
		$term_meta['prod1'] = (int)$_POST['term_meta']['prod1'];
		update_option( 'taxonomy_' . $termID, $term_meta );
	}
	// disp($term_meta);	disp($_POST['term_meta']);	exit;
}

add_action( 'gamme_produit_add_form_fields', 'produit01_taxo_meta_fields' );
add_action( 'gamme_produit_edit_form_fields', 'produit01_taxo_meta_fields' );
add_action( 'created_gamme_produit', 'save_produit01_taxo_meta_fields' );
add_action( 'edited_gamme_produit',  'save_produit01_taxo_meta_fields' );

function produit02_taxo_meta_fields($term) {
	// put the term ID into a variable
	$termID = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array // disp ($term_meta);
	$term_meta = get_option( 'taxonomy_' . $termID ); 
	
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[prod2]">Produit à la Une N°2</label></th>
		<td>
        	<?php
        	$args = array( 'post_type' => 'produit', 'order' => 'DESC');
			query_posts($args);
			?>
            <select  name="term_meta[prod2]" id="term_meta[prod2]">
            	<option value="">Selectionner un produit...</option>
				<?php
                while ( have_posts() ) : the_post();
					$postid = get_the_ID();
                    ?><option value="<?php echo $postid; ?>" <?php if($term_meta['prod2']==$postid) { echo 'selected="selected"'; } ?>><?php the_title(); ?></option><?php
                endwhile;
                ?>
        	</select>
			<p class="description">Sélectionnez le produit qui sera à la Une de la Gamme </p>
		</td>
	</tr>
	<?php
}

function save_produit02_taxo_meta_fields( $termID ) {
	$term_meta = get_option( 'taxonomy_' . $termID );
	if ( isset( $_POST['term_meta']['prod2'] ) ) {
		$term_meta['prod2'] = (int)$_POST['term_meta']['prod2'];
		update_option( 'taxonomy_' . $termID, $term_meta );
	}
	// disp($term_meta);	disp($_POST['term_meta']);	exit;
}

add_action( 'gamme_produit_add_form_fields', 'produit02_taxo_meta_fields' );
add_action( 'gamme_produit_edit_form_fields', 'produit02_taxo_meta_fields' );
add_action( 'created_gamme_produit', 'save_produit02_taxo_meta_fields' );
add_action( 'edited_gamme_produit',  'save_produit02_taxo_meta_fields' );





function produit03_taxo_meta_fields($term) {
	// put the term ID into a variable
	$termID = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array // disp ($term_meta);
	$term_meta = get_option( 'taxonomy_' . $termID ); 
	
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[prod3]">Produit à la Une N°3</label></th>
		<td>
        	<?php
        	$args = array( 'post_type' => 'produit', 'order' => 'DESC');
			query_posts($args);
			?>
            <select  name="term_meta[prod3]" id="term_meta[prod3]">
            	<option value="">Selectionner un produit...</option>
				<?php
                while ( have_posts() ) : the_post();
					$postid = get_the_ID();
                    ?><option value="<?php echo $postid; ?>" <?php if($term_meta['prod3']==$postid) { echo 'selected="selected"'; } ?>><?php the_title(); ?></option><?php
                endwhile;
                ?>
        	</select>
			<p class="description">Sélectionnez le produit qui sera à la Une de la Gamme </p>
		</td>
	</tr>
	<tr>
		<th colspan="2"><br />Format de l'image : 220 X 132 px (Sans bandeau de couleur)</th>
	</tr>
	<?php
}

function save_produit03_taxo_meta_fields( $termID ) {
	$term_meta = get_option( 'taxonomy_' . $termID );
	if ( isset( $_POST['term_meta']['prod3'] ) ) {
		$term_meta['prod3'] = (int)$_POST['term_meta']['prod3'];
		update_option( 'taxonomy_' . $termID, $term_meta );
	}
	// disp($term_meta);	disp($_POST['term_meta']);	exit;
}

add_action( 'gamme_produit_add_form_fields', 'produit03_taxo_meta_fields' );
add_action( 'gamme_produit_edit_form_fields', 'produit03_taxo_meta_fields' );
add_action( 'created_gamme_produit', 'save_produit03_taxo_meta_fields' );
add_action( 'edited_gamme_produit',  'save_produit03_taxo_meta_fields' );