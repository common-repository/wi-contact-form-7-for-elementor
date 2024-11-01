<?php
/**
 * Plugin Name: WI Contact Form 7 for Elementor
 * Description: Custom Contact Form 7 Designer for Elementor Websites
 * Plugin URI: https://www.webinside.co.il/cf7-elementor-addon
 * Author: Webinside
 * Version: 1
 * Author URI: https://www.webinside.co.il/
 * Text Domain: wi_cf7_elementor
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('plugins_loaded', 'wi_cf7_elementor_load_textdomain');
function wi_cf7_elementor_load_textdomain() {
	load_plugin_textdomain( 'wi_cf7_elementor', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}


define( 'ELEMENTOR_WI_CF7_URL', plugins_url( '/', __FILE__ ) );
define( 'ELEMENTOR_WI_CF7_PATH', plugin_dir_path( __FILE__ ) );


require_once ELEMENTOR_WI_CF7_PATH.'inc/elementor-helper.php';

function add_cf7_elements(){


   require_once ELEMENTOR_WI_CF7_PATH.'inc/helper.php';

   require_once ELEMENTOR_WI_CF7_PATH.'elements/contactus.php';


}
add_action('elementor/widgets/widgets_registered','add_cf7_elements');


