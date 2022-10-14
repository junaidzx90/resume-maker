<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Resume_Maker
 * @subpackage Resume_Maker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Resume_Maker
 * @subpackage Resume_Maker/public
 * @author     Developer Junayed <admin@easeare.com>
 */
class Resume_Maker_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_shortcode("resume_maker", [$this, "resume_maker_html"] );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Resume_Maker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Resume_Maker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/resume-maker-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Resume_Maker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Resume_Maker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( "rm-vue", plugin_dir_url( __FILE__ ) . 'js/vue.min.js', array(  ), $this->version, false );
		
		wp_enqueue_script( 'jspdf', plugin_dir_url( __FILE__ ) . 'js/pdf/jspdf.min.js', array(  ), $this->version, false );
		wp_enqueue_script( 'html2canvas', plugin_dir_url( __FILE__ ) . 'js/pdf/html2canvas.js', array(  ), $this->version, false );
		wp_enqueue_script( 'html2pdf', 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js', array(  ), $this->version, true );
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/resume-maker-public.js', array( 'jquery', 'rm-vue', 'jspdf', 'html2canvas', 'html2pdf' ), $this->version, false );

	}

	function resume_maker_html(){
		ob_start();
		require_once plugin_dir_path(__FILE__ )."partials/resume-maker-public-display.php";
		return ob_get_clean();
	}

}
