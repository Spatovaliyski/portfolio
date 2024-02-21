<?php
/*
Plugin Name: Work Experience
Description: Mini custom plugin with custom fields
Version: 1.0
Author: Martin Spatovaliyski
*/

class Work_Experience {
  /** 
   * Constructor
   */
  public function __construct() {
    add_action('init', array($this, 'register_post_type'));
    add_action('add_meta_boxes', array($this, 'add_custom_meta_box'));
    add_action('save_post', array($this, 'save_custom_fields'));
    add_action('init', array($this, 'add_rest_api_support'));
    add_action('rest_api_init', array($this, 'add_custom_fields_to_api'));

    add_action('admin_enqueue_scripts', array($this, 'enqueue_custom_styles'));
  }

  /** 
   * Register the custom post type
   * 
   * @return void
   * 
   */
  public function register_post_type() {
    $labels = array(
      'name'               => _x('Work Experiences', 'Post Type General Name', 'martin'),
      'singular_name'      => _x('Work Experience', 'Post Type Singular Name', 'martin'),
      'menu_name'          => __('Work Experiences', 'martin'),
      'parent_item_colon'  => __('Parent Work Experience:', 'martin'),
      'all_items'          => __('All Work Experiences', 'martin'),
      'view_item'          => __('View Work Experience', 'martin'),
      'add_new_item'       => __('Add New Work Experience', 'martin'),
      'add_new'            => __('Add New', 'martin'),
      'edit_item'          => __('Edit Work Experience', 'martin'),
      'update_item'        => __('Update Work Experience', 'martin'),
      'search_items'       => __('Search Work Experience', 'martin'),
      'not_found'          => __('Not found', 'martin'),
      'not_found_in_trash' => __('Not found in Trash', 'martin'),
    );

    $args = array(
      'label'               => __('work_experience', 'martin'),
      'description'         => __('Custom post type for work experiences', 'martin'),
      'labels'              => $labels,
      'supports'            => array('title', 'editor', 'thumbnail'),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-businessman',
      'show_in_admin_bar'   => true,
      'show_in_nav_menus'   => true,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => array('slug' => 'work-experience'),
    );

    register_post_type( 'work_experience', $args );
  }

  /** 
   * Add custom meta box
   * 
   * @return void
   */
  public function add_custom_meta_box() {
    add_meta_box(
      'work_experience_meta_box',
      'Work Experience Details',
      array($this, 'render_custom_fields_meta_box'),
      'work_experience',
      'normal',
      'default'
    );
  }

  /** 
   * Render custom fields meta box (No Plugin, natvie WP custom fields)
   * 
   * @param WP_Post $post
   * 
   * @return void
   */
  public function render_custom_fields_meta_box($post) {
    $start_year = get_post_meta($post->ID, 'start_year', true);
    $end_year = get_post_meta($post->ID, 'end_year', true);
    $company_position = get_post_meta($post->ID, 'company_position', true);
    $location = get_post_meta($post->ID, 'location', true);
    ?>
  
    <div class="experience-meta-box">
      <div>
        <label for="company_position">Position:</label>
        <input type="text" id="company_position" name="company_position" value="<?php echo esc_attr($company_position); ?>">
      </div>
      <div>
        <label for="start_year">Start Year:</label>
        <input type="text" id="start_year" name="start_year" value="<?php echo esc_attr($start_year); ?>">
      </div>
      <div>
        <label for="end_year">End Year:</label>
        <input type="text" id="end_year" name="end_year" value="<?php echo esc_attr($end_year); ?>">
      </div>
      <div>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo esc_attr($location); ?>">
      </div>
    </div>
    <?php
  }

