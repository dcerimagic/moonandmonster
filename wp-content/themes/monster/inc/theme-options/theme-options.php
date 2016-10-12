<?php
/**
 * Monster Theme Theme Options
 *
 * @package Monster
 * @since Monster 1.0
 */

/**
 * Register the form setting for our monster_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, monster_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since Monster 1.0
 */
function monster_theme_options_init() {
	register_setting(
		'monster_theme_options', // Options group, see settings_fields() call in monster_theme_options_render_page()
		'monster_theme_options', // Database option, see monster_get_theme_options()
		'monster_theme_options_validate' // The sanitization callback, see monster_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see monster_theme_options_add_page()
	);

	// Register our individual settings field

	add_settings_field( 'style', __( 'Monster Style', 'monster' ), 'monster_settings_field_style', 'theme_options', 'general' );
}
add_action( 'admin_init', 'monster_theme_options_init' );

/**
 * Change the capability required to save the 'monster_theme_options' options group.
 *
 * @see monster_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see monster_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function monster_theme_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_monster_theme_options', 'monster_theme_option_page_capability' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Monster 1.0
 */
function monster_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'monster' ),   // Name of page
		__( 'Theme Options', 'monster' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'monster_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'monster_theme_options_add_page' );

/**
 * Returns an array of sample select options registered for Monster Theme.
 *
 * @since Monster 1.0
 */
function monster_style() {
	$style = array(
		'frankie' => array(
			'value' =>	'frankie',
			'label' => __( 'Frankie', 'monster' )
		),
		'vampire' => array(
			'value' =>	'vampire',
			'label' => __( 'Vampire', 'monster' )
		),
		'spider' => array(
			'value' => 'spider',
			'label' => __( 'Spider', 'monster' )
		),
		'jack' => array(
			'value' => 'jack',
			'label' => __( 'Jack-o-lantern', 'monster' )
		),
		'demon' => array(
			'value' => 'demon',
			'label' => __( 'Demon', 'monster' )
		),
		'skull' => array(
			'value' => 'skull',
			'label' => __( 'Skull', 'monster' )
		)
	);

	/**
	 * Check the number of daily posts in the last week
	 * If it's greater than or equal to 7 add the zombie monster
	 */
	$daily_posts_last_week = monster_daily_posts_in_last_week();

	if ( 7 <= $daily_posts_last_week ) {
		$style['zombie']['value'] = 'zombie';
		$style['zombie']['label'] = __( 'Zombie', 'monster' );
	}

	/**
	 * Check to see if the user has ever made a post on Oct. 31.
	 * If so, add a new monster!
	 */

	if ( 'true' == monster_halloween_post_date() ) {
		$style['eyes']['value'] = 'eyes';
		$style['eyes']['label'] = __( 'Monster Eyes', 'monster' );
	}

	return apply_filters( 'monster_style', $style );
}


/**
 * Returns the options array for Monster Theme.
 *
 * @since Monster 1.0
 */
function monster_get_theme_options() {
	$saved = (array) get_option( 'monster_theme_options' );
	$defaults = array(
		'style' => 'frankie',
	);

	$defaults = apply_filters( 'monster_theme_default_theme_options', $defaults );

	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );

	return $options;
}

/**
 * Renders the style setting field.
 */
function monster_settings_field_style() {
	$options = monster_get_theme_options();

	foreach ( monster_style() as $button ) {
	?>
	<div class="layout">
		<label class="description">
			<div class="admin-monster" id="<?php echo esc_attr( $button['value'] ); ?>"></div>
			<input type="radio" name="monster_theme_options[style]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['style'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	}
}



/**
 * Renders the Theme Options administration screen.
 *
 * @since Monster 1.0
 */
function monster_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php $theme_name = wp_get_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'monster' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'monster_theme_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see monster_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since Monster 1.0
 */
function monster_theme_options_validate( $input ) {
	$output = array();

	// The style must actually be in the array of select options
	if ( isset( $input['style'] ) && array_key_exists( $input['style'], monster_style() ) )
		$output['style'] = $input['style'];

	return apply_filters( 'monster_theme_options_validate', $output, $input );
}


/**
 * Add theme options support in the Customizer
 */

function monster_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'monster_theme_options', array(
		'title'          => __( 'Theme Options', 'monster' ),
		'priority'       => 35,
	) );

	$wp_customize->add_setting( 'monster_theme_options[style]', array(
		'default'           => 'frankie',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'monster_sanitize_style',
	) );

	$wp_customize->add_control( 'monster_theme_style', array(
		'label'   => 'Select your monster:',
		'section' => 'monster_theme_options',
		'settings'	=> 'monster_theme_options[style]',
		'type'    => 'select',
		'choices' => array(
					 'frankie' 	=> __( 'Frankie', 'monster' ),
					 'vampire' 	=> __( 'Vampire', 'monster' ),
					 'spider'	=> __( 'Spider', 'monster' ),
					 'jack' 	=> __( 'Jack-o-lantern', 'monster' ),
					 'demon' 	=> __( 'Demon', 'monster' ),
					 'skull' 	=> __( 'Skull', 'monster' ),
					)
	) );

}

add_action( 'customize_register', 'monster_customize_register' );

//Sanitization function for Theme Style
function monster_sanitize_style( $input ) {
	$choices = array(
					 'frankie',
					 'vampire',
					 'spider',
					 'jack',
					 'demon',
					 'skull',
					 'zombie',
					 'eyes',
					);
					
	if ( ! in_array( $input, $choices ) ) 
		$input = 'frankie';
		
	return $input;
		
}
