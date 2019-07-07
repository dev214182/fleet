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

    listings_view_details: function(){
        $('body').on('click', '.listing-details', function(e){
            e.preventDefault();
             var t = e.target;
            $(this).parents('.b-items__cars-one').find('.additional-notes').toggle(200, function(){
                $(t).html($(this).is(':visible')? 'LESS DETAILS' : 'VIEW DETAILS');
            });
        }); 

        var items = []; 
        
        $('body').on('click','.add-cart', function(e){ 

            if($(this).is(':checked')){
                
                // add to localStorage
                var data = $(this).parents('.b-items__cars-one-info-header').find('span.item-hidden_val').data('val');
                //items = JSON.parse("[" + items + "]");  
                app.save_item_selection(items, data);
            }else{

                //remove from localStorage
                var data = $(this).parents('.b-items__cars-one-info-header').find('span.item-hidden_val').data('val'); 
                app.deleteStorage(data);
            }
        }); 
    },
 
    //------------------------------------------------------------------------///
    init: function () {    
                 
        // country function
        app.data_country();  

        app.listings_view_details();
     
    }
}; 

$(document).ready(function () {
    'use strict';
    app.init();   
});