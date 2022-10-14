<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Resume_Maker
 * @subpackage Resume_Maker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Resume_Maker
 * @subpackage Resume_Maker/admin
 * @author     Developer Junayed <admin@easeare.com>
 */
class Resume_Maker_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/resume-maker-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/resume-maker-admin.js', array( 'jquery' ), $this->version, false );

	}

	function admin_menu_pages(){
		add_menu_page("Resume maker", "Resume maker", "manage_options", "resume-maker", [$this, "resume_maker_setting"], "dashicons-media-document", 45 );
		add_settings_section( 'resume_maker_section', '', '', 'resume_maker_page' );

		// Details
		add_settings_field( 'rm_text_details', 'Details', [$this, 'rm_text_details_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_details' );
		// PHONE
		add_settings_field( 'rm_text_phone', 'Phone', [$this, 'rm_text_phone_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_phone' );
		// EMAIL
		add_settings_field( 'rm_text_email', 'Email', [$this, 'rm_text_email_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_email' );
		// CITY
		add_settings_field( 'rm_text_city', 'City', [$this, 'rm_text_city_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_city' );
		// Birthday
		add_settings_field( 'rm_text_birthday', 'Birthday', [$this, 'rm_text_birthday_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_birthday' );
		// SKILLS
		add_settings_field( 'rm_text_skills', 'Skills', [$this, 'rm_text_skills_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_skills' );
		// Languages
		add_settings_field( 'rm_text_languages', 'Languages', [$this, 'rm_text_languages_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_languages' );
		// PROFILE
		add_settings_field( 'rm_text_profile', 'Profile', [$this, 'rm_text_profile_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_profile' );
		// EDUCATION'S
		add_settings_field( 'rm_text_educations', 'Educations', [$this, 'rm_text_educations_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_educations' );
		// School
		add_settings_field( 'rm_text_school', 'School', [$this, 'rm_text_school_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_school' );
		// Certificate
		add_settings_field( 'rm_text_certificate', 'Certificate', [$this, 'rm_text_certificate_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_certificate' );
		// Start & End Date
		add_settings_field( 'rm_text_start_end_date', 'Start & End Date', [$this, 'rm_text_start_end_date_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_start_end_date' );
		// Description
		add_settings_field( 'rm_text_description', 'Description', [$this, 'rm_text_description_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_description' );
		// EMPLOYMENT HISTORIE'S
		add_settings_field( 'rm_text_employment_histories', 'Employment histories', [$this, 'rm_text_employment_histories_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_employment_histories' );
		// Job Title
		add_settings_field( 'rm_text_job_title', 'Job Title', [$this, 'rm_text_job_title_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_job_title' );
		// Employer
		add_settings_field( 'rm_text_employer', 'Employer', [$this, 'rm_text_employer_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_employer' );
		// Undefined
		add_settings_field( 'rm_text_undefined', 'Undefined', [$this, 'rm_text_undefined_cb'], 'resume_maker_page', 'resume_maker_section' );
		register_setting( 'resume_maker_section', 'rm_text_undefined' );
	}

	function rm_text_details_cb(){
		echo '<input type="text" name="rm_text_details" value="'.get_option('rm_text_details').'" class="widefat">';
	}
	function rm_text_phone_cb(){
		echo '<input type="text" name="rm_text_phone" value="'.get_option('rm_text_phone').'" class="widefat">';
	}
	function rm_text_email_cb(){
		echo '<input type="text" name="rm_text_email" value="'.get_option('rm_text_email').'" class="widefat">';
	}
	function rm_text_city_cb(){
		echo '<input type="text" name="rm_text_city" value="'.get_option('rm_text_city').'" class="widefat">';
	}
	function rm_text_birthday_cb(){
		echo '<input type="text" name="rm_text_birthday" value="'.get_option('rm_text_birthday').'" class="widefat">';
	}
	function rm_text_skills_cb(){
		echo '<input type="text" name="rm_text_skills" value="'.get_option('rm_text_skills').'" class="widefat">';
	}
	function rm_text_languages_cb(){
		echo '<input type="text" name="rm_text_languages" value="'.get_option('rm_text_languages').'" class="widefat">';
	}
	function rm_text_profile_cb(){
		echo '<input type="text" name="rm_text_profile" value="'.get_option('rm_text_profile').'" class="widefat">';
	}
	function rm_text_educations_cb(){
		echo '<input type="text" name="rm_text_educations" value="'.get_option('rm_text_educations').'" class="widefat">';
	}
	function rm_text_school_cb(){
		echo '<input type="text" name="rm_text_school" value="'.get_option('rm_text_school').'" class="widefat">';
	}
	function rm_text_certificate_cb(){
		echo '<input type="text" name="rm_text_certificate" value="'.get_option('rm_text_certificate').'" class="widefat">';
	}
	function rm_text_start_end_date_cb(){
		echo '<input type="text" name="rm_text_start_end_date" value="'.get_option('rm_text_start_end_date').'" class="widefat">';
	}
	function rm_text_description_cb(){
		echo '<input type="text" name="rm_text_description" value="'.get_option('rm_text_description').'" class="widefat">';
	}
	function rm_text_employment_histories_cb(){
		echo '<input type="text" name="rm_text_employment_histories" value="'.get_option('rm_text_employment_histories').'" class="widefat">';
	}
	function rm_text_job_title_cb(){
		echo '<input type="text" name="rm_text_job_title" value="'.get_option('rm_text_job_title').'" class="widefat">';
	}
	function rm_text_employer_cb(){
		echo '<input type="text" name="rm_text_employer" value="'.get_option('rm_text_employer').'" class="widefat">';
	}
	function rm_text_undefined_cb(){
		echo '<input type="text" name="rm_text_undefined" value="'.get_option('rm_text_undefined').'" class="widefat">';
	}

	function resume_maker_setting(){
		?>
		<h3>Settings</h3>
		<hr>
		<div style="width: 50%" class="ph-settings">
            <form method="post" action="options.php">
                <?php
                settings_fields( 'resume_maker_section' );
                do_settings_sections('resume_maker_page');
                echo get_submit_button( 'Save Changes', 'primary', 'save-rm-setting' );
                ?>
            </form>
        </div>
		<?php
	}
}
