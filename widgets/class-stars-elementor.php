<?php
/**
 * Awesomesauce class.
 *
 * @category   Class
 * @package    ElementorAwesomesauce
 * @subpackage WordPress
 * @author     Ben Marshall <me@benmarshall.me>
 * @copyright  2020 Ben Marshall
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.benmarshall.me/build-custom-elementor-widgets/,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace StarsElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Awesomesauce widget class.
 *
 * @since 1.0.0
 */
class StarsTestimonoalsAddon extends Widget_Base {
    /**
     * Class constructor.
     *
     * @param array $data Widget data.
     * @param array $args Widget arguments.
     */
    public function __construct( $data = array(), $args = null ) {
        parent::__construct( $data, $args );

//        wp_register_style( 'awesomesauce', plugins_url( '/assets/css/awesomesauce.css', ELEMENTOR_AWESOMESAUCE ), array(), '1.0.0' );
    }

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'stars-testimonials';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Stars Testimonials', 'elementor-awesomesauce' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-editor-quote  ';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return array( 'general' );
    }

    /**
     * Enqueue styles.
     */
    public function get_style_depends() {
        return array( 'stars-testimonials' );
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Content', 'elementor-awesomesauce' ),
            )
        );
        global $wpdb;
        $tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;
        $query = "SELECT id, shortcode_name
            FROM {$tableName} ORDER BY id DESC";
        $results = $wpdb->get_results($query);
        $options = array();
        $options[0] = esc_html__("Select Shortcode");
        foreach ($results as $row) {
            $options[$row->id] = $row->shortcode_name;
        }
        $this->add_control(
            'shortcode_id',
            array(
                'label'   => __( 'Select Shortcode', 'elementor-awesomesauce' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '',
                'dynamic' => [
                    'active' => true,
                ],
                'options' => $options,
            )
        );
        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'shortcode_id', 'none' );
        if(!empty($settings['shortcode_id'])) {
            echo do_shortcode('[testimonial_stars id="'.esc_attr($settings['shortcode_id']).'"]');
        }
    }

    /**
     * Render shortcode widget as plain content.
     *
     * Override the default behavior by printing the shortcode instead of rendering it.
     *
     * @since 1.0.0
     * @access public
     */
    public function render_plain_content() {
        // In plain mode, render without shortcode
        $this->print_unescaped_setting( 'shortcode_id' );
    }

    /**
     * Render the widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    /*protected function _content_template() {

    }*/
}
