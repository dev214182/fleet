var app = {

    dv: $(document).width(),
    keyApi: 'k='+key,
    paramQuery: function paramQuery(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    
        if (results == null) {
          return null;
        } else {
          return decodeURI(results[1]) || 0;
        }
      },
    pagesApi: base_url  + 'public/api/_pageslist',
    productApi: base_url  + 'public/api/_products',

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

    listings_view_details: function(){
        var processData = app.productApi + '?'+app.keyApi; 
        var dataInfo = app.orderStatuses(processData); 
        
        dataInfo.always(function(i,s){
            if(i.length == 0){ return false; }
            if(s){ 
              $.each(i,function(z,k){
                 var displayProduct = app.listingProductLayout(k);
                 $('.b-items__cars').append(displayProduct);
              });
            }
        });

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
<<<<<<< HEAD
 
>>>>>>> Moikzz
=======

    listingProductLayout: function(k){
        var layout =    '<div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">'+
                        '<div class="b-items__cars-one-img">'+
                            '<img src="'+images_dir+'media/237x202/toyota.jpg" alt="toyota"/>'+
                            '<span class="b-items__cars-one-img-type m-premium">PREMIUM</span>'+
                            '<form class="b-items__cars-one-info-header   m-t-10 m-r-10">'+
                                '<span class="item-hidden_val hidden" data-val="'+k.zid+'" style="display: none!important;" hidden></span>'+
                                '<small class="b-items__cars-one-info-title"><a href="#" class="pull-left listing-details">VIEW DETAILS </a></small>'+
                            '<input type="checkbox" class="add-cart" name="add-item[]" id="check'+k.zid+'" />'+
                                '<label for="check'+k.zid+'" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>'+
                            '</form>'+
                        '</div>'+
                        '<div class="b-items__cars-one-info">'+
                            '<header class="b-items__cars-one-info-header s-lineDownLeft ">'+
                                '<h2>'+k.zcategory+'</h2> '+
                           '</header>'+
                            '<div class="row s-noRightMargin">'+
                                '<div class="col-md-9 col-xs-12"> '+
                                    '<div class="m-width row m-smallPadding">'+
                                        '<div class="col-xs-12">'+
                                            '<div class="row m-smallPadding">'+
                                                '<div class="col-xs-4">'+
                                                    '<span class="b-items__cars-one-info-title">Travel:</span>'+
                                                    '<span class="b-items__cars-one-info-title">Dates:</span>'+
                                                    '<span class="b-items__cars-one-info-title">Loads:</span>'+
                                                '</div>'+
                                                '<div class="col-xs-8">'+
                                                    '<span class="b-items__cars-one-info-value">'+k.ztravel_from+' <i class="fa fa-arrow-right"></i> '+k.ztravel_to+'</span>'+
                                                    '<span class="b-items__cars-one-info-value">'+k.zdate_from+' <i class="fa fa-arrow-right"></i> '+k.zdate_to+'</span>'+
                                                    '<span class="b-items__cars-one-info-value">'+k.zloads+'</span>'+
                                                '</div>'+
                                           '</div>'+
                                        '</div>'+ 
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-3 col-xs-12">'+
                                    '<div class="b-items__cars-one-info-price">'+
                                        '<div class="pull-right">'+
                                            '<h3>Price: AED</h3>'+
                                            '<h4> '+k.zprice+'</h4>'+
                                        '</div> '+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row m-l-10 border-top m-t-10 additional-notes">'+
                                '<div class="col-md-12 col-xs-12"> '+
                                       '<div class="row m-smallPadding p-t-10">'+
                                                '<div class="col-md-6 col-xs-12">'+
                                                        '<div class="row">'+
                                                            '<div class="col-xs-12">'+
                                                                '<h4 class="text-title">Additional Notes</h4>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="row">'+
                                                            '<div class="col-xs-12">'+
                                                                '<p>'+k.znotes+' </p>'+ 
                                                            '</div>'+
                                                        '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6 col-xs-12 p-r-40">'+
                                                        '<div class="row">'+
                                                            '<div class="col-xs-12 text-right">'+
                                                                '<span class="b-items__cars-one-info-title">Email:  Login to view </span>'+
                                                                '<span class="b-items__cars-one-info-title">Contact: Login to view </span>'+
                                                            '</div> '+
                                                        '</div> '+ 
                                                        '<div class="row"> '+
                                                            '<div class="col-xs-12 text-right">'+
                                                                '<input type="button" class="btn btn-primary" value="Send Enquiry">'+
                                                            '</div>'+
                                                        '</div> '+
                                                '</div>'+
                                            '</div>'+
                                '</div>'+
                                '</div>'+
                            '</div>';

                            return layout;
    },  

    orderStatuses: function orderStatuses(dataInfo){
        var dataDetails = $.post(dataInfo, function (data) { 
          if(data.length == 0) {
            $('form').remove();
            return false;
          }
          return data; 
        },'json');
    
        return dataDetails;
    },
>>>>>>> July 8
    //------------------------------------------------------------------------///
    init: function () {    
                 
        // country function
        app.data_country();  

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if($('body').hasClass('search-page'))
            app.listings_view_details();  
        
        if($('body').hasClass('cart'))    
            app.items_in_cart();  
       
=======
=======
=======
        if(jsCustom == 2)
>>>>>>> July 8
        app.listings_view_details();
>>>>>>> Updated
     
>>>>>>> Moikzz
    }
}; 

$(document).ready(function () {
    'use strict';
    app.init();   
});