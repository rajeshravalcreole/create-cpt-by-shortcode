// Js for working a functionality 
jQuery( document ).ready(function(jQuery) {
    
    jQuery( "#add_cpt_form" ).validate({
        rules: {
            cpt_name: {
                'required':true,
                'maxlength':20,
            },
            cpt_singular_name: {
                'required':true,
                'maxlength':20,
            },
            cpt_slug: {
                'required':true,
                'maxlength':20,
            },
            cpt_icon:'required',
        },
        messages: {
            cpt_name: {
                'required':'This field is required',
                'maxlength': 'Can Not add more than 20 character'
            },
            cpt_singular_name:{
                'required':'This field is required',
                'maxlength': 'Can Not add more than 20 character'
            },
            cpt_slug: {
                'required':'This field is required',
                'maxlength': 'Can Not add more than 20 character'
            },
        },
        submitHandler: function (form) { // for demo
            return false;
        }
      });

    //   jQuery("#cpt_slug_id").keypress(function(e) {
    //     var slug_name = jQuery(this).val();
    //     if(slug_name !== ''){
    //         jQuery.ajax({
    //             type : "post",
    //             url : myAjax.ajaxurl,
    //             data : {action: "check_post_exist",slug: slug_name},
    //             success: function(response) {
    //             response = response.substring(0, response.length - 1);
    //             console.log(response);
    //             },error:function(){
                
    //             }
    //         });
    //     }       
    //   });

        jQuery("#add_cpt_form").submit(function(e){
        var slug_name = jQuery('#cpt_slug_id').val();
        jQuery.ajax({
            type : "post",
            url : myAjax.ajaxurl,
            data : {action: "check_post_exist",slug: slug_name},
            success: function(response) {
                // response = response.substring(0, response.length - 1);
                var obj = JSON.parse(response);
            
                if(obj.error != ''){
                    jQuery('.msg').html('<span class="error">'+obj.error+'</span>')
                }else{
                    jQuery('.msg').html('<span class="success">'+obj.success+'</span>')
                }
            },error:function(){
                
            }
         });
        });


});

