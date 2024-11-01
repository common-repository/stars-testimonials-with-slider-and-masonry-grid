<?php
/*
Plugin Name: Stars Testimonials
Contributors: galdub, tomeraharon
Description: Responsive and customizable testimonial & reviews widgets
Plugin URI: https://premio.io/downloads/stars-testimonials/
Author: Premio
Author URI: https://premio.io/downloads/stars-testimonials/
Version: 3.3.2
License: GPLv3
Text Domain: stars-testimonials
Domain Path: languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define("HAS_PRO_FEATURES",true);
define("DB_TESTIMONIAL_TABLE_NAME","star_testimonial_settings");

define('WCP_TESTIMONIAL__FILE__', __FILE__ );
define('TESTIMONIAL_PLUGIN_BASE', plugin_basename( WCP_TESTIMONIAL__FILE__ ) );
define('TESTIMONIAL_PLUGIN_URL', plugins_url('/', __FILE__) );
define('PREMIO_TESTIMONIAL_PLUGIN_VERSION', '3.3.2');

require 'plugin.class.php';
if (class_exists('Stars_Testimonials')) {
	$st_ob = new Stars_Testimonials;
}

if(is_admin()) {
    include_once "class-review-box.php";
    include_once "class-affiliate.php";
    include_once "class-upgrade-box.php";
}

register_activation_hook( __FILE__, 'create_testimonial_database_table' );
function create_testimonial_database_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;

    $sql = "CREATE TABLE {$table_name} (
		  id int(9) NOT NULL AUTO_INCREMENT,
          testimonial_type char(10),
          shortcode_name char(50),
          font_family char(50),
          testimonial_style int(11),
          grid_columns int(11),
          testimonial_categories char(50),
          no_of_testimonials int(11),
          testimonial_order char(20),
          slides_to_scroll int(11),
          scroll_speed int(11),
          navigation_dots char(10),
          navigation_arrows char(10),
          is_slider_autoplay char(10),
          slider_interval int(11),
          stars_color char(10),
          stars_color_custom char(10),
          text_color char(10),
          text_color_custom char(10),
          background_color char(10),
          background_color_custom char(10),
          title_color char(10),
          title_color_custom char(10),
          company_color char(10),
          company_color_custom char(10),
          arrow_color char(10),
          arrow_color_custom char(10),
          created_by int(11),
          created_date timestamp DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (id)
        ) {$charset_collate};
	";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    if(!defined("DOING_AJAX")) {
        add_option('stars_testimonail_plugin_redirection', true);
    }
}

/* Elementor Addons */
include_once "stars-elementor.php";


if(!function_exists('stars_testimonials_change_menu_text')) {
    function stars_testimonials_change_menu_text()
    {
        global $submenu;
        $subMenuKey = 'edit.php?post_type=stars_testimonial';
        if (isset($submenu[$subMenuKey])) {
            end($submenu[$subMenuKey]);         // move the internal pointer to the end of the array
            $key = key($submenu[$subMenuKey]);
            if (isset($submenu[$subMenuKey][$key][0])) {
                $submenu[$subMenuKey][$key][0] = '<span><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.0518 4.01946C12.9266 3.91499 12.7747 3.84781 12.6132 3.82557C12.4517 3.80333 12.2872 3.82693 12.1385 3.89367L9.3713 5.12414L7.76349 2.22571C7.68664 2.09039 7.5753 1.97785 7.44081 1.89956C7.30632 1.82127 7.15348 1.78003 6.99786 1.78003C6.84224 1.78003 6.6894 1.82127 6.55491 1.89956C6.42042 1.97785 6.30908 2.09039 6.23224 2.22571L4.62442 5.12414L1.85724 3.89367C1.70822 3.82703 1.54352 3.8034 1.38178 3.82545C1.22003 3.84751 1.06768 3.91437 0.941941 4.01849C0.816207 4.1226 0.722106 4.25982 0.670275 4.41461C0.618444 4.56941 0.610951 4.73562 0.648642 4.89446L2.0377 10.8171C2.06427 10.9318 2.11383 11.0399 2.18339 11.1348C2.25295 11.2297 2.34107 11.3096 2.44239 11.3695C2.57957 11.4516 2.73642 11.495 2.8963 11.4952C2.97402 11.4951 3.05133 11.484 3.12599 11.4624C5.65792 10.7624 8.33233 10.7624 10.8643 11.4624C11.0955 11.5232 11.3413 11.4898 11.5479 11.3695C11.6498 11.3103 11.7384 11.2307 11.8081 11.1357C11.8777 11.0406 11.9269 10.9321 11.9525 10.8171L13.3471 4.89446C13.3843 4.73558 13.3764 4.56945 13.3243 4.41482C13.2721 4.2602 13.1777 4.12326 13.0518 4.01946V4.01946Z" fill="white"/>
</svg></span> ' . esc_html__('Upgrade to Pro', 'chaty');
            }
        }
    }

    add_action('admin_init', 'stars_testimonials_change_menu_text');
}

if(!function_exists('stars_testimonials_admin_footer_style')) {
    function stars_testimonials_admin_footer_style() {
        ?>
        <style>
            #adminmenu .menu-icon-stars_testimonial > ul > li:last-child {
                padding: 5px 10px;
            }
            #adminmenu .menu-icon-stars_testimonial > ul > li:last-child a {
                display: flex;
                background-color: #B78DEB;
                border-radius: 6px;
                font-size: 12px;
                gap: 4px;
                padding: 4px 8px;
                color: #ffffff;
                align-items: center;
                transition: all 0.2s linear;
                font-weight: normal;
                box-shadow: 0px 6px 8px 0px #B78DEB3D;
                justify-content: center;
            }
            #adminmenu .menu-icon-stars_testimonial > ul > li:last-child a:hover, #adminmenu .menu-icon-stars_testimonial > ul > li:last-child a.current {
                box-shadow: 0px 6px 8px 0px #B78DEB3D;
                color: #ffffff;
                background-color: #9565d0;
                font-weight: normal;
            }
            #adminmenu .menu-icon-stars_testimonial > ul > li:last-child a span {
                flex: 0 0 16px;
                height: 16px;
                background-color: #c5a4ef;
                border-radius: 4px;
                padding: 2px;
                display: inline-flex;
                transition: all 0.2s linear;
            }
            #adminmenu .menu-icon-stars_testimonial > ul > li:last-child a:hover span {
                background-color: #B78DEB;
            }
            #adminmenu .menu-icon-stars_testimonial > ul > li:last-child a span svg {
                width: 100%;
                height: 100%;
            }
        </style>
        <?php
    }
    add_action('admin_head', 'stars_testimonials_admin_footer_style');
}
?>
