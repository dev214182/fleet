var app = {

    dv: $(document).width(),

    lang: function () {
        return true ? $('body').hasClass('rtl') : false;
    },  

<<<<<<< HEAD
    data_country: function(){ 

        // country lists
        
        if($('select').hasClass('rx-country')){
            $.getJSON(base_url+"assets/country.json", function(json) {
                $.each(json, function(i,o){
                 
               $(".rx-country").append('<option value='+o.id+'>' +o.text+'</option>');
                })
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

    save_item_selection : function(items, data){ 
         
        var ndata = 'item-'+data;
        if(data){
            var s = items.indexOf(ndata);  

            if (s === -1) {
                console.log(ndata);
                items.push(ndata);
                    
                localStorage.setItem('item', JSON.stringify(items));
            }
        }
    },

    deleteStorage: function (deleteElem) {

        var items = JSON.parse(localStorage.getItem('item'));

        if (deleteElem) {

            var dels = 'item-'+deleteElem;

            var s = items.indexOf(dels);

            items.splice(s, 1);

            localStorage.setItem('item', JSON.stringify(items));

        }

    },

    items_in_cart: function(){
        app.items_display();
        app.item_removed();
    },

    items_display: function(){
        var items = JSON.parse(localStorage.getItem('item'));
        console.log(items);

        $.ajax({
            type: "POST",
            url: base_url + 'public/callback/cart_listing_callback',
            dataType: 'json',
            cache: false,
            data: {'items':items},
            beforeSend: function(){
                
            },
            success: function(data){
                console.log(data);
                if(data.success){
                    var contents = data.respond;
                   // $('body.cart .b-items__cars').html(contents);
                }
            }
        });

       // $.each(items, function (index, value) {
            
           // var sx = value.split("item-").pop();
           // console.log(sx);
            /*if (value.id == id) {

                value.count = count;

                status = status + 1;

            }*/

       // });
    },

    item_removed: function(){ 
        $('body').on('click', '.remove-item', function(e){
            e.preventDefault();
             var t = e.target;
             app.deleteStorage($(this).data('val'));
            $(this).parents('.b-items__cars-one').remove();
        })
    },
=======
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
 
>>>>>>> Moikzz
    //------------------------------------------------------------------------///
    init: function () {    
                 
        // country function
        app.data_country();  

<<<<<<< HEAD
        if($('body').hasClass('search-page'))
            app.listings_view_details();  
        
        if($('body').hasClass('cart'))    
            app.items_in_cart();  
       
=======
     
>>>>>>> Moikzz
    }
}; 

$(document).ready(function () {
    'use strict';
    app.init();   
});