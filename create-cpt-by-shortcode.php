<?php
    /**
     * Plugin Name:   Create CPT By Shortcode
     * Description:       Create Custom post type by shortcode front-end form.
     * Version:           1.0.0
     * Requires at least: 5.2
     * Requires PHP:      7.0
     * Author:            Rajesh Raval
     * Author URI: https://github.com/rajeshravalcreole
     * Text Domain:       cptbs
     * Domain Path:       /languages
     */
    
    defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );
    
    define('PLUGIN_URL' , WP_PLUGIN_URL . '/Custom-Post-By-Taxonomies/' ); // this constant uses in enqueue file and style

    if ( ! class_exists( 'cptbs_custom_post_by_shortcode' ) ) {
        
        // Main Class for custom post type    
        class cptbs_custom_post_by_shortcode{
            // Constructor for rendering a plugin
            public function __construct(){
                $this->cptbs_hooks();
            }
            //End Constructor for rendering a plugin
            
            // Function for registering and adding a hook 
            public function cptbs_hooks(){
                // global $shortcode_tags; 
                // $tagnames = array_keys($shortcode_tags);
                // if(in_array('register-custom-post-type',$tagnames)){
                    require_once WP_PLUGIN_DIR . '/create-cpt-by-shortcode/views/shortcode-form.php';
                // }
            }
            //End Function for registering and adding a hook 
        }
        //End Main Class for custom post type    
    }

    if ( class_exists( 'cptbs_custom_post_by_shortcode' ) ) {
        $obj = new cptbs_custom_post_by_shortcode();
    }
?>