  /** 
   * Save the custom fields
   * 
   * @param int $post_id
   * 
   * @return void
   */
  public function save_custom_fields($post_id) {
    if (array_key_exists('start_year', $_POST)) {
      update_post_meta(
        $post_id,
        'start_year',
        sanitize_text_field($_POST['start_year'])
      );
    }
  
    if (array_key_exists('end_year', $_POST)) {
      update_post_meta(
        $post_id,
        'end_year',
        sanitize_text_field($_POST['end_year'])
      );
    }
  
    if (array_key_exists('company_position', $_POST)) {
      update_post_meta(
        $post_id,
        'company_position',
        sanitize_text_field($_POST['company_position'])
      );
    }
  
    if (array_key_exists('location', $_POST)) {
      update_post_meta(
        $post_id,
        'location',
        sanitize_text_field($_POST['location'])
      );
    }
  }

  /** 
   * Add custom fields to the REST API
   * 
   * @return void
   */
  public function add_custom_fields_to_api() {
    register_rest_field('work_experience',
      'the_content',
      array(
        'get_callback'    => array($this, 'get_the_content'),
        'update_callback' => null,
        'schema'          => null,
      )
    );

    register_rest_field('work_experience',
      'start_year',
      array(
        'get_callback'    => array($this, 'get_start_year'),
        'update_callback' => null,
        'schema'          => null,
      )
    );

    register_rest_field('work_experience',
      'end_year',
      array(
        'get_callback'    => array($this, 'get_end_year'),
        'update_callback' => null,
        'schema'          => null,
      )
    );

    register_rest_field('work_experience',
      'company_position',
      array(
        'get_callback'    => array($this, 'get_company_position'),
        'update_callback' => null,
        'schema'          => null,
      )
    );

    register_rest_field('work_experience',
      'location',
      array(
        'get_callback'    => array($this, 'get_location'),
        'update_callback' => null,
        'schema'          => null,
      )
    );
  }

  /** 
   * Add REST API support
   * 
   * @return void
   */
  public function add_rest_api_support() {
    $post_type_object = get_post_type_object('work_experience');
  
    if ($post_type_object) {
      $post_type_object->show_in_rest = true;
      $post_type_object->rest_base = 'work_experience';
      $post_type_object->rest_controller_class = 'WP_REST_Posts_Controller';
    }
  }

  /** 
   * Get the content of the post
   * API callback
   * 
   * @param array $object
   * @param string $field_name
   * @param WP_REST_Request $request
   * 
   * @return string
   */
  public function get_the_content($object, $field_name, $request) {
    $content = get_post_field('post_content', $object['id']);
    return strip_tags($content);
  }
  
  /** 
   * Get the start year of the work experience
   * API callback
   * 
   * @param array $object
   * @param string $field_name
   * @param WP_REST_Request $request
   * 
   * @return string
   */
  public function get_start_year($object, $field_name, $request) {
    return get_post_meta($object['id'], 'start_year', true);
  }
  
  /** 
   * Get the end year of the work experience
   * API callback
   * 
   * @param array $object
   * @param string $field_name
   * @param WP_REST_Request $request
   * 
   * @return string
   */
  public function get_end_year($object, $field_name, $request) {
    return get_post_meta($object['id'], 'end_year', true);
  }

  /**
   * Get the company position
   * API callback
   * 
   * @param array $object
   * @param string $field_name
   * @param WP_REST_Request $request
   * 
   * @return string
   */
  public function get_company_position($object, $field_name, $request) {
    return get_post_meta($object['id'], 'company_position', true);
  }

  /**
   * Get the location
   * API callback
   * 
   * @param array $object
   * @param string $field_name
   * @param WP_REST_Request $request
   * 
   * @return string
   */
  public function get_location($object, $field_name, $request) {
    return get_post_meta($object['id'], 'location', true);
  }

  /**
   * Enqueue custom styles
   * 
   * @return void
   */
  public function enqueue_custom_styles() {
    wp_enqueue_style('work-experience-styles', plugin_dir_url(__FILE__) . 'style.css');
  }
}

// Instantiate the class
$work_experience = new Work_Experience();
