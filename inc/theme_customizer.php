<?php
	<?php
	
	add_action( 'customize_register', 'clb_customizer' );

	function clb_customizer( $wp_customize ) {

		/*---------------------------------
		* Suppression des settings par defaut
		---------------------------------*/
    	$wp_customize->remove_section('static_front_page');

    
		/*---------------------------------
		* Section 
		1- Site  ( Logo, verset )
		2- Réseaux sociaux
		3- Copyright
		---------------------------------*/

		/* --------------------------------
		1- Le site
		-------------------------------- */
		$wp_customize->add_section( 
			'clb_logo_section' , array(
		    'title'       => __( 'Logo du site & copyright', 'clb' ),
		    'priority'    => 29,
		    'description' => 'Personnaliser le logo',
		) );

		$wp_customize->add_setting(  'clb_logo_settings'  );
		$wp_customize->add_setting(  'clb_copyright'  );
		$wp_customize->add_setting(  'clb_verset'  );

		/* --------------------------------
		Ajout upload logo
		-------------------------------- */
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'clb_logo', array(
		    'label'    => __( 'Logo', 'clb' ),
		    'section'  => 'clb_logo_section',
		    'settings' => 'clb_logo_settings',
		) ) );

		/* --------------------------------
		Ajout champ copyright
		-------------------------------- */
		$wp_customize->add_control(
    		'clb_copyright',
   		 	array(
        		'label' => 'Copyright',
        		'section' => 'clb_logo_section',
        		'type' => 'text',
    		)
		);

		/* --------------------------------
		Ajout champ verset
		-------------------------------- */
		
		$wp_customize->add_control(
    		'clb_verset',
   		 	array(
        		'label' => 'Livre',
        		'section' => 'title_tagline',
        		'type' => 'text',
    		)
		);

		/* --------------------------------
		2- Les réseaux sociaux
		-------------------------------- */
	    $wp_customize->add_section(
	        'reseaux',
	        array(
	            'title' => __( 'Réseaux sociaux', 'clb' ),
	            'description' => 'Les réseaux sociaux du site',
	            'priority' => 35,
	        )
	    );

	    $wp_customize->add_setting( 'fb_link' );
	    $wp_customize->add_setting( 'tw_link' );
	    $wp_customize->add_setting( 'ancre_rs_setting', array(
		    'default'        => 'Some default text for the textarea',
		) );

	    /* --------------------------------
		Ajout champ facebook
		-------------------------------- */
		$wp_customize->add_control(
    		'fb_link',
   		 	array(
        		'label' => 'Facebook',
        		'section' => 'reseaux',
        		'type' => 'text',
    		)
		);

		/* --------------------------------
		Ajout champ twitter
		-------------------------------- */
		$wp_customize->add_control(
    		'tw_link',
   		 	array(
        		'label' => 'Twitter',
        		'section' => 'reseaux',
        		'type' => 'text',
    		)
		);

		/* --------------------------------
		Ajout textarea texte d'ancrage rs
		-------------------------------- */
		/*---------------------------------
		* Etendre le theme customizer de wp
		---------------------------------*/
		class Ajouter_Textarea extends WP_Customize_Control {
	    	public $type = 'textarea';
	 
		    public function render_content() {
		        ?>
		        <label>
		        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		        </label>
		        <?php
		    }
		}

		$wp_customize->add_control( new Ajouter_Textarea( $wp_customize, 'ancre_rs_setting', array(
		    'label'   => 'Texte d\'ancrage réseaux sociaux',
		    'section' => 'reseaux',
		    'settings'   => 'ancre_rs_setting',
		) ) );
		
	}
	