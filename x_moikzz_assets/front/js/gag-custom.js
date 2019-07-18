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

    ajax_load_info: function ajax_load_info(dataItems, controller,page) {   
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
                    if(page == 'login'){
                        data = JSON.parse(data);
                    }
                    
                    if(data.success){
                        swal("Success!", data.message, "success");

                        if(page == 'search'){
                            app.clearCart();
                            $('form#form-cart')[0].remove();
                            setTimeout(function(){  
                            window.location.href = base_url+"search";
                            }, 4000); 
                        }else{
                            setTimeout(function(){  
                                location.reload();
                            }, 500); 
                        }
                    }else{
                        swal("Error!", data.message, "error"); 
                    }
                },
                error: function(){ 
                    swal("Error!", 'Kindly refresh the page.', "error"); 
                }
        }).done( function(){
          $("button[type='submit']").attr("disabled", false);
        }); 
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
   
    update_listings: function(dataInfo, truckDefault){
        dataInfo.always(function(i,s){ 
            if(i.length === 0 || typeof i.length === 'undefined'){ $('#b-items__cars').html(app.emptyProduct()); return false; }
            if(s){
                var carrier = []; 
                    var items = app.itemStorage(); 
                     
                    $.each(i,function(z,k){
                        carrier += app.listingProductLayout(z,k,items); 
                    });
                    
                    $('.b-items__cars').html(carrier);  

                    setTimeout(function(){
                        var x = $('div.b-items__cars-one.wow.zoomInUp');
                        $.each(x, function(o,i){
                            if ($(this).css("visibility") == "hidden") {
                                $(this).css('padding',0);
                                $(this).css('margin-bottom',10);
                            }else{
                                $(this).find('.c-items').removeClass('bruha');
                                $(this).css('padding',5);
                                $(this).css('margin-bottom',40);
                            }
                        });
                    }, 300);
            }
            return false;
        });
    },

    listings_view_details: function(){ 
        
        $('form#form-search').on('click','#clear-search', function(e){
            e.preventDefault();
            $('#form-search select').val(null).trigger('change');
            $(this).parents('form')[0].reset();
        });

        var truckDefault = $('input:radio[name=truck_type]:checked').val();

        var processData = app.productApi + '?'+app.keyApi+'&t='+truckDefault; 
        var dataInfo = app.orderStatuses(processData); 

        app.update_listings(dataInfo, truckDefault);

        $('body').on('submit', 'form#form-search', function(e){
            e.preventDefault();

            $("button[type='submit']").attr("disabled", true);

            var truck_type = $(this).find('input:radio[name=truck_type]:checked').val();
            var truck_date = $(this).find('input.search-date').val();
            var truck_origin = $(this).find('select.search-from').val();
            var truck_dest = $(this).find('select.search-to').val();
            var truck_load = $(this).find('input:text[name=search-load]').val();
            processData = app.productApi + '?'+app.keyApi+'&t='+truck_type+'&d='+truck_date+'&o='+truck_origin+'&x='+truck_dest+'&l='+truck_load; 
            dataInfo = app.orderStatuses(processData);  
            app.update_listings(dataInfo, $(this).val());

            setTimeout(function(){
                $("button[type='submit']").attr("disabled", false);
            }, 4000);
           
        }); 
      
        $('body').on('click', '.listing-details', function(e){
            e.preventDefault();
             var t = e.target;
            $(this).parents('.b-items__cars-one').find('.additional-notes').toggle(200, function(){
                $(t).html($(this).is(':visible')? 'LESS DETAILS' : 'VIEW DETAILS');
            });
        });
        
        var items = [];
        var data = '';
        

        $('body').on('click','.add-cart', function(e){
            items = app.itemStorage();
            if(!items){
                items  = [];
            }

           
           
            data = $(this).parents('.c-items').find('span.item-hidden_val').data('val'); 
            
            if($(this).is(':checked')){
                $(this).parents('.c-items').find('.btn-inquiry').attr('disabled',false);
                app.save_item_selection(items, data);
            }else{  
                app.deleteStorage(data);
                $(this).parents('.c-items').find('.btn-inquiry').attr('disabled',true);
            }
        });


        $(window).scroll(function(){ 
            var x = $('div.b-items__cars-one.wow.zoomInUp');
            $(".animated .c-items").removeClass('bruha');
          
            $.each(x, function(o,i){  
                if ($(this).css("visibility") == "hidden") {
                    $(this).css('padding',0);
                    $(this).css('margin-bottom',10);
                }else{
                 
                    $(this).find('.c-items').removeClass('bruha');
                    $(this).css('padding',5);
                    $(this).css('margin-bottom',40);
                }
            });
        });
    },

    emptyProduct: function(){
        var layout = '<div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s"><div class=""><header class="p-20"><h1>No Records Found.</h1> </header></div></div>';
        return layout;
    },
    
    clearCart: function clearCart() {
        var ls = localStorage;
        ls.setItem('item', '');
    },

    deleteStorage: function (deleteElem) {
        var items = app.itemStorage();

        if (deleteElem) {

            var dels = 'item-'+deleteElem;
          
            var s = items.indexOf(dels);
            
            items.splice(s, 1); 
            
           localStorage.setItem('item', JSON.stringify(items));
        
        } 
    }, 

    save_item_selection : function(items, data){
         
        var ndata = 'item-'+data;
       
        var s = items.indexOf(ndata); 
       
        if (s === -1) { 
            items.push(ndata); 
            localStorage.setItem('item', JSON.stringify(items));
        }
        
    },

    listingProductLayout: function(z,k,items){
        var b = "";
        
        if( z > 4){
            b = "bruha";
        }
        var pricing = '';
        if(k.zpublic == 1){
            pricing =       '<div class="col-md-3 col-xs-12">'+
                                '<div class="b-items__cars-one-info-price">'+
                                    '<div class="pull-right">'+
                                        '<h3>Price: AED</h3>'+
                                        '<h4> '+k.zprice+'</h4>'+
                                    '</div> '+
                                '</div>'+
                            '</div>';
        }
        
        var vv = "";
        var dis = "disabled";
        if(items){
            var d = 'item-'+k.zid;
            var s = items.indexOf(d); 
          
            if(s !== -1){
                  vv= 'checked';
                  dis= '';
            } 
           
        }

        var layout =    '<div class="b-items__cars-one wow zoomInUp" id="trk'+z+'" data-wow-delay="0.5s">'+
                        '<div class="c-items '+b+'">'+
                        '<div class="b-items__cars-one-img">'+
                            '<img src="'+images_dir+'media/237x202/toyota.jpg" alt="toyota"/>'+
                            '<span class="b-items__cars-one-img-type m-premium">PREMIUM</span>'+
                            '<div class="b-items__cars-one-info-header   m-t-10 m-r-10">'+
                                '<span class="item-hidden_val hidden" data-val="'+k.zid+'" style="display: none!important;" hidden></span>'+
                                '<small class="b-items__cars-one-info-title"><a href="#" class="pull-left listing-details">VIEW DETAILS </a></small>'+
                            '<input type="checkbox" class="add-cart" name="add-item[]" id="check'+k.zid+'" '+vv+' />'+
                                '<label for="check'+k.zid+'" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>'+
                            '</div>'+
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
                                                    '<span class="b-items__cars-one-info-title"><i class="fa fa-paper-plane p-r-10 p-l-10"></i>Travel:</span>'+
                                                    '<span class="b-items__cars-one-info-title"><i class="fa fa-calendar-o p-r-10 p-l-10"></i>Dates:</span>'+
                                                    '<span class="b-items__cars-one-info-title"><i class="fa fa-car p-r-10 p-l-10"></i>Loads:</span>'+
                                                '</div>'+
                                                '<div class="col-xs-8">'+
                                                    '<span class="b-items__cars-one-info-value">'+k.ztravel_from+' <i class="fa fa-arrow-right p-r-10 p-l-10"></i> '+k.ztravel_to+'</span>'+
                                                    '<span class="b-items__cars-one-info-value">'+k.zdate_from+' <i class="fa fa-arrow-right p-r-10 p-l-10"></i> '+k.zdate_to+'</span>'+
                                                    '<span class="b-items__cars-one-info-value">'+k.zloads+'</span>'+
                                                '</div>'+
                                           '</div>'+
                                        '</div>'+ 
                                    '</div>'+
                                '</div>'+
                                pricing+
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
                                                                '<a href="cart" class="btn btn-primary btn-inquiry" '+dis+'>Send Enquiry</a>'+
                                                            '</div>'+
                                                        '</div> '+
                                                '</div>'+
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

    itemStorage: function(){
        var data = localStorage.getItem('item');
        if( data ){  return JSON.parse(data); } else { return false; }
    },

    cartTrucks: function cartTrucks(){
        app.verify_login();

        var items = app.itemStorage();
        var data = ''; 
        if(items && items.length > 0){  
            $.each(items, function(i,o){ 
                app.cartLayout(i,o);
            });
            $('.cart-submit').attr('type','submit');
            $('.cart-submit').removeAttr('disabled');
        }else{
            data = '<h1 class="m-b-40"> No records. </h1>';
            $('.b-items__cars').html(data);
        }

       
      
        $('body').on('click','.remove-item', function(e){
            e.preventDefault();
            $(this).parents('.b-items__cars-one').remove();
            var id = $(this).data('val');
            app.deleteStorage(id);
            var nt = app.itemStorage();
            
            if(nt.length < 1){ 
                $('.b-items__cars').html('<h1 class="m-b-40"> No records. </h1>');
                $('#form-cart .cart-submit').attr('type','button');
                $('#form-cart .cart-submit').attr('disabled','disabled');
            } 
        });

        $('body.cart').on('submit','form#form-cart',function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            txt = 'Inquiries submitted'; 
            var controller = 'public/callback/inquiries_submission';
            var categoryID =  $("input.cart-category"); 
            var trucks =  $("input.cart-items"); 
            var tload =  $("input.cart-load"); 
            var travfrom =  $("input.cart-from"); 
            var travto =  $("input.cart-to"); 
            var datefrom =  $("input.cart-datefrom"); 
            var dateto =  $("input.cart-dateto"); 
            var price =  $("input.cart-price"); 
            var cat_info = [];
            var truck_info = [];
            var load_info = [];
            var travf_info = [];
            var travt_info = [];
            var datef_info = [];
            var datet_info = [];
            var price_info = []; 
            
            $.each(categoryID, function(i,o){ 
                cat_info[i] = $(o).val(); 
            });
            $.each(trucks, function(i,o){ 
                truck_info[i] = $(o).val(); 
            });
            $.each(tload, function(i,o){ 
                load_info[i] = $(o).val(); 
            });
            $.each(travfrom, function(i,o){ 
                travf_info[i] = $(o).val(); 
            });
            $.each(travto, function(i,o){ 
                travt_info[i] = $(o).val(); 
            });
            $.each(datefrom, function(i,o){ 
                datef_info[i] = $(o).val(); 
            });
            $.each(dateto, function(i,o){ 
                datet_info[i] = $(o).val(); 
            });
            $.each(price, function(i,o){ 
                price_info[i] = $(o).val(); 
            });
           
           
            var pzid =  $("input.user-id").val(); 
            var pname =  $("input.user-name").val(); 
            var pemail = $("input.user-email").val(); 
            var pnum =  $("input.user-phone").val(); 
            var pmsg =  $("textarea.user-message").val();
            var urge =  $("input.urgent").val();
            
            var data =  JSON.stringify({"logid": pzid,"trucks": truck_info,'category':cat_info,'loads' : load_info,'travel_from' : travf_info,'travel_to' : travt_info,'date_from' : datef_info,'date_to' : datet_info,'price' : price_info, 'client_name' : pname, 'client_mail' : pemail, 'client_num':pnum, 'client_msg' : pmsg,'urgent' : urge, 'key' : key});
            
            app.ajax_load_info(data, controller,'search');
        });
    },

    cartLayout : function cartLayout(i,id){
        id = id.split("-");
        id = id[1];
        
        processData = app.productApi + '?'+app.keyApi+'&z='+id; 
        var dataInfo = app.orderStatuses(processData);   
         dataInfo.always(function(data, textStatus, jqXHR){ 
           
             var pricing = '';
             var price = 0;
             if(data[0].zpublic == 1){
                 pricing =  '<div class="col-md-4 col-xs-12">'+
                            '<div class="b-items__cars-one-info-price">'+
                                '<div class="pull-right">'+
                                    '<h3>Price: AED</h3>'+
                                    '<h4> '+data[0].zprice+'</h4>'+
                                '</div> '+
                            '</div>'+
                        '</div>';
                price = data[0].zprice;
             }
            var layout = '<div class="b-items__cars-one " data-wow-delay="0.5s">'+
            '<input type="hidden"   class="cart-category" value="'+data[0].zcategoryID+'" hidden>'+
            '<input type="hidden"   class="cart-items" value="'+id+'" hidden>'+
            '<input type="hidden"   class="cart-load" value="'+data[0].zloads+'" hidden>'+
            '<input type="hidden"   class="cart-from" value="'+data[0].ztravel_from+'" hidden>'+
            '<input type="hidden"   class="cart-to" value="'+data[0].ztravel_to+'" hidden>'+
            '<input type="hidden"   class="cart-datefrom" value="'+data[0].zdate_from+'" hidden>'+
            '<input type="hidden"   class="cart-dateto" value="'+data[0].zdate_to+'" hidden>'+
            '<input type="hidden"   class="cart-price" value="'+price+'" hidden>'+
            '<div class="b-items__cars-one-img">'+
                '<img src="'+base_url+'x_moikzz_assets/images/media/237x202/toyota.jpg" alt="toyota" height="150"/>'+
             /*    '<span class="b-items__cars-one-img-type m-premium">PREMIUM</span> '+ */
            '</div>'+
            '<div class="b-items__cars-one-info">'+
                '<span class="pull-right">'+
                    '<i class="fa fa-close remove-item" data-val="'+id+'"></i>'+
                '</span>'+
                '<div class="b-items__cars-one-info-header  ">'+
                    '<h2>'+id+' '+ data[0].zcategory +'</h2> '+
                '</div>'+
                '<div class="row s-noRightMargin">'+
                    '<div class="col-md-8 col-xs-12"> '+
                        '<div class="m-width row m-smallPadding">'+
                            '<div class="col-xs-12">'+
                                '<div class="row m-smallPadding">'+
                                    '<div class="col-xs-4">'+
                                        '<span class="b-items__cars-one-info-title">Travel:</span>'+
                                        '<span class="b-items__cars-one-info-title">Dates:</span>'+
                                        '<span class="b-items__cars-one-info-title">Loads:</span>'+
                                    '</div>'+
                                    '<div class="col-xs-8">'+
                                        '<span class="b-items__cars-one-info-value">' + data[0].ztravel_from+' <i class="fa fa-arrow-right"></i> ' + data[0].ztravel_to+'</span>'+
                                        '<span class="b-items__cars-one-info-value">' + data[0].zdate_from+' <i class="fa fa-arrow-right"></i> ' + data[0].zdate_to+'</span>'+
                                        '<span class="b-items__cars-one-info-value">' + data[0].zloads+' cars</span>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+ 
                        '</div>'+
                    '</div>'+
                    pricing+
                '</div>'+
            '</div> '+
        '</div>'; 
        
        $('.b-items__cars').append(layout);
        });  
    },
    verify_login: function verify_login(){
        $('body.cart').on('submit','form#modal_login',function(e){
            e.preventDefault();
            
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
       
          app.ajax_load_info(data, controller,'login');
        });
    },
    //------------------------------------------------------------------------///
    init: function () {   
         
        /* localStorage.clear(); */
        // country function
        app.data_country();  

        if(jsCustom == 2)
        app.listings_view_details();

        if(jsCustom == 7)
        app.cartTrucks();
     
    }
}; 

$(document).ready(function () {
    'use strict';
    app.init();   
});