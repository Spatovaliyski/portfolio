<?php
/*
Plugin Name: Work Projects
Description: Mini custom plugin with custom fields
Version: 1.0
Author: Martin Spatovaliyski
*/

class Work_Projects {
  /** 
   * Constructor
   */
  public function __construct() {
    add_action('init', array($this, 'register_post_type'));
    add_action('init', array($this, 'add_tags_support'));
    add_action('init', array($this, 'add_rest_api_support'));
    add_action('add_meta_boxes', array($this, 'add_custom_meta_box'));
    
    add_action('save_post', array($this, 'save_custom_fields'));
    add_action('rest_api_init', array($this, 'add_custom_fields_to_api'));

    add_action('admin_enqueue_scripts', array($this, 'enqueue_custom_styles'));
  }

  /** 
   * Register the custom post type
   * 
   * @return void
   */
  public function register_post_type() {
    $labels = array(
      'name'               => _x('Work Projects', 'Post Type General Name', 'martin'),
      'singular_name'      => _x('Work Project', 'Post Type Singular Name', 'martin'),
      'menu_name'          => __('Work Projects', 'martin'),
      'parent_item_colon'  => __('Parent Work Project:', 'martin'),
      'all_items'          => __('All Work Projects', 'martin'),
      'view_item'          => __('View Work Project', 'martin'),
      'add_new_item'       => __('Add New Work Project', 'martin'),
      'add_new'            => __('Add New', 'martin'),
      'edit_item'          => __('Edit Work Project', 'martin'),
      'update_item'        => __('Update Work Project', 'martin'),
      'search_items'       => __('Search Work Project', 'martin'),
      'not_found'          => __('Not found', 'martin'),
      'not_found_in_trash' => __('Not found in Trash', 'martin'),
    );

    $args = array(
      'label'               => __('work_projects', 'martin'),
      'description'         => __('Custom post type for work projects', 'martin'),
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
      'rewrite'             => array('slug' => 'work-projects'),
      'taxonomies'          => array('post_tag'),
    );

    register_post_type( 'work_projects', $args );
  }

  /** 
   * Add custom meta box
   * 
   * @return void
   */
  public function add_custom_meta_box() {
    add_meta_box(
      'work_projects_meta_box',
      'Work Projects Details',
      array($this, 'render_custom_fields_meta_box'),
      'work_projects',
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
    $end_year = get_post_meta($post->ID, 'end_year', true);
    $company_position = get_post_meta($post->ID, 'company_position', true);
    $repository = get_post_meta($post->ID, 'repository', true);
    ?>
  
    <div class="experience-meta-box">
      <div>
        <label for="end_year">Project Year:</label>
        <input type="text" id="end_year" name="end_year" value="<?php echo esc_attr($end_year); ?>">
      </div>
      <div>
        <label for="repository">Repository Link:</label>
        <input type="text" id="repository" name="repository" value="<?php echo esc_attr($repository); ?>">
      </div>
    </div>
    <?php
  }

  /** 
   * Save the custom fields
   * 
   * @param int $post_id
   */
  public function save_custom_fields($post_id) {
    if (array_key_exists('end_year', $_POST)) {
      update_post_meta(
        $post_id,
        'end_year',
        sanitize_text_field($_POST['end_year'])
      );
    }
  
    if (array_key_exists('repository', $_POST)) {
      update_post_meta(
        $post_id,
        'repository',
        sanitize_text_field($_POST['repository'])
      );
    }
  }

  /** 
   * Add custom fields to the REST API
   * 
   * @return void
   */
  public function add_custom_fields_to_api() {
    register_rest_field('work_projects',
      'the_content',
      array(
        'get_callback'    => array($this, 'get_the_content'),
        'update_callback' => null,
        'schema'          => null,
      )
    );

    register_rest_field('work_projects',
      'end_year',
      array(
        'get_callback'    => array($this, 'get_end_year'),
        'update_callback' => null,
        'schema'          => null,
      )
    );

    register_rest_field('work_projects',
      'repository',
      array(
        'get_callback'    => array($this, 'get_repository'),
        'update_callback' => null,
        'schema'          => null,
      )
    );

    register_rest_field('work_projects',
      'tags',
      array(
          'get_callback'    => array($this, 'get_tags'),
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
    $post_type_object = get_post_type_object('work_projects');
  
    if ($post_type_object) {
      $post_type_object->show_in_rest = true;
      $post_type_object->rest_base = 'work_projects';
      $post_type_object->rest_controller_class = 'WP_REST_Posts_Controller';
    }
  }

  /** 
   * Get the content
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
   * Get the end year
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
   * Get the repository
   * API callback
   * 
   * @param array $object
   * @param string $field_name
   * @param WP_REST_Request $request
   * 
   * @return string
   */
  public function get_repository($object, $field_name, $request) {
    return get_post_meta($object['id'], 'repository', true);
  }

  /**
   * Add tags support
   * 
   * @return void
   */
  public function add_tags_support() {
    register_taxonomy_for_object_type('post_tag', 'work_projects');
  }

  /**
   * Enqueue custom styles
   * 
   * @return void
   */
  public function enqueue_custom_styles() {
    wp_enqueue_style('work-projects-styles', plugin_dir_url(__FILE__) . 'style.css');
  }

  /**
   * Get the tags (Used as tech stack for each project item)
   * API callback
   * 
   * @param array $object
   * @param string $field_name
   * @param WP_REST_Request $request
   */
  public function get_tags($object, $field_name, $request) {
    $tags = wp_get_post_terms($object['id'], 'post_tag', array('fields' => 'names'));
    return $tags;
  }
}

// Instantiate the class
$work_projects = new Work_Projects();
