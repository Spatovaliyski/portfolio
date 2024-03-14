<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Theme_Options {
	public function __construct() {
		add_action('admin_menu', array($this, 'add_options_page'));
		add_action('admin_init', array($this, 'initialize_options'));
		add_action('rest_api_init', array($this, 'register_rest_route'));
	}

	/**
	 * Add options page
	 * 
	 * @return void
	 */
	public function add_options_page() {
		add_menu_page(
			'Theme Options', // page title
			'Theme Options', // menu title
			'manage_options', // permissions (capability)
			'theme-options', // slug
			array($this, 'render_options_page'), // callback
			'dashicons-admin-generic', // icon
			30 // menu position
		);
	}

	/**
	 * Initialize options
	 * 
	 * @return void
	 */
	public function initialize_options() {
		add_option('opentowork', false);
		register_setting('theme_options_group', 'opentowork', array($this, 'sanitize_checkbox'));
	}

	/**
	 * Sanitize checkbox
	 * 
	 * @param mixed $input
	 * @return bool
	 */
	public function sanitize_checkbox($input) {
		return isset($input) ? true : false;
	}

	/**
	 * Render the options page
	 * 
	 * @return void
	 */
	public function render_options_page() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
			<form method="post" action="options.php">
				<?php settings_fields('theme_options_group'); ?>
				<?php $opentowork = get_option('opentowork'); ?>
				<table class="form-table">
					<tr>
						<th scope="row">Open to Work</th>
						<td>
							<label for="opentowork">
								<input type="checkbox" id="opentowork" name="opentowork" <?php checked($opentowork, true); ?>>
								Enable Open to Work
							</label>
						</td>
					</tr>
				</table>
				<?php submit_button('Save Settings'); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * Register REST route
	 * 
	 * @return void
	 */
	public function register_rest_route() {
		register_rest_route('theme-options/v1', '/opentowork', array(
			'methods' => 'GET',
			'callback' => array($this, 'get_opentowork_option'),
			'permission_callback' => '__return_true',
		));
	}

	/**
	 * Get Open to Work option
	 * 
	 * @param WP_REST_Request $data
	 * @return bool
	 */
	public function get_opentowork_option($data) {
		$opentowork = get_option('opentowork');
		return array('opentowork' => (bool) $opentowork);
	}
}

$theme_options = new Theme_Options();