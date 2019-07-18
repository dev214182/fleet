var app = { 
    dv: $(document).width(), 
    paramQuery: function paramQuery(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    
        if (results == null) {
          return null;
        } else {
          return decodeURI(results[1]) || 0;
        }
      }, 
 
    lang: function () {
        return true ? $('body').hasClass('rtl') : false;
    },  

    ajax_load_info: function ajax_load_info( dataItems, controller) {   
        $.ajax({ 
                type: "POST",
                url: controller, 
                cache: false, 
                contentType: "application/json",
                data: dataItems,
                beforeSend: function(xhr){ 
                    $("button[type='submit']").attr("disabled", true);
                },
                success: function success(data) {
                    data = JSON.parse(data);
                   
                    if(data.success){
                        swal("Success!", data.message, "success"); 
                        setTimeout(function(){  
                        window.location.href = base_url+"client/page/dashboard/";
                        }, 2500); 
                    }else{
                        swal("Error!", data.message, "error"); 
                    }
                },
                error: function(){ 
                    
                }
        }).done( function(){
          $("button[type='submit']").attr("disabled", false);
        }); 
}, 
verify_login: function verify_login(){
        $('body.login').on('submit','form#loginform',function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            txt = 'You are now Logged In'; 
            var controller = 'log/verify';
             
            var dvalue = $(this).serializeArray();
            var cvalue  = {};
            $.each(dvalue, function(i,o){ 
                cvalue['key'] = key;
                cvalue[o.name] = o.value;
            });
            cvalue = JSON.stringify(cvalue); 
            
            var data = cvalue;
         
          app.ajax_load_info(data, controller);
        });
    },
 
    //------------------------------------------------------------------------///
    init: function () {   
         
       app.verify_login();
     
    }
}; 

$(document).ready(function () {
    'use strict';
    app.init();   
});