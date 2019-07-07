var app = {

    dv: $(document).width(),

    lang: function () {
        return true ? $('body').hasClass('rtl') : false;
    },  

    data_country: function(){  
        
        if($('select').hasClass('rx-country')){
            $.ajax({
                dataType: "json",
                url: base_url + 'x_moikzz_assets/country_lists.json',
                cache: true,
                success: function(data,k){
                    var dataParse = data;
                    $.each(dataParse, function(i,o){
                        $('#input_origin_place').append('<option value="'+o.name+'"> '+o.name+'</option>');
                        $('#input_destination_place').append('<option value="'+o.name+'"> '+o.name+'</option>');
                    });
                }
              });
        }
    }, 
 
    //------------------------------------------------------------------------///
    init: function () {    
                 
        // country function
        app.data_country();  

     
    }
}; 

$(document).ready(function () {
    'use strict';
    app.init();   
});