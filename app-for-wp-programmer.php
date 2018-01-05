<?php
/**
* Plugin Name: Application for Wordpress Programmer
* Description: Task Submission for XTRAPLUGINS
* Author: shuvoroy
* Author URI:
* Version: 1.0
* Text Domain: shuvoroy
* Domain Path: /languages
*/

/**
* if accessed directly, exit.
*/
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if( ! class_exists( 'App_For_Wp_Programmer' ) ) :
  /**
  *
  */
  class App_For_Wp_Programmer
  {


    public static $_instance;

    /**
    * Constructor funcion for plugin.
    */
    public function __construct()
    {
      register_activation_hook( __FILE__, array( $this, 'store_info_in_db' ) );
      self::hooks();
    }

    /**
    * Add all the hooks
    */
    public function hooks(){
      add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
      add_action( 'admin_menu', array( $this, 'admin_menu' ), 999 );
      add_action( 'activated_plugin', array( $this, 'show_my_info_page' ), 10, 1 );
      add_action( 'wp_ajax_get-value', array($this, 'get_value') );
    }

    /**
    * Load all the script and style
    */
    public function enqueue_scripts(){
      wp_enqueue_style( 'app-for-prog', plugins_url( '/assets/style.css', __FILE__ ), '', '1.0', 'all' );
      wp_enqueue_script( 'app-for-prog', plugins_url( 'assets/script.js', __FILE__ ), array( 'jquery', 'wp-util' ), '1.0', true );
      wp_localize_script('app-for-prog', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
    }

    /**
    * Store info to database on plugin activation
    */
    public function store_info_in_db(){

      $my_info = array();
      $my_info['my_details']['name'] = 'Shuvo Roy';
      $my_info['my_details']['address'] = 'Kaliganj, Gazipur, Dhaka';
      $my_info['my_details']['email'] = 'shuvorroy@gmail.com';
      $my_info['my_details']['phone'] = '+8801751982006';
      $my_info['my_details']['photo'] = 'https://image.ibb.co/eXPGzm/13498018_1355426741138612_3664718766822117503_o.jpg';


      $my_info['about_me'] = 'My name is Shuvo Chandra Roy. I am a student from science background.
                              I have always been enthusiastic to explore new things.
                              I am a Fast Learner and Hard Working person.
                              I always do my job with dedication and honesty.
                              I always try to think about Life Positively and Scientifically.
                              I started programming in 2010.
                              When I need solve a new problem, I try to understand the problem from core.
                              Then I decide what information i already know about the problem and what information I need to gather.';
      $my_info['skills'] = array( 'Programming', 'Web Developing', 'WordPress', 'WooCommerce' );
      $my_info['experience'] = array(
        'mplus' => array(
          'post' => 'Wordpress / PHP Developer (Plugin)',
          'location' => 'Remote',
          'duration' => 'May 2016 - Now',
          'organization' => '79mplus'
        ),
        'mahdil' => array(
          'post' => 'Web Application Development Associate',
          'location' => 'Uttara, Dhaka',
          'duration' => 'January 2016 - March 2016 (3 Months)',
          'organization' => 'Maison Mahdil'
        )
      );

      $my_info['education'] = array(
        'bachelor' => array(
          'degree' => 'Bachelor in CSE (2011 - 2015)',
          'cgpa' => '3.00',
          'institute' => 'Daffodil International University, Dhaka'
        ),
        'hsc' => array(
          'degree' => 'HSC',
          'cgpa' => '3.8',
          'institute' => 'Kaliganj Sramik College, Kaliganj, Gazipur'
        ),
        'ssc' => array(
          'degree' => 'SSC',
          'cgpa' => '5.0',
          'institute' => 'Kaliganj R.R.N. Pilot Govt. High School'
        )
      );

      $my_info['links'] = array(
        'facebook' => 'https://facebook.com/shuvo.rroy',
        'linkedin' => 'https://www.linkedin.com/in/shuvorroy/',
        'github' => 'https://github.com/shuvorroy',
      );

      add_option( 'myinfo_info', $my_info );
    }

    /**
    * Add Shuvo's Info admin menu
    */
    public function admin_menu() {
      add_menu_page( 'Shuvo\'s Info', 'Shuvo\'s Info', 'manage_options', 'my-info-page', array( $this, 'my_info_page_handler' ), 'dashicons-media-document', 27 );
    }

    /**
    * Render my info page for Admin Menu.
    */
    public function my_info_page_handler(){
      $myinfo = get_option( 'myinfo_info' );
      include dirname( __FILE__ ) . '/app-my-info-page.php';
    }

    /**
    * Redirect to My info page after plugin activation
    */
    public function show_my_info_page( $plugin ){
      if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=my-info-page' ) ) );
      }
    }

    /**
    * Ajax fucntion to get values.
    */
    public function get_value(){
      $info_key = $_POST['info_key'];
      $myinfo = get_option( 'myinfo_info' );
      wp_send_json($myinfo[$info_key]);
    }


    /**
    * Cloning is forbidden.
    */
    private function __clone() { }

    /**
    * Unserializing instances of this class is forbidden.
    */
    private function __wakeup() { }

    /**
    * Instantiate the plugin
    */
    public static function instance() {
      if ( is_null( self::$_instance ) ) {
        self::$_instance = new self();
      }
      return self::$_instance;
    }

  }


endif;

App_For_Wp_Programmer::instance();
