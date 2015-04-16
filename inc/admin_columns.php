<?php

	/*=============================
	FILTRER LES OFFRES DANS L'ESPACE
	ADMINISTRATION.
	- Bâtiment
	===============================*/

	add_filter( 'pre_get_posts', 'ba_admin_posts_filter' );
	add_action( 'restrict_manage_posts', 'ba_admin_posts_filter_restrict_manage_posts' );

	function ba_admin_posts_filter( $query )
	{
	    global $pagenow;
	    global $typenow; 

	    if ( is_admin() && $pagenow == 'edit.php' && $typenow == 'offre_emploi') {

		    	$SELECT_FILTER_NAME  	= ( isset( $_GET['SELECT_FILTER_NAME'] ) ) 	 ? 	$_GET['SELECT_FILTER_NAME'] 	: '';
		    	$SELECT_FILTER_VALUE 	= ( isset( $_GET['SELECT_FILTER_VALUE'] ) )  ? 	$_GET['SELECT_FILTER_VALUE'] 	: '';
		    	$CONTRAT_FILTER_NAME 	= ( isset( $_GET['CONTRAT_FILTER_NAME'] ) )  ? 	$_GET['CONTRAT_FILTER_NAME'] 	: '';
		    	$CONTRAT_FILTER_VALUE 	= ( isset( $_GET['CONTRAT_FILTER_VALUE'] ) ) ? 	$_GET['CONTRAT_FILTER_VALUE'] 	: '';
		    	$LIEU_FILTER_NAME 		= ( isset( $_GET['LIEU_FILTER_NAME'] ) ) 	 ? 	$_GET['LIEU_FILTER_NAME'] 		: '';
		    	$LIEU_FILTER_VALUE 		= ( isset( $_GET['LIEU_FILTER_VALUE'] ) ) 	 ? 	$_GET['LIEU_FILTER_VALUE'] 		: '';

			    $meta_query = array(
			    	"relation" => "OR",
			    	array(
			    		"key" 	=> $SELECT_FILTER_NAME,
			    		"value" => $SELECT_FILTER_VALUE,
			    		"compare" => "="
			    	),
			    	array(
			    		"key" 	=> $CONTRAT_FILTER_NAME,
			    		"value" => $CONTRAT_FILTER_VALUE,
			    		"compare" => "="
			    	),
			    	array(
			    		"key" 	=> $LIEU_FILTER_NAME,
			    		"value" => $LIEU_FILTER_VALUE,
			    		"compare" => "="
			    	),
			    );

				$query->set( "meta_query", $meta_query );
			
	    }
	}

	function ba_admin_posts_filter_restrict_manage_posts()
	{
	    sect_list();
		contrat_list();
		lieu_list();
	}

	# Bâtiments
	function sect_list(){

		global $wpdb;
		$p = $wpdb->get_results( "SELECT * FROM 45tr4zzb_secteur", ARRAY_A  );
		$tree = buildTree($p);
		echo "<select name='SELECT_FILTER_VALUE'>";
		echo "<option selected='true' disabled> ===== SECTEUR ===== </option>";
		if(isset($_GET['SELECT_FILTER_VALUE'])){
			$actif = $_GET['SELECT_FILTER_VALUE'];
		}
		foreach ($tree as $t) {
			echo "<optgroup class='children' style='margin-left:18px' label='".mb_strtoupper($t['libel_secteur'], 'UTF-8')."'>";
			for ($i=0; $i < sizeof($t["children"]) ; $i++) { 

				$tid = $t["children"][$i]["id_secteur"];
				$val = $t["children"][$i]["libel_secteur"];

				if(isset($_GET['SELECT_FILTER_VALUE'])){
					$actif = $_GET['SELECT_FILTER_VALUE'];
					if( $actif == "secteur_".$tid){
						$checked = "selected";
					}else{
						$checked ="";
					}
				}

				echo "<option ".$checked." value='secteur_".$tid."'>".$val."</option>";
			}
			echo "</optgroup>";
			
		}
		echo "</select>";
		echo '<input type="hidden" name="SELECT_FILTER_NAME" value="field_id"> ';
	}

	function contrat_list(){
		global $wpdb;
		$q = $wpdb->get_results( "SELECT * FROM 45tr4zzb_contrat", ARRAY_A  );
		echo "<select name='CONTRAT_FILTER_VALUE'>";
		echo "<option selected='true' disabled> ===== CONTRAT ===== </option>";
		if(isset($_GET['CONTRAT_FILTER_VALUE'])){
			$actif = $_GET['CONTRAT_FILTER_VALUE'];
		}
		foreach ( $q as $c ) {
			# code...
			$contrat  	= $c["libel_contrat"];

			if(isset($_GET['CONTRAT_FILTER_VALUE'])){
				$actif = $_GET['CONTRAT_FILTER_VALUE'];
				if( $actif == $contrat){
					$checked = "selected";
				}else{
					$checked ="";
				}
			}

			echo "<option ".$checked."  value='".$contrat."'>".$contrat."</option>";
		}
		echo "</select>";
		echo '<input type="hidden" name="CONTRAT_FILTER_NAME" value="contrat"> ';
	}
	
	function lieu_list(){
		global $wpdb;
		$q = $wpdb->get_results( "SELECT * FROM 45tr4zzb_dpt", ARRAY_A  );
		echo "<select name='LIEU_FILTER_VALUE'>";
		echo "<option selected='true' disabled> ===== LIEU ===== </option>";
		if(isset($_GET['LIEU_FILTER_VALUE'])){
			$actif = $_GET['LIEU_FILTER_VALUE'];
			echo $actif;
		}
		foreach ($q as $l) {
			# code...
			$lieu = $l["libel_dpt"];

			if(isset($_GET['LIEU_FILTER_VALUE'])){
				$actif = $_GET['LIEU_FILTER_VALUE'];
				if( $actif == $lieu){
					$checked = "selected";
				}else{
					$checked ="";
				}
			}
			echo "<option ".$checked." value='".$lieu."'>".$lieu."</option>";
		}

		echo "</select>";
		echo '<input type="hidden" name="LIEU_FILTER_NAME" value="lieu"> ';
	}