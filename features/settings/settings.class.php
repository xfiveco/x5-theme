<?php

/**
 *
 * @package WordPress
 * @subpackage X5 Theme
 * @author Rafal Gicgier rafal@x-team.com
 */
class X5_Settings {

	private $settings = array();

	function __construct($args = array()) {

		$this->settings = $args;

		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_menu', array( $this, 'options_page' ) );
	}

	/**
	* Generates Backend Page for options
	*
	* @hook add_theme_page
	*/
	public function do_options_page() {
	?>

    <div class="wrap">
		<?php
		if ( isset( $_GET['settings-updated'] ) ) { // input var okay
			echo "<div class='updated'><p>Theme settings updated successfully.</p></div>";
		}
		?>

		<?php
		// @todo http://codex.wordpress.org/Function_Reference/get_settings_errors
		$errors = get_settings_errors();

		if ( $errors ) {
			echo "<div class='error'>";
			foreach ( $errors as $error ) {
				echo esc_html( $error['message'] );
			}
			echo '</div>';
		}
		?>

      <form action="options.php" method="post">
        <?php
		settings_fields( 'x5_options' );
		do_settings_sections( 'x5_settings' );
		?>
        <br />
        <input name="x5_options[submit]" type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Settings', X5 ); ?>" />
      </form>
    </div>

    <?php
	}

	/**
	* Utility that registers setting, adds setting section and adds field for each
	* field provided through config array
	*
	* @hook admin_init
	*/
	function admin_init() {

		register_setting( 'x5_options', 'x5_options', array( $this, 'options_validate' ) );

		add_settings_section( 'x5_main', 'Main Settings', array( $this, 'options_text' ), 'x5_settings' );

		foreach ( $this->settings as $option ) {
			if ( isset( $option['generate_field_callback'] ) && isset( $option['validate_field_callback'] ) ) {
				add_settings_field( $option['name'], $option['desc'], $option['generate_field_callback'], 'x5_settings', 'x5_main', $option );
				continue;
			}
			add_settings_field( $option['name'], $option['desc'], array( $this, 'options_generate_fields' ), 'x5_settings', 'x5_main', $option );
		}
	}

	/**
	* Generate section's text
	*/
	function options_text() {
		echo '<p>Change the footer settings here.</p>';
	}

	/**
	* Generates fields for each option specified
	*
	* @param {array of strings} $option
	*/
	function options_generate_fields($option) {

		if ( 'text' == $option['type'] ) {
			$this->generate_text_field( $option );
		} else if ( 'dropdown_pages' == $option['type'] ) {
			$this->generate_dropdown_pages_field( $option );
		} else if ( 'wp_editor' == $option['type'] ) {
			$this->generate_wp_editor( $option );
		} else {
			// check if callback is defined
		}
	}

	/**
	* Generates text field
	*
	* @param {array of strings} $option
	*/
	function generate_text_field($option) {
		$options = get_option( 'x5_options' );
		if ( ! empty( $options[ $option['name'] ] ) ) {
			echo esc_attr( "<input id='{$option['name']}' name='x5_options[{$option['name']}]' size='80' type='text' value='{$options[ $option['name'] ]}' />" );
		} else {
			echo esc_attr( "<input id='{$option['name']}' name='x5_options[{$option['name']}]' size='80' type='text' value='' />" ); }
	}

	/**
	* Generates dropdown of all listed pages
	*
	* @param {array of strings} $option
	*/
	function generate_dropdown_pages_field($option) {
		$options = get_option( 'x5_options' );

		if ( ! empty( $options[ $option['name'] ] ) ) {
			$args = array(
			'selected' => $options[ $option['name'] ],
			'name' => "x5_options[{$option['name']}]",
			);
			wp_dropdown_pages( $args );
		} else {
			$args = array(
			'name' => "x5_options[{$option['name']}]",
			);
			wp_dropdown_pages( $args );
		}
	}

	/**
	* Generates wp_editor textarea
	*
	* @param {array of strings} $option
	*/
	function generate_wp_editor($option) {
		$options = get_option( 'x5_options' );

		$settings = array( 'textarea_name' => "x5_options[{$option['name']}]", 'media_buttons' => false, 'wpautop' => true );

		if ( ! empty( $options[ $option['name'] ] ) ) {
			wp_editor( $options[ $option['name'] ], $option['name'], $settings );
		} else {
			wp_editor( '', $option['name'], $settings ); }
	}

	/**
	* Validates the input
	*
	* @param {mixed} $input
	* @return {mixed}
	*/
	function options_validate($input) {
		$valid = array();

		foreach ( $this->settings as $option ) {
			if ( isset( $option['validate_field_callback'] ) ) {
				$valid[ $option['name'] ] = call_user_func( $option['validate_field_callback'], $input );
				continue;
			}
			if ( 'text' == $option['type'] ) {
				$valid[ $option['name'] ] = $input[ $option['name'] ]; }
			else if ( 'dropdown_pages' == $option['type'] ) {
				$valid[ $option['name'] ] = $input[ $option['name'] ];
			} else if ( 'wp_editor' == $option['type'] ) {
				$valid[ $option['name'] ] = $input[ $option['name'] ];
			}

			// @todo if
		}
		return $valid;
	}

	/**
	* Adds theme options page
	*
	* @hook admin_menu
	*/
	function options_page() {
		add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'x5_settings', array( $this, 'do_options_page' ) );
	}

}
