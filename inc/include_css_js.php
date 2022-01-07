<?php

defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );

if ( ! class_exists( 'cptbs_include_css_js' ) ) {
    // Class for including css and js files 
    class cptbs_include_css_js{
        
        // Constructor for call hooks
        public function __construct(){
            $this->cptbs_hooks();
        }
        //End Constructor for call hooks

        // Function for adding actions
        public function cptbs_hooks(){
            // add_action( 'wp_enqueue_scripts', array($this,'cptbs_enqueue') );
            add_action( 'wp_enqueue_scripts', $this->cptbs_enqueue() );
        }
        //End Function for adding actions

        // Function for Enqueue css/js
        public function cptbs_enqueue(){
            wp_enqueue_style( 'bootstrap-css', FOLDER_PATH .'assets/css/bootstrap.min.css','','',false );
            wp_enqueue_style( 'custom-css', FOLDER_PATH .'assets/css/custom.css','','',false );
            wp_enqueue_script( 'custom-js', FOLDER_PATH . 'assets/js/custom.js',array('jquery'),'',true);
            wp_enqueue_script( 'jquery-validate-js', FOLDER_PATH . 'assets/js/jquery.validate.min.js',array('jquery'),'',true);
            wp_enqueue_script( 'jquery-addit-methods-js', FOLDER_PATH . 'assets/js/additional-methods.min.js',array('jquery'),'',true);
            // localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
            wp_localize_script( 'custom-js', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
        }
        //End Function for Enqueue css/js
    }
    //End Class for including css and js files 
}

// Check class exists or not and create a object
if ( class_exists( 'cptbs_include_css_js' ) ) {
    $inc_css_js = new cptbs_include_css_js();
}