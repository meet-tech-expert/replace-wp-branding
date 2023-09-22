<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://www.linkedin.com/in/rinkesh-gupta/
 * @since      1.0.0
 *
 * @package    Replace_Wp_Branding
 * @subpackage Replace_Wp_Branding/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Replace_Wp_Branding
 * @subpackage Replace_Wp_Branding/admin
 * @author     Rinkesh Gupta <rinkesh412@gmail.com>
 */
class Replace_Wp_Branding_Admin {

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Replace_Wp_Branding_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Replace_Wp_Branding_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/replace-wp-branding-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Replace_Wp_Branding_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Replace_Wp_Branding_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/replace-wp-branding-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function rwb_admin_bar_remove(){
		global $wp_admin_bar;
        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('new-content');
	}
	public function rwb_admin_head() {
		echo '<style>#wp-admin-bar-wp-logo{ display: none; }
		img.blavatar { display: none;}
		#wpadminbar .quicklinks li div.blavatar {display:none;}
		#wpadminbar .quicklinks li .blavatar {display:none;}
		#wpadminbar #wp-admin-bar-new-content .ab-icon:before {display:none;}
		#wpadminbar .quicklinks li .blavatar:before {display:none;}
		#contextual-help-link-wrap { display: none !important; }
		.edit-post-fullscreen-mode-close.components-button{
			background-image: url('.MYBRAND_LOGO.');
				color: #fff;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				background-color: #fff;
		}
		.edit-post-fullscreen-mode-close.components-button svg {
			display: none;
		}
		</style>';
	}
	public function rwb_modify_footer_admin ($text) {
		$text =  "Thank you for creating with <a href='".MYBRAND_URL."'>".MYBRAND."</a>";
		return $text;
	}
	public function rwb_admin_init() {
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	}
	public function rwb_login_logo() {
		?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo MYBRAND_LOGO; ?>);
				/*padding-bottom: 2px;*/
				width:100%;
				background-size: 100%;
				height: 150px;
			}
		</style>
	<?php }
	public function rwb_login_headertext($text) {
		return MYBRAND;
	}
	public function rwb_login_headerurl($url) {
		return get_site_url();
	}
	public function rwb_howdy($wp_admin_bar) {
		$my_account = $wp_admin_bar->get_node('my-account');
		$newtitle = str_replace( 'Howdy,', MYBRAND.', ', $my_account->title );
		$wp_admin_bar->add_node( array('id' => 'my-account','title' => $newtitle) );
	}

}
