<?php

defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );

if ( ! class_exists( 'cptbs_shortcode_methods' ) ) {

    class cptbs_shortcode_methods{
        
        public function __construct(){
            $this->cptbs_hooks();
        }

        public function cptbs_hooks(){
            // Actions for getting checking cpt is exist or not 
            add_action("wp_ajax_check_post_exist", array($this,'cptbs_check_cpt') );
            add_action("wp_ajax_nopriv_check_post_exist", array($this,'cptbs_check_cpt') );

        }

        public function cptbs_check_cpt(){
            $slug_name = $_POST['cpt_slug'];    
            $post_type_name = $_POST['cpt_name'];
            $singular_name = $_POST['cpt_singular_name'];
            // $post_icon = $_POST['cpt_icon'];

            if(post_type_exists($slug_name)){
                $post_type_msg = array ('error'=>'Post Type is already exists','success'=>'');
                echo json_encode($post_type_msg);
                die();
            }else{
                $post_type_msg = array ('error'=>'','success'=>'Post Type is Created Successfully');
                echo json_encode($post_type_msg);
                die();
            }
        }
    }
}

if ( class_exists( 'cptbs_shortcode_methods' ) ) {
	$required_methods = new cptbs_shortcode_methods();
}