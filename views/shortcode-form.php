<?php

defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );

if ( ! class_exists( 'cptbs_shortcode_form' ) ) {

    // Class for displaying form for cpt 
        class cptbs_shortcode_form{

            // Constructor for rendering a form for cpt 
            public function __construct(){
                $this->cptbs_hooks();
                $this->cptbs_load_methods();
            }
            //End Constructor for rendering a form for cpt 

            // Function for register a shortcode hooks 
            public function cptbs_hooks(){
                add_shortcode( 'register-custom-post-type', array( $this, 'cptbs_register_cpt_form' ) );
            }
            //End Function for register a shortcode hooks 

            //End Function for loading css js and form
            public function cptbs_register_cpt_form(){
                $this->cptbs_load_css_js();
                echo '
                <form method="post" id="add_cpt_form" action="">
                <h1>Register Your Custom Post Type</h1>
                <div class="form-group">
                    <label for="cpt_name_id">Custom Post Type Name</label>
                    <input type="text" class="form-control" id="cpt_name_id" name="cpt_name" placeholder="Enter Custom Post Type Name">
                </div>
                <div class="form-group">
                    <label for="singular_name_id">Enter Custom Post Type Singular Name</label>
                    <input type="text" class="form-control" id="singular_name_id" name="cpt_singular_name" placeholder="Enter Custom Post Type Singular Name">
                </div>
                <div class="form-group">
                    <label for="cpt_slug_id">Enter Custom Post Type Slug</label>
                    <input type="text" class="form-control" id="cpt_slug_id" name="cpt_slug" placeholder="Enter Custom Post Type Slug">
                </div>                
                <div class="form-group">
                    <label for="cpt_icon">Add Icon for Custom Post Type</label>
                    <input type="file" class="form-control" id="cpt_icon" name="cpt_icon" >
                </div>
                <div class="form-group submit-div">
                    <input type="submit" class="form-control" id="add_cpt_id" name="add_cpt" value="Submit" >
                </div>
                <span class="msg"></span>
              </form>';
            }
            //End Function for loading css js and form

            //actual Function for loading css js
            public function cptbs_load_css_js(){
                require_once WP_PLUGIN_DIR . '/create-cpt-by-shortcode/inc/include_css_js.php';
            }
            //End actual Function for loading css js
            public function cptbs_load_methods(){
                require_once WP_PLUGIN_DIR . '/create-cpt-by-shortcode/inc/shortcode_methods.php';
            }
        }   
    //End Class for displaying form for cpt     
}
if ( class_exists( 'cptbs_shortcode_form' ) ) {
	$cpt_form = new cptbs_shortcode_form();
}