// Js for working a functionality 
jQuery( document ).ready(function(jQuery) {
    // Method for checking white spaces 
    jQuery.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty");

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
                noSpace: true,
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
            jQuery.ajax({
                type : "post",
                url : myAjax.ajaxurl,
                // data : {action: "check_post_exist",slug: slug_name},
                data : jQuery('#add_cpt_form').serialize()+'&action=check_post_exist',
                success: function(response) {
                    console.log(response);
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
        }
      });

});

