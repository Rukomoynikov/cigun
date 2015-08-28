<?
// Add required plugins
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'register_required_plugins' );

function register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'contact-form-7',
			'slug'               => 'contact-form-7',
			'required'           => true,
			'version'            => '', 
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => 'wp-google-maps',
			'slug'               => 'wp-google-maps',
			'required'           => true,
			'version'            => '', 
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		)
	);

	tgmpa( $plugins);
};

?>

<?
// Customization theme settings page
add_action('customize_register', function($customizer){
    $customizer->add_section(
        'contact_form_section',
        array(
            'title' => 'Contact form',
            'description' => '',
            'priority' => 11,
        )
    );

    $customizer->add_setting(
	    'contact_form',
	    array('default' => '')
	);

	$customizer->add_control(
	    'contact_form',
	    array(
	        'label' => 'Please include shortcode from Contact Form 7',
	        'section' => 'contact_form_section',
	        'type' => 'text',
	    )
	);

    $customizer->add_section(
        'map_section',
        array(
            'title' => 'Google maps',
            'description' => '',
            'priority' => 11,
        )
    );

    $customizer->add_setting(
	    'google_map',
	    array('default' => '')
	);    

	$customizer->add_control(
	    'google_map',
	    array(
	        'label' => 'Please include shortcode from WP Google Maps',
	        'section' => 'map_section',
	        'type' => 'text',
	    )
	);

	$customizer->add_section('media_section', array(
		'title' => 'Header image, Logo, Fullscreen',
		"priority" => 11
	));

	$customizer->add_setting('fullscreen', array(
		'default' => 'no'
	));

	$customizer->add_control('fullscreen', array(
		'label' => 'Enable fullscreen markup',
		'type' => 'radio',
		'choices' => array(
			'no' => 'no',
			'yes' => 'yes'
		),
		'section' => 'media_section'
	));

	$customizer->add_setting('theme_logo');

	$customizer->add_control( new WP_Customize_Image_Control( $customizer, 'theme_logo', array(
	    'label'    => __( 'Logo', 'theme_logo' ),
	    'section'  => 'media_section',
	) ) );

	$customizer->add_setting('header_image');

	$customizer->add_control( new WP_Customize_Image_Control( $customizer, 'header_image', array(
	    'label'    => __( 'Header image', 'header_image' ),
	    'section'  => 'media_section',
	) ) );

});
?>

<?
// Posts type
add_action( 'init', 'create_features_and_citate_types');

function create_features_and_citate_types() {
  register_post_type( 'features',
    array(
      'labels' => array(
        'name' => __( 'Features' ),
        'singular_name' => __( 'Feature' )
      ),
      'public' => true,
      'has_archive' => true,
	  'supports' => array('title', 'editor', 'thumbnail')
    )
  );
  register_post_type( 'citates',
    array(
      'labels' => array(
        'name' => __( 'Citates' ),
        'singular_name' => __( 'Citate' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
};

add_action("admin_init", "portfolio_meta_box");   

function portfolio_meta_box(){  
    add_meta_box("projInfo-meta", "Project Options", "portfolio_meta_options", "acme_product", "side", "low");  
}  

function portfolio_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $link = $custom["projLink"][0];  
?>

 <label>Link:</label><input name="projLink" value="<?php echo $link; ?>" />  
<?php  
    }

add_action('save_post', 'save_project_link'); 
   
function save_project_link(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "projLink", $_POST["projLink"]); 
    } 
}

add_theme_support( 'post-thumbnails' ); 
?>