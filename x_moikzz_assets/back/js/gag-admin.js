var app = {
  dv: $(document).width(),
  wr: $(window).width(),
  wz: 0,
  defaultCountComplimentary: 2,
  paramQuery: function paramQuery(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);

    if (results == null) {
      return null;
    } else {
      return decodeURI(results[1]) || 0;
    }
  },
  keyApi: 'k='+key,
  userTypesApi: base_url + 'api/vw/_users_types',
  profileApi: base_url + 'api/vw/_users',
  productApi: base_url + 'api/vw/_products',
  studentApi: base_url + 'api/vw/_students',
  displayOrdersApi: base_url + 'api/vw/_orders',
  schoolApi: base_url  + 'api/vw/_orgs',
  systemApi: base_url  + 'api/vw/_site_settings',
  pagesApi: base_url  + 'api/vw/_pageslist',

  /**
   * orderApi: width Form submission
   * API: Order meal menus
   */  
  orderApi: base_url + 'api/sys/cart_order_purchase',

  /**
   * studentmealOrdered
   * API: List students orders 
   */ 
  studentmealOrdered: base_url + 'api/sys/_mealOrders',

  /**
   * extrasApi
   * API: active complimentaries 
   */  
  extrasApi: base_url + 'api/sys/_xtras',
  
  /** 
   * studentNups: with Form submission
   * API: Add and Update Student info
   */  
  studentNups: base_url + 'api/sys/studentInfos',

    /** 
   * studentNups: with Form submission
   * API: Add and Update Student info
   */  
  sysModuleApi: base_url + 'api/sys/sys_modules',

  /** 
   * sysUserApi: with Form submission
   * API: Add and Update User info
   */  
  sysUserApi: base_url + 'api/sys/userInfos',
  

    /** 
   * sysFleetApi: with Form submission
   * API: Add and Update Truck - Fleet info
   */  
  sysFleetApi: base_url + 'api/sys/sys_fleet_info',
  
    /** 
   * sysFleetApi: with Form submission
   * API: Add and Update Truck - Fleet info
   */  
  adminSettingsApi: base_url + 'api/sys/admin_settings',
  
   /** 
   * inquiryApi: with Form submission
   * API: Update Order Status
   */  
  inquiryApi: base_url + 'api/sys/order_status_change',

   /** 
   * postsApi: with Form submission
   * API: Add/Update Posts and Pages
   */  
  postsApi: base_url + 'api/sys/post_pages',

   /** 
   * updateMenus: with Form submission
   * API: Update Menus
   */  
  updateMenus: base_url + 'api/sys/menu_pages',
  
  lang: function lang() {
    return true ? $('body').hasClass('rtl') : false;
  },
  ajax_load_info: function ajax_load_info(txt,namepage, dataItems, controller, classID, fields, typ) {  
          swal({
            title: "Are you sure?",
            text: txt,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Confirmed!",
            closeOnConfirm: false
        }, function(isConfirm){
          if (!isConfirm) return;
           
          $.ajax({ 
            type: "POST",
            url: controller,
            dataType: 'json',
            cache: false,
            data: dataItems,
            beforeSend: function(){
              $("button[type='submit']").attr("disabled", true);
            },
            success: function success(data) {
              var msg = '';
              if (data.success) {
                    if (typ == 'cart') {
                        swal("Success!", "Order has been confirmed!", "success");
                        
                         app.clearCart();
                       setTimeout(function(){  location.reload(); }, 2000);
                    }else if(typ == 'profile'){
                          msg = "Successfully Updated!..";
                          if(data.message){
                              msg = data.message;
                          }  
                         
                          swal("Success!", msg, "success");

                          setTimeout(function(){  
                            location.reload();
                            }, 1500); 

                    }else if(typ){
                        msg = "New/Update has been Successful!";
                        if(data.message){
                            msg = data.message;
                        } 
                       
                        swal("Success!", msg, "success");
                        setTimeout(function(){  
                        window.location.href = base_url + 'client/page/'+typ+'/update?id='+data.id; 
                        }, 1500); 
                    }else{
                      swal("Success!", data.message, "success");
                    }

                    if (classID && fields) {
                      $.each(classID, function (i, k) {
                        $(k).html(data.message[fields[0]]);
                      });
                    }
              
              }else{
                  msg = "Nothing Change!";
                  
                  if(data.message){
                      msg = data.message;
                  } 
                 
                swal("Error!", msg, "error");   
                
              }
            },
            error: function(){ 
              swal({   
                title: "Error!",   
                text: "Something wrong! kindly refresh the page.2" 
              });
            }
          }).done( function(){
            $("button[type='submit']").attr("disabled", false);
          });
          
        }); 
  },
  dataTableConnection: function dataTableConnection() {
    var ns = $('.barba-container').data('namepage');
    var t2 = $('table.' + ns).attr('id', 'datatable-download');
    var t3 = $(t2).attr('id');
    /* Change 0 if for dropdown selection : 1 for downloads */

    $('body').on('change', '#list-download', function(e){ 
          $('#' + t3).dataTable().fnClearTable(0); 
          $('#' + t3).dataTable().fnDestroy(); 
        
          if ($(this).is(':checked')) { 
            app.dataTablesInitialize('#' + t3, 1, ns);
          }else{
            app.dataTablesInitialize('#' + t3, 0, ns);
          } 
    });
    
    if (t3) {
      app.dataTablesInitialize('#' + t3, 0, ns);
    }
  },
  dataTablesInitialize: function dataTablesInitialize(tables, download, bodyClass) {
    var options = '';
    if(options_c != 'all'){
        options = JSON.parse(options_c); 
    }else{
      options = options_c;
    } 
    var searching = true;
    var stateSave = true;
    var render = true;
    var rowsort = [];
    var zapi = '';
    var colDef = '';
    var all = 1;
    var actions = 1;
    /*  true : action buttons show */

    var edit = '';
    
    if(jQuery.inArray("edit", options) !== -1 || options == 'all'){
        edit = 1;
    }
    /*  true : can edit */

    var read = '';
    if(jQuery.inArray("view", options) !== -1 || options == 'all'){
        read = 1;
    }
    /*  true : can edit */

    var del = '';
    if(jQuery.inArray("addelete", options) !== -1 || options == 'all'){
        del = 1;
    }
    /*  true : can delete */

    var act = null;
     
    /* id */

    if (actions) {
      act = -1;
        
        if(edit){ 
          edit = '<a class="action-btn" href="' + curUrl + 'update"><i  data-toggle="tooltip"   title="EDIT" class="fa fa-pencil list-edit text-inverse" ></i> </a>'; 
        }

        if(read){
          read = '<a class="action-btn btn-rev"  href="' + curUrl + 'views"><i data-toggle="tooltip" data-original-title="View" title="VIEW" class="fa fa-external-link text-success list-view" ></i></a>'; 
        }

        if(del){
          del = '<a class="action-btn btn-rev"  href="' + curUrl + 'views"><i data-toggle="tooltip"  data-original-title="Delete"  title="DELETE" class="fa fa-trash btn-rev list-delete text-danger" ></i></a>'; 
        }
 
    }

    colDef = [{
        className: "hidden acc-id",
        "targets": [0],
        visible: false,
        "searchable": false
      }, {
        className: "action",
        "targets": act,
        "data": null,
        "searchable": false,
        "orderable": false,
        "defaultContent": edit + read + del
      }, {
        className: "hidden org-id",
        "targets": -2,
        "searchable": false
    }]; 
   
    if (bodyClass == 'students') {
      all = '<a class="action-btn btn-rev" href="' + curUrl + 'menus"><i class="fa fa-shopping-cart list-view text-success" data-toggle="tooltip"   title="CART"></i> </a>' + '<a class="action-btn btn-rev" href="' + curUrl + 'payments"><i class="fa fa-credit-card-alt list-view text-warning" data-toggle="tooltip"   title="RELOAD ACCOUNT"></i></a>' + '<a class="action-btn btn-rev" href="' + curUrl + 'views"><i class="fa fa-eye list-view text-default" data-toggle="tooltip"   title="VIEW"></i></a>' + '<a class="action-btn" href="' + curUrl + 'update"><i class="fa fa-pencil list-edit text-primary" data-toggle="tooltip"   title="EDIT"></i> </a>' + '<i class="fa fa-trash btn-rev list-delete text-danger" data-toggle="tooltip" title="DELETE"></i>';
          zapi = app.studentApi + '?'+app.keyApi+'&z=1';
 
    }else if(bodyClass == 'orders' || bodyClass == 'inquiries' || bodyClass == 'dashboard'){
          var qstring = '';
          var d = '';
          if(userType == 6){
            qstring = '&x='+logged_id;
          }else if(userType == 1 || userType == 2 || userType == 3 || userType == 5){
            qstring = '&p=99';
          }

          var dh = false;
          if(bodyClass == 'dashboard'){
            colDef = '';
            d = '&dashboard=1'
              rowsort = [[6,'desc']];
              searching = false;
              stateSave = false;
              render = false;
              dh = true;
          }
         

          zapi = app.displayOrdersApi + '?'+app.keyApi+qstring+d;
          var ordStatus = app.orderStatuses(zapi);
          app.orderInquiryStatus(ordStatus, dh);
    }else if(bodyClass == 'users' || bodyClass == 'customers'){  
          var cst = '';
          if(bodyClass == 'customers'){
              cst = '&c=1'; 
          }
          zapi = app.profileApi + '?'+app.keyApi+'&tz=214'+cst; 
    }else if(bodyClass == 'trucks'){  
                colDef = [{
                  className: "hidden acc-id",
                  "targets": [0],
                  visible: false,
                  "searchable": false
                }, {
                  className: "action",
                  "targets": act,
                  "data": null,
                  "searchable": false,
                  "orderable": false,
                  "defaultContent": edit + del
                }, {
                  className: "hidden org-id",
                  "targets": [-2,-3],
                  "searchable": false
              }]; 
 
            zapi = app.productApi + '?'+app.keyApi+'&t=truck'; 
    }else if(bodyClass == 'pages'){   
      zapi = app.pagesApi + '?'+app.keyApi+'&t=page'; 
    }else if(bodyClass == 'posts'){   
      zapi = app.pagesApi + '?'+app.keyApi+'&t=posts'; 
    }
     
    if (!zapi) {
      return false;
    }  

    /*  if download buttons  */
    if(download){ 
      var dm = 'Bfrtip';
        $.extend($.fn.dataTable.defaults, { 
          buttons: ['copy', 'excel', 'csv', 'pdf']
        });
    }else{
      var dm = '<lf<t>ip>'
    }  
    
    $(tables).DataTable({
      dom:  dm,
      "columnDefs": colDef,
      processing: true,
      bserverSide: true,
      ordering: true,
      searching: searching,
      deferRender: render,
      "aaSorting": rowsort,
      ajax: {
        url: zapi,
        type: "POST",
        async: true
      },
      scrollY: 535,
      scroller: {
        loadingIndicator: true
      },
      stateSave: stateSave,
      drawCallback: function drawCallback(settings) {
            var api = this.api();
          
            var rows = api.rows({
              page: 'current'
            }).nodes();
            api.column(0, {
              page: 'current'
            }).data().each(function (g, i) { 

              $(rows).eq(i).attr('id', g);
              $(rows).eq(i).children().addClass('t-child');
              $(rows).eq(i).children().last().removeClass('t-child');
              var sd = $(rows).eq(i).children('td.action').children('a.action-btn');
              var orgID = $(rows).eq(i).children('td.org-id').text();
              /* adding query string id - Action buttons */
              $('a.action-btn').attr('href');
              $.each(sd, function (k, l) {
                    var ds = $(l).attr('href');
                    /* $(l).attr('href', ds + '?id=' + g + '&o=' + orgID); */
                    if (ds.indexOf("?") > 0) {
                        var clean_uri = ds.substring(0, ds.indexOf("?"));
                        ds = clean_uri; 
                    }

                    $(l).attr('href', ds + '?id=' + g);
              });
            });
            $(tables + ' tbody tr').on('click', 'td.t-child', function (e) {
              e.preventDefault();
              e.stopImmediatePropagation();
              var id = $(this).parents('tr').attr('id');

              if (bodyClass == 'students') {
                console.log(id);
              }

              return false;
            });
      }
    }); 
 
  },

  resetPass: function resetPass() {
   /*  app.profileInfo(true, true); */
   app.userInfoUpdate(null,'profile');
    $('body.lists-profile').on('click', 'a.generate-pass', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation(); 
        vs = app.generatePass(12);  
        $('#inputPass').val(vs); 
    });

    var ts = 0;
    $('body.lists-profile').on('click', '.reveal-pass', function (e) {
      ts++;

      if (ts == 1) {
        $('#inputPass').attr('type', 'text');
      } else {
        ts = 0;
        $('#inputPass').attr('type', 'password');
      }
    });

    var controller = app.sysUserApi + '?'+app.keyApi;
    
   var namespace = $('body').data('namespace');
    app.formSubmittion('body','#form-users', controller, namespace); 
  
  },
  generatePass: function generatePass(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#$)@(}*{';
    var charactersLength = characters.length;

    for (var i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
  },

  profileUsed: function profileUsed(){
    $('body.payment-account').on('change','#account-info',function(e){  
      e.preventDefault();
      e.stopImmediatePropagation();
      if ($(this).is(':checked')) {
          $(this).prop("checked", true);
          app.profileInfo(true);
      }else{ 
        $(this).removeAttr("checked");
        $(this).prop("checked", false);
        app.profileInfo(false);
      }  
    }); 
    return false;
  },

  defaultUsed: function(){
    var usedInfo = $('#account-info').prop('checked');
    app.profileInfo(usedInfo);
    return false;
  },

  profileInfo: function profileInfo(usedInfo,p){
    /* var default_postal_code = '00000'; */
    if(usedInfo){
          var profile = app.profileApi + '?'+app.keyApi+'&tz=214&p=1';
          var prof = app.orderStatuses(profile);

          prof.always(function(i,s){
            if(i.length == 0){ return false; }
            if(p){
              var fullname = i[0]['zfirstname'] + ' '+i[0]['zlastname'];
              $('#inputFirst').val(fullname);
              $('#inputPhone').val(i[0]['zphone_num']);
              $('#inputComp').val(i[0]['zwebsite']);
             
              $('#profUser').text(i[0]['zusername']);
             
            }else{
                  $('#inputFirst').val(i[0]['zfirstname']);
                  $('#inputLast').val(i[0]['zlastname']);
            }
      
            $('#inputAddress').val(i[0]['zaddress']);    
              $('#profemail').val(i[0]['zemail']); 
              $('#inputCardHolder').val(i[0]['zfirstname'] + ' ' +i[0]['zlastname']); 
          });
    }else{
          $('#inputFirst').val('');
          $('#inputLast').val(''); 
          $('#inputAddress').val(''); 
          $('#inputCardHolder').val('');
         /*  $('#inputpostal').val(default_postal_code); */
    }
    app.profileUsed();
    return false;
  },
  cardPayment: function cardPayment() {
    app.defaultUsed();
    app.CCpayment();
    var masking = {
      /*  User defined Values */
      creditCardId: 'cc',
      maskedNumber: 'X',

      /*  object re: credit cards */
      cardMasks: {
        3: {
          'card': 'amex',
          'placeholder': 'XXX XXXXXX XXXXX',
          'pattern': '3\[47\]\\d \\d{6} \\d{5}',
          'regex': /^3[47]/,
          'regLength': 2
        },
        4: {
          'card': 'visa',
          'placeholder': 'XXXX XXXX XXXX XXXX',
          'pattern': '4\\d{3} \\d{4} \\d{4} \\d{4}',
          'regex': /^4/,
          'regLength': 1
        },
        5: {
          'card': 'mastercard',
          'placeholder': 'XXXX XXXX XXXX XXXX',
          'pattern': '5\[1-5\]\\d{2} \\d{4} \\d{4} \\d{4}',
          'regex': /^5[1-5]/,
          'regLength': 2
        },
        6: {
          'card': 'discover',
          'placeholder': 'XXXX XXXX XXXX XXXX',
          'pattern': '(6011 \\d\\d|6221 2\[6-9\]|6221 3\\d|622\[2-8\] \\d\\d|6229 \[01\]\\d|6229 2\[0-5\]|6226 4\[4-9\]|65\\d\\d \\d\\d)\\d{2} \\d{4} \\d{4}',
          'regex': /^(6011|6221 2[6-9]|6221 3|622[2-8]|6229 [01]|6229 2[0-5]|6226 4[4-9]|65)/,
          'regLength': 7
        }
      },
      init: function init() {
        masking.createShell(document.getElementById(masking.creditCardId));
        masking.activateMasking(document.getElementById(masking.creditCardId));
      },

      /* replaces each masked input with a shall containing the input and it's mask. */

      /* this should be credit card render in react */
      createShell: function createShell(input) {
        var text = '',
        placeholder = input.getAttribute('placeholder');
        input.setAttribute('data-placeholder', placeholder);
        input.setAttribute('data-original-placeholder', placeholder);
        input.removeAttribute('placeholder');
        text = '<span class="shell">' + '<span aria-hidden="true" id="' + input.id + 'Mask""><i></i>' + placeholder + '</span>' + input.outerHTML + '</span>';
        input.outerHTML = text;
      },
      setValueOfMask: function setValueOfMask(value, placeholder) {
        return "<i>" + value + "</i>" + placeholder.substr(value.length);
      },

      /*  add event listeners. only did IE9+. Do we need attach Event? */
      activateMasking: function activateMasking(input) {
        input.addEventListener('keyup', function (e) {
          masking.handleValueChange(e);
        }, false);
        input.addEventListener('blur', function (e) {
          masking.handleBlur(e);
        }, false);
        input.addEventListener('focus', function (e) {
          masking.handleFocus(e);
        }, false);
      },
      handleValueChange: function handleValueChange(e) {
        var id = e.target.getAttribute('id'),
            currentMaskValue = document.querySelector('#' + id + 'Mask i'),
            currentInputValue = e.target.value = e.target.value.replace(/\D/g, "");
        /*  if there is no correct mask or if value hasn't changed, move on */

        if (!currentMaskValue || currentInputValue == currentMaskValue.innerHTML) {
          return;
        }
        /* If value is empty, not a number or out of range, remove any current cc type selection */


        if (!currentInputValue || currentInputValue[0] < 3 || currentInputValue[0] > 6) {
          e.target.value = '';
          masking.returnToDefault(e);
          return;
        }
        /*  everything is right in the universe */


        masking.setCreditCardType(e, currentInputValue[0]);
      },
      setCreditCardType: function setCreditCardType(e, firstDigit) {
        var cc = masking.cardMasks[firstDigit],
            mask = document.getElementById(e.target.id + 'Mask');
        /* set the credit card class */

        e.target.parentNode.parentNode.classList.add(cc.card);
        /* set the credit card regex */

        e.target.setAttribute('pattern', cc.pattern);
        /* set the credit card pattern */

        e.target.setAttribute('data-placeholder', cc.placeholder);
        /* handle the current value */

        e.target.value = masking.handleCurrentValue(e);
        /* set the inputmask */

        mask.innerHTML = masking.setValueOfMask(e.target.value, cc.placeholder);
      },
      returnToDefault: function returnToDefault(e) {
        var input = e.target,
            placeholder = input.getAttribute('data-original-placeholder');
        /*  set original placeholder */

        input.setAttribute('data-placeholder', placeholder);
        document.getElementById(e.target.id + 'Mask').innerHTML = "<i></i>" + placeholder;
        /*  remove possible credit card classes */

        input.parentNode.parentNode.classList.remove('error');

        for (var i = 3; i <= 6; i++) {
          e.target.parentNode.parentNode.classList.remove(masking.cardMasks[i].card);
        }
        /*  make sure value is empty */


        input.value = '';
      },
      handleFocus: function handleFocus(e) {
        var parentLI = e.target.parentNode.parentNode;
        parentLI.classList.add('focus');
      },
      handleBlur: function handleBlur(e) {
        var parentLI = e.target.parentNode.parentNode,
            currValue = e.target.value,
            pattern,
            mod10,
            mod11 = true;
        /* if value is empty, remove label parent class */

        if (currValue.length == 0) {
          parentLI.classList.remove('focus');
        } else {
          pattern = new RegExp(e.target.getAttribute('pattern'));

          if (mod11 && currValue.replace(/\D/g, '').length == 16) {
            masking.testMod11(currValue);
          }

          if (currValue.match(pattern) && masking.testMod10(currValue)) {
            parentLI.classList.remove('error');
          } else {
            parentLI.classList.add('error');
          }
        }
      },
      testMod10: function testMod10(value) {
        var strippedValue = value.replace(/\D/g, ''),

        /* numbers only */
        len = strippedValue.length,

        /* 15 or amex, all others 16 */
        digit = strippedValue[len - 1],

        /*  tester digit */
        i,
            myCheck,
            total = 0,
            temp;

        for (i = 2; i <= len; i++) {
          if (i % 2 == 0) {
            temp = strippedValue[len - i] * 2;

            if (temp >= 10) {
              total += 1 + temp % 10;
            } else {
              total += temp * 1;
            }
          } else {
            total += strippedValue[len - i] * 1;
          }
        }

        myCheck = (10 - total % 10) % 10;
        return (myCheck + 1) % 10 == digit;
      },
      testMod11: function testMod11(value) {
        var strippedValue = value.replace(/\D/g, ''),

        /*  numbers only */
        len = strippedValue.length,

        /* usually 16 */
        digit = strippedValue[len - 1],

        /*  tester digit */
        testDigits = strippedValue.substr(0, len - 1),

        /*  15 or 12 digits */
        i,
            myCheck,
            total = 0,
            temp;

        for (i = len - 1; i > 0;) {
          temp = Number(testDigits[--i]);

          if (i % 2 == 0) {
            temp *= 2;
          }

          if (temp > 9) {
            temp -= 9;
          }

          total += temp;
        }
        /*
           if card number is 16 digit, then fetch first 15 digits (card15) and last digit is check-digit
           else if card number is 13 digit, then fetch first 12 digits (card12) and last digit is check-digit
           as we don't have 13 digit card numbers, we're only doing 16 test.*/


        myCheck = (10 - total % 10) % 10;
        myCheck = (myCheck + 1) % 10;
        var PAN = '' + testDigits + myCheck;

        if (myCheck == digit && PAN == strippedValue) {
          return true;
        } else {
          return false;
        }
      },

      /*  tests whether there is an error in the credit card number at a specifi */
      testRegExProgression: function testRegExProgression(e, value) {
        var cc = masking.cardMasks[value[0]];

        if (value.length >= cc.regLength) {
          if (!cc.regex.test(value) && !e.target.parentNode.parentNode.classList.contains('error')) {
            /* show error message instead */
            e.target.parentNode.parentNode.classList.add('error');
            masking.errorOnKeyEntry('You have an error in your credit card number', e);
          }
        } else {
          /*  remove error notfications if they deleted the excess characters */
          e.target.parentNode.parentNode.classList.remove('error');
        }
      },
      handleCurrentValue: function handleCurrentValue(e) {
        var placeholder = e.target.getAttribute('data-placeholder'),
            value = e.target.value,
            l = placeholder.length,
            newValue = '',
            i,
            j,
            isInt,
            strippedValue;
        /*  strip special characters */

        strippedValue = value.replace(/\D/g, "");

        for (i = 0, j = 0; i < l; i++) {
          var x = isInt = !isNaN(parseInt(strippedValue[j]));
          var matchesNumber = masking.maskedNumber.indexOf(placeholder[i]) >= 0;

          if (matchesNumber && isInt) {
            newValue += strippedValue[j++];
          } else if (!isInt && matchesNumber) {
            /* masking.errorOnKeyEntry();  write your own error handling function */
            return newValue;
          } else {
            newValue += placeholder[i];
          }
          /*  break if no characters left and the pattern is non-special character */


          if (strippedValue[j] == undefined) {
            break;
          }
        }

        masking.testRegExProgression(e, newValue);
        return newValue;
      },
      errorOnKeyEntry: function errorOnKeyEntry(message, e) {
        console.log(message);
      }
    };
    masking.init();
    var foo = document.getElementById('cc');
  },

  CCpayment: function CCpayment() {
    $("#inputAmount").keyup(function () {
      $("#inputAmount").val(this.value.match(/[0-9]*/));
    });
    $("#cc").keyup(function () {
      $("#cc").val(this.value.match(/[0-9]*/));
    });
    $('body.payment-account').on('click', '.btn-paynow', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var parentForm = $(this).parents('form');
      var amnt = $(parentForm).find('#inputAmount').val();
      var inputFirst = $(parentForm).find('#inputFirst').val();
      var inputLast = $(parentForm).find('#inputLast').val();
      var inputCountry = $(parentForm).find('#inputCountry').val();
      var inputPostal = $(parentForm).find('#inputpostal').val();
      var inputCardNumber = $(parentForm).find('#cc').val();
      var inputCardHolder = $(parentForm).find('#inputCardHolder').val();
      var inpuExpiryMonth = $(parentForm).find('#inpuExpiryMonth').val();
      var inpuExpiryYear = $(parentForm).find('#inpuExpiryYear').val();
      var inputCVV = $(parentForm).find('#inputCVV').val();

      if (amnt >= 20) {
        if (inputFirst && inputLast && inputCountry && inputPostal) {
          if (inputCardNumber && inputCardHolder && inpuExpiryMonth && inpuExpiryYear && inputCVV.length == 3) {
            console.log('Amount: ' + amnt);
            console.log('First: ' + inputFirst);
            console.log('Last: ' + inputLast);
            console.log('Country: ' + inputCountry);
            console.log('Postal: ' + inputPostal);
            console.log('Card Num: ' + inputCardNumber);
            console.log('Card Holder: ' + inputCardHolder);
            console.log('Month: ' + inpuExpiryMonth);
            console.log('Year: ' + inpuExpiryYear);
            console.log('CVV: ' + inputCVV.length);
            var cpayment = $(this).parent().find('.d-payment');
            $(cpayment).removeAttr('hidden');
            $(cpayment).removeClass('hidden');
            $(cpayment).attr('type', 'submit');
            $(cpayment).removeClass('d-payment');
            $(cpayment).addClass('confirm-payment');
            $('input').attr('readonly');
            $('span.formMsg').html('Kindly confirm the payment');
            $(this).remove();
          } else {
            alert('Card Holder, Card Number, Expiry date are required fields.');
          }
        } else {
          alert('Name, Country, Address and Postal are required fields.');
        }
      } else {
        alert('20 AED Minimum recharge.');
      }
    });
  },

  clearCart: function clearCart() {
    var ls = localStorage;
    ls.setItem('gcart', ''); 
    ls.setItem('gcartS', '');
   
    $('.div-parent').remove();
    $('.food-selection input').attr('checked', false);
    $('.food-selection input').prop('checked', false);
    $('body.food-selection .meal-selected').css({
      '-webkit-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
      '-moz-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
      'box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)'
    });
  },

  inCart: function inCart(ev) {
    var ls = localStorage;
    var mealCount = 0;
    var sum = 0;
    var currentBalance = Number($('.single-balance').text());
    var urlParams = app.paramQuery;
    var myParam = urlParams('id');
    var account = false;
    currentBalance = parseFloat(currentBalance);  

    if (ls && ls.getItem('gcart') && ls.getItem('gcart') != '[]') {
     
      var cart = JSON.parse(ls.getItem('gcart'));
      $.each(cart, function (i, s) {
        if (s.parentID == myParam) {
          account = true;
        }
      });

      if (account) { 
         
        $.each(cart, function (i, s) {  
          var getIDsched = $("#" + s.id).data('sched');
          if (s.parentID == myParam && s.orderDate == getIDsched) { 
            $("#" + s.id).css({
              '-webkit-box-shadow': '1px 2px 5px 5px rgba(25,118,210,0.75)',
              '-moz-box-shadow': '1px 2px 5px 5px rgba(25,118,210,0.75)',
              'box-shadow': '1px 2px 5px 5px rgba(25,118,210,0.75)'
            });
            $("#" + s.id).addClass('meal-selected');
            $("#" + s.id).find('input').attr('checked', 'checked');
            mealCount++;
            var price = Number(s.price);
            sum = Number(sum + price);

            if (ev) {
              $(s.layout).appendTo('.cart-body');
            }
          }
        });

        if (currentBalance < sum) {
          $('.btn-purchase').attr('type', 'button');
          $('.btn-purchase').attr('disabled', 'disabled');
          $('.btn-purchase').removeClass('confirm-purchase');
          $('.btn-purchase').removeClass('btn-info');
          $('.btn-purchase').addClass('btn-danger');
          $('.menu-meals').css({
            'background': '#4d4b4b',
            'color': '#fff'
          });
          $('.menu-meals input.add-menu').attr('readonly', 'readonly');
          $('.menu-meals input.add-menu').attr('disabled', 'disabled');
          $('.meal-selected').css({
            'background': 'inherit',
            'color': 'inherit'
          });
          $('.meal-selected input').removeAttr('readonly');
          $('.meal-selected input').removeAttr('disabled');
        } else {
          $('.menu-meals input').removeAttr('readonly', 'readonly');
          $('.menu-meals input').removeAttr('disabled', 'disabled');
          $('.menu-meals').css({
            'background': 'inherit',
            'color': 'inherit'
          });
          $('.btn-purchase').addClass('btn-info');
          $('.btn-purchase').removeClass('btn-danger');
          $('.btn-purchase').addClass('confirm-purchase');
          $('.btn-purchase').attr('type', 'submit');
          $('.btn-purchase').removeAttr('disabled');
        }

        if (ev) {
          $('body.food-selection .main-row').find('.total-price').text(sum.toFixed(2));
          $('body.food-selection .main-row').find('.meal-count').text(mealCount);
          app.removeCartAfterHour();
        }

        $('.food-selection form').attr('id', 'form-active');
      } else {
        $('.btn-purchase').attr('type', 'button');
        $('.btn-purchase').attr('disabled', 'disabled');
        $('.btn-purchase').removeClass('confirm-purchase');
        $('.btn-purchase').removeClass('btn-info');
        $('.btn-purchase').addClass('btn-danger');
        $('.food-selection form').removeAttr('id');
      }
    } else {
      $('body.food-selection .meal-selected').css({
        '-webkit-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
        '-moz-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
        'box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)'
      });
      $("body.food-selection").find('.menu-meals input').removeAttr('readonly', 'readonly');
      $("body.food-selection").find('.menu-meals input').removeAttr('disabled', 'disabled');
      $("body.food-selection").find('.menu-meals').css({
        'background': 'inherit',
        'color': 'inherit'
      });
      $('body.food-selection .menu-meals').removeClass('meal-selected');
      var chbox = $("body.food-selection .add-menu");
      $(chbox).attr("checked", false);
      $(chbox).prop("checked", false);
      $('.btn-purchase').attr('type', 'button');
      $('.btn-purchase').attr('disabled', 'disabled');
      $('.btn-purchase').removeClass('confirm-purchase');
      $('.btn-purchase').removeClass('btn-info');
      $('.btn-purchase').addClass('btn-danger'); 
    }

    app.removeMenu();
    app.cartSubmission();
    app.modalExtras();
    
    /* Clear cart on 15secs idle */
    setTimeout(function(){
      var ccntr = $(".counter-clear").text(); 
      if(ccntr == '00:01'){
        app.clearCart();
      }
    }, 15000);

    return false;
  }, 

  /***************
   * function: modalExtras
   * Modal
   * Description: Display all complimentaries on popup
   * on menus pages
  ****************/
  modalExtras: function(){
    var tzcomps = app.extrasApi  + '?'+app.keyApi+'&tz=214&tp=meal';
    var setParents = ''
    $('body').on('click','.add-extras', function(e){
      e.preventDefault();
     
      $('#addExtrasModal').modal('show');
      var outerTarget = $(this);
      setParents = $(outerTarget).parents('.div-parent');
      var getComps = $(outerTarget).parents('.div-parent').find('.hidden-comps').val();
      var idAPI = app.orderStatuses(tzcomps);

      idAPI.always(function(data,s){
        if(data.length == 0){ return false; }
      var checked;
      var comp = [];
     
            if(s == 'success'){

              /* Convert complimentaries string to array */
              getComps = getComps.split(","); 

              $.each(data, function(i,item){  
                 
                if( $.inArray(item['ztitle'],getComps)!='-1') { checked = 'checked'; }else{ checked = ''; }  
                comp[i] = '<div class="checkbox"><input id="drop-'+item['zid']+'" '+checked+' value="'+item['ztitle']+'" type="checkbox"><label class="text-info" for="drop-'+item['zid']+'">'+item['ztitle']+'</label></div>'
                 
              });
             
                comp.toString();
                $('.modal-body').html(comp);

                $('body').on('click','.btn-update', function(ev){
                  ev.preventDefault();
                
                  var ns = '';
                  
                $('#addExtrasModal').modal('hide');

                var zchilds = $(this).parents('.modal-content').find('.modal-body').children();
                var newComz = [];
                  $.each(zchilds, function(t,z){
                    if($(z).find('input').prop('checked')){
                      newComz[t] = $(z).find('input').val();
                      ns += '<p class="complimentary"><span>'+newComz[t]+'</span><i class="fa fa-trash-o text-warning supp-remove pull-right" data-title="Remove Complimentary" title="Remove Complimentary"></i></p>';
                    }
                  });
                var newComz = app.filter_array(newComz);
                var valComp = newComz.toString();
                var inputComp = '<input type="hidden" hidden name="comps[]" class="hidden-comps" value="'+valComp+'"></input>';
                ns +=  inputComp;
                
                $(setParents).find('.comp-items').html(ns);
                  return false;
              });
             
            } 
      }); 
      return false;
    }); 

    $("#addExtrasModal").on('hidden.bs.modal', function () {
        $(this).data('bs.modal', null);
    });
  },  

  /***************
    * function: filter_array 
    * Description: Remove empty elements in array and reindex
    * on menus pages - Modal
    ****************/
  filter_array: function(chk_array) {
        let index = -1;
        const arr_length = chk_array ? chk_array.length : 0;
        let resIndex = -1;
        const result = [];

        while (++index < arr_length) {
            const value = chk_array[index];

            if (value) {
                result[++resIndex] = value;
            }
        }

        return result;
    },

   /***************
    * function: cartSubmission
    * Form submit
    * Description: Purchase order success/fail
    * on menus pages
    ****************/

  cartSubmission: function() {
    var controller = app.orderApi + '?'+app.keyApi; 

    app.formSubmittion('body.food-selection','#form-active', controller ); 
  },
  
  removeMenu: function removeMenu() {
    var urlParams = app.paramQuery;
    var myParam = urlParams('id');
    var currentBalance = $('.single-balance').text();
    var ls = localStorage;
    var oldCart = [];
   
    /* remove complimentary */
    $('body.food-selection').on('click','.supp-remove', function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var inputValue = $(this).parents('.div-parent').find('.hidden-comps').val();
      var removeComp = $(this).parents('p.complimentary').find('span').text();
       
      var newComp = inputValue.replace(removeComp,'');
      var split = newComp.split(',');

      var filtered = split.filter(function(str) {
        return /\S/.test(str);
      });
      
      var newSp = [];
      var space = '';
      for(var x=0; x < filtered.length; x++){
        if(filtered[x] != null || filtered[x] != " "){ 
          newSp[x] = filtered[x] + space;
        }
      }
      newSp = newSp.join();
      
      $(this).parents('.div-parent').find('.hidden-comps').val(newSp);
      $(this).parent().remove();  
      
    });
    
    /* remove meal on cart */
    $('body.food-selection').on('click', '.cart-remove', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var mainPareint = $(this).parents('.main-row');

      oldCart = JSON.parse(ls.getItem('gcart'));

      var id = $(this).parents('.div-parent').data('vid');
      var cartParent = $(this).parents('.div-parent');  
   
      var price = $(cartParent).find('span').data('price');
      var priceVal = parseFloat(price);
     
      var totalPrice = $(mainPareint).find('.total-price').text();
      totalPrice = parseFloat(totalPrice);
      var mealCount = parseInt($(mainPareint).find('.meal-count').text());  

        mealCount--;
        totalPrice -= parseFloat(priceVal);
        $(mainPareint).find('.menu-meals.meal-selected#'+id).css({
          '-webkit-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
          '-moz-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
          'box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)'
        });
         
        $(mainPareint).find('.menu-meals.meal-selected#'+id + ' input').prop('checked', false);
        $(mainPareint).find('.menu-meals.meal-selected#'+id).removeClass('meal-selected'); 
        /* remove from cart */

        var dr;
        var drNew = [];
        $.each(oldCart, function (i, sb) {
          drNew[i] = sb;

          if (sb.parentID == myParam && sb.id == id) {
            dr = sb;
          }
        });
        var items = drNew;
        var valueToRemove = dr;
      
        var filteredItems = items.filter(function (item) {
          return item !== valueToRemove;
        });
       
        ls.setItem('gcart', JSON.stringify(filteredItems)); 

      var totalCount = parseInt(mealCount);
      $(mainPareint).find('.meal-count').text(totalCount);
      $(mainPareint).find('.total-price').text(totalPrice.toFixed(2));

      if (currentBalance < totalPrice) {
        $('.food-selection form').removeAttr('id');
        $('.btn-purchase').attr('type', 'button');
        $('.btn-purchase').attr('disabled', 'disabled');
        $('.btn-purchase').removeClass('confirm-purchase');
        $('.btn-purchase').removeClass('btn-info');
        $('.btn-purchase').addClass('btn-danger');
        $(mainPareint).find('.menu-meals').css({
          'background': '#4d4b4b',
          'color': '#fff'
        });
        $(mainPareint).find('.menu-meals input.add-menu').attr('readonly', 'readonly');
        $(mainPareint).find('.menu-meals input.add-menu').attr('disabled', 'disabled');
        $(mainPareint).find('.meal-selected').css({
          'background': 'inherit',
          'color': 'inherit'
        });
        $(mainPareint).find('.meal-selected input').removeAttr('readonly');
        $(mainPareint).find('.meal-selected input').removeAttr('disabled');
      } else {
        $(mainPareint).find('.menu-meals input').removeAttr('readonly', 'readonly');
        $(mainPareint).find('.menu-meals input').removeAttr('disabled', 'disabled');
        $(mainPareint).find('.menu-meals').css({
          'background': 'inherit',
          'color': 'inherit'
        });

        if (totalPrice > 0) { 
          $('.food-selection form').attr('id', 'form-active');
          $('.btn-purchase').addClass('btn-info');
          $('.btn-purchase').removeClass('btn-danger');
          $('.btn-purchase').addClass('confirm-purchase');
          $('.btn-purchase').attr('type', 'submit');
          $('.btn-purchase').removeAttr('disabled');
        } else {
          $('.food-selection form').removeAttr('id');
          $('.btn-purchase').attr('type', 'button');
          $('.btn-purchase').attr('disabled', 'disabled');
          $('.btn-purchase').removeClass('confirm-purchase');
          $('.btn-purchase').removeClass('btn-info');
          $('.btn-purchase').addClass('btn-danger');
        }
      }
      $(cartParent).remove();
    
    });

    return false;
  },

  addMenu: function addMenu() {
    
    var urlParams = app.paramQuery;
    var myParam = urlParams('id');
    var currentBalance = $('.single-balance').text();
    var ls = localStorage;
    var oldCart = []; 
    var tzcomps = app.extrasApi  + '?'+app.keyApi+'&tz=214&tp=meal';
    
    $('body.food-selection').on('click', '.add-menu', function (e) { 
      var dr;
      var drNew = [];
      var id = $(this).parents('.menu-meals').data('id');
      var idMeal = id.replace(/\D/g,'');
      var mealParent = $(this).parents('.menu-meals');
      var mainPareint = $(this).parents('.main-row');
      var mealDesc = $(mealParent).find('.tooltip-item').text();
      var sched = $(mealParent).data('sched'); 
      var datameal = $(this).data('meal');
      var price = $(this).val();
      var priceVal = parseFloat(price);
      var layout;
      var nb, newLayout = '';
      var totalPrice = $(mainPareint).find('.total-price').text();
      totalPrice = parseFloat(totalPrice);
      var mealCount = parseInt($(mainPareint).find('.meal-count').text());

      if (ls.getItem('gcart')) {
        oldCart = JSON.parse(ls.getItem('gcart'));
      }

      if ($(this).is(':checked')) {  
            totalPrice += parseFloat(priceVal);
            $(mealParent).css({
              '-webkit-box-shadow': '1px 2px 5px 5px rgba(25,118,210,0.75)',
              '-moz-box-shadow': '1px 2px 5px 5px rgba(25,118,210,0.75)',
              'box-shadow': '1px 2px 5px 5px rgba(25,118,210,0.75)'
            });
            $(mealParent).addClass('meal-selected');
            mealCount++;
            layout = '<div class="col-lg-12 text-left p-t-20 div-parent" data-vid="' + id + '" id="' + datameal + '">'+
                      '<span class="cartData-item" data-id="'+id+'" data-meal="'+datameal+'" data-price="'+price+'" ></span>'+
                      '<input type="hidden" hidden name="meals[]" value="'+idMeal+'">'+
                      '<input type="hidden" hidden name="mealsprice[]" value="'+price+'">'+ 
                      '<input type="hidden" hidden name="prodSched[]" value="'+sched+'">'+ 
                      '<i class="fa fa-trash-o text-danger cart-remove pull-right" data-title="Remove Meal" title="Remove Meal"></i>' +  
                      '<h6 class="card-title meal-title">Meal: ' + mealDesc + '</h6>' + '<h6 class="card-subtitle">Price: <span class="price text-warning">' + price + ' AED</span></h6>' + 
                      '<i class="fa fa-plus-circle text-success add-extras pull-right" data-title="Add Extras" title="Add Extras"></i>' + 
                      '<p class="complimentary text-title">Complimentary Meal </p>' + 
                      '<hr class="complimentary"/><div class="comp-items">';
                      /* Add to cart */
                      
            
            var idAPI = app.orderStatuses(tzcomps);
            idAPI.always(function(data,s){
              if(data.length == 0){ return false; }

              var ln = [];
              var comp = [];
              var endLayout=''    ;
                if(data){
                    if(s == 'success'){
                       endLayout = layout;
                      $.each(data, function(i,item){
                        if(i === app.defaultCountComplimentary) {return false;}
                        ln[i] = item['ztitle'];
                        endLayout += '<p class="complimentary"><span>'+item['ztitle']+'</span><i class="fa fa-trash-o text-warning supp-remove pull-right" data-title="Remove Complimentary" title="Remove Complimentary"></i></p>';
                      });
                        
                      newLayout = '<input type="hidden" hidden name="comps[]" class="hidden-comps" value="'+ln+'">';
                    }  
                        
                }else{
                   endLayout =  layout; 
                }
                     
                  nb = endLayout+ newLayout +'</div></div>'; 
                  $(nb).appendTo('.cart-body');
                  var newDate = new Date();
                  newDate.setMinutes(newDate.getMinutes() + 59);
      
                  var ids = {
                              'parentID': myParam,
                              'id': id,
                              'orderDate': sched,
                              'layout': nb,
                              'price': price
                            };
                  
                  oldCart.push(ids);
                
                  ls.setItem('gcartS', newDate);
                  ls.setItem('gcart', JSON.stringify(oldCart));
              }); 
          
      } else {
        
              mealCount--;
              totalPrice -= parseFloat(priceVal);
              $(mealParent).css({
                '-webkit-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
                '-moz-box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)',
                'box-shadow': '0px 0px 0px 0px rgba(0,0,0,0.75)'
              });
              $(mealParent).removeClass('meal-selected');
              $(mainPareint).find('#' + datameal).remove();
              /* remove from cart */
              
              $.each(oldCart, function (i, sb) {
                drNew[i] = sb;
                if (sb.parentID == myParam ) {
                  if(sb.id == id){ 
                    dr = sb;
                  }
                }
              });
              var items = drNew;
              var valueToRemove = dr;
            
              var filteredItems = items.filter(function (item) { 
                return item !== valueToRemove;
              });
            
              ls.setItem('gcart', JSON.stringify(filteredItems));
      } 
      
      var totalCount = parseInt(mealCount);
      $(mainPareint).find('.meal-count').text(totalCount);
      $(mainPareint).find('.total-price').text(totalPrice.toFixed(2));

      if (currentBalance < totalPrice) {
        $('.food-selection form').removeAttr('id');
        $('.btn-purchase').attr('type', 'button');
        $('.btn-purchase').attr('disabled', 'disabled');
        $('.btn-purchase').removeClass('confirm-purchase');
        $('.btn-purchase').removeClass('btn-info');
        $('.btn-purchase').addClass('btn-danger');
        $(mainPareint).find('.menu-meals').css({
          'background': '#4d4b4b',
          'color': '#fff'
        });
        $(mainPareint).find('.menu-meals input.add-menu').attr('readonly', 'readonly');
        $(mainPareint).find('.menu-meals input.add-menu').attr('disabled', 'disabled');
        $(mainPareint).find('.meal-selected').css({
          'background': 'inherit',
          'color': 'inherit'
        });
        $(mainPareint).find('.meal-selected input').removeAttr('readonly');
        $(mainPareint).find('.meal-selected input').removeAttr('disabled');
      } else {
        $(mainPareint).find('.menu-meals input').removeAttr('readonly', 'readonly');
        $(mainPareint).find('.menu-meals input').removeAttr('disabled', 'disabled');
        $(mainPareint).find('.menu-meals').css({
          'background': 'inherit',
          'color': 'inherit'
        });

        if (totalPrice > 0) {
          $('.food-selection form').attr('id', 'form-active');
          $('.btn-purchase').addClass('btn-info');
          $('.btn-purchase').removeClass('btn-danger');
          $('.btn-purchase').addClass('confirm-purchase');
          $('.btn-purchase').attr('type', 'submit');
          $('.btn-purchase').removeAttr('disabled');
        } else {
          $('.food-selection form').removeAttr('id');
          $('.btn-purchase').attr('type', 'button');
          $('.btn-purchase').attr('disabled', 'disabled');
          $('.btn-purchase').removeClass('confirm-purchase');
          $('.btn-purchase').removeClass('btn-info');
          $('.btn-purchase').addClass('btn-danger');
        }
      }
      
      app.removeCartAfterHour();
     
    }); 
   
    return false;
  }, 
   
  menuCreation: function menuCreation() {
   
    var urlParams = app.paramQuery;
    var myParam = urlParams('o');
    var myParamID = urlParams('id');

    if (!myParam || !myParamID) {
      return false;
    }

    var studID = app.studentApi  + '?'+app.keyApi+ '&s=' + myParamID;
    var idAPI = $.post(studID, function (data) {
      
      if (data.recordsTotal > 0) {
        $('.food-selection #customer-name').html(data['data'][0][2]);
        $('.food-selection #single-balance').text(data['data'][0][7]);
      } else {
        $('.food-selection #single-balance').text('');
      }

       return data;
        
      
    },'json');  

     idAPI.always(function(i,s){
          if(i.length == 0){ return false; }

          if(s == 'success' && i.recordsTotal > 0){
              var getAPI = app.productApi + '?'+app.keyApi + '&o=' + myParam;
              $.post(getAPI, function (data2) {
              
                var category = [];
                var uniqueCat = [];
              
                if (data2.length > 0) {
                
                  var jsonData = data2;
                  $.each(jsonData, function (i, o) {
                    category[i] = o['zcategory'];
                  });
                  $.each(category, function (i, el) {
                    if ($.inArray(el, uniqueCat) === -1) uniqueCat.push(el);
                  });
                  app.initializeCategoryLayout(uniqueCat, jsonData, 0, true);
                  app.menuDateSelector(uniqueCat, jsonData);
                  app.addMenu();
                }
              },'json');
          }
       
     });
    return false
  },
  menuDateSelector: function menuDateSelector(uniqueCat, data) {
    var cc = 0;
    var vcc = 0;
    $('body.food-selection').on('click', '.btn-next', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      cc++;
      vcc++;
      $('#menu-initialize').css('opacity', '0.1');
      $('#display-menucal').css('opacity', '0.1');
      $('body.food-selection').find('.btn-previous').attr('data-val', vcc);
      $(this).attr('disabled', 'disabled');
      setTimeout(function () {
        $('#menu-initialize').css('opacity', '1');
        $('#display-menucal').css('opacity', '1');
        $('body.food-selection').find('.btn-next').removeAttr('disabled');

        if (vcc > 0) {
          $('body.food-selection').find('.btn-previous').removeAttr('disabled');
          $('body.food-selection').find('.btn-previous').addClass('btn-prev');
        }

        app.initializeCategoryLayout(uniqueCat, data, cc, false);
      }, 500);
      $(this).attr('data-val', cc);
    });
    $('body.food-selection').on('click', '.btn-prev', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      vcc--;
      cc--;
      $(this).attr('disabled', 'disabled');
      $('body.food-selection .btn-next').attr('data-val', cc);
      $(this).attr('data-val', vcc);
      $('#menu-initialize').css('opacity', '0.1');
      $('#display-menucal').css('opacity', '0.1');
      setTimeout(function () {
        $('#menu-initialize').css('opacity', '1');
        $('#display-menucal').css('opacity', '1');
        $('body.food-selection').find('.btn-previous').removeAttr('disabled');

        if (vcc < 1) {
          $('body.food-selection').find('.btn-previous').attr('disabled', 'disabled');
          $('body.food-selection').find('.btn-previous').removeClass('btn-prev');
        }

        app.initializeCategoryLayout(uniqueCat, data, vcc, false);
      }, 500);
    });
    $('body.food-selection').on('click', '.btn-today', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      vcc = 0;
      cc = 0;
      $('body.food-selection .btn-next').attr('data-val', cc);
      $('body.food-selection .btn-previous').attr('data-val', vcc);
      $('body.food-selection .btn-previous').attr('disabled', 'disabled');
      $('#menu-initialize').css('opacity', '0.1');
      $('#display-menucal').css('opacity', '0.1');
      setTimeout(function () {
        $('#menu-initialize').css('opacity', '1');
        $('#display-menucal').css('opacity', '1');
        app.initializeCategoryLayout(uniqueCat, data, 0, false);
      }, 500);
    });

    return false;
  },
  initializeCategoryLayout: function initializeCategoryLayout(uniqueCat, data, cc, ev) {
    var layout = '';
    var headerLayout = '';
    var fdate = [];
    var fdays;
    var wsize = app.wr;
    var c = 6;
    var z = 2;

    if (app.dv > 500 || wsize > 500) {
      fdays = app.formatDate(c + cc);
      /* desktop value 6 */
    } else {
      fdays = app.formatDate(z + cc);
      /* mobile value 2 */
    }

    var dayName, ds, sds;
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curDay = new Date();
    var nextDay = curDay.setDate(curDay.getDate() + cc);
    nextDay = new Date(nextDay);
    var x = 0;
    headerLayout = '<div class="menu-category">Category <br/> &nbsp;</div>';
 
    /* Display date - 7 days */
    for (var d = nextDay; d <= fdays; d.setDate(d.getDate() + 1)) {
          ds = new Date(d);
          dayName = days[ds.getDay()];
          var year = ds.getFullYear();
          var month = ds.getMonth() + 1;
          var day = ds.getDate();
          if (month < 10) month = '0' + month;
          if (day < 10) day = '0' + day;
          fdate[x] = [year, month, day].join('-');
          sds = [day, month, year].join('-');
          headerLayout += '<div class="menu-calendar">' + dayName + '<br/>' + sds + '</div>';
          x++;
    }  

    $('#display-menucal').html(headerLayout);
    var cleanS = '';
    var cleanH = '';
    var cleanW = '';
    
    $.each(uniqueCat, function (k, s) {
      
      layout += '<div class="row row-menuheader p-l-20">' + '<div class="menu-meals menus-title">' + s + '</div>';
      cleanS = s.split(' ').join('_');
      cleanS = cleanS.toLowerCase();

      $.each(fdate, function (l, r) {
       
          cleanH = r.split('-').join('');
         layout += '<div class="menu-meals '+cleanS+cleanH+'" id="'+cleanS+cleanH+'" data-cat="'+s+'" data-sched='+r+'></div>';  
      });
      layout += '</div>';
    });
    
    $('#menu-initialize').html(layout);
   
    $.each(data, function (a, q) {
      var dzdate = JSON.parse("[" + q['zdate_display'] + "]")[0];

        cleanW = q['zcategory'].split(' ').join('_');
        cleanW = cleanW.toLowerCase();
        
        $.each(dzdate, function(n,m){
         
                cleanH = m.split('-').join('');
                var getClass = cleanW+cleanH;
                var newGenMeal = $('body.food-selection').find('.menu-meals.'+getClass);
                
                $(newGenMeal).attr('id','dr'+ q['zid']);
                $(newGenMeal).attr('data-id','dr'+ q['zid']);
                $(newGenMeal).html('<span class="mytooltip tooltip-effect-3">' + 
                '<span class="tooltip-item" style="max-height:45px; overflow: hidden; display: block;">' + q['ztitle'] + 
                '</span> <span class="tooltip-content clearfix">' + '<img src="' + base_url + "x_moikzz_assets/images/gallery/pasta.jpg" + '">' + '<span class="tooltip-text">' + q['zcontent'] + 
                '</span> </span>' + '</span>' + '<div class="checkbox">' + '<input id="drop-' + a + n + '" data-meal="meal-' + a + n + '" class="add-menu" value="' + q['zprice'] + '" type="checkbox">' + 
                '<label class="text-info price-unit" for="drop-' +a + n + '">' + q['zprice'] + '</label> <label>(AED)</label>');          
        });      
      });
     
    if (app.dv > 500 || wsize > 500) {
      $('.menu-category').css('width', '12.1%');
      $('.menu-calendar').css('width', '12.1%');
      $('.menu-meals').css('width', '12.1%');
    } else {
      $('.menu-category').css('width', '25%');
      $('.menu-calendar').css('width', '25%');
      $('.menu-meals').css('width', '25%');
    }

    app.inCart(ev);
    app.checkDBorderedMeals();

    return false;
  },

  checkDBorderedMeals: function checkDBorderedMeals(){
        var urlParams = app.paramQuery;
        var myParam = urlParams('o');
        var myParamID = urlParams('id');
        
        if (!myParam || !myParamID) {
          return false;
        }

        
        var cheakingMeals = app.studentmealOrdered + '?'+app.keyApi + '&s=' + myParamID;
        var idAPI = app.orderStatuses(cheakingMeals);
        
        idAPI.always(function(i,s){
          if(i.length == 0){ return false; }
              if(s == 'success'){
                  $.each(i, function(o,q){ 
                    var getID = q.zproductID; 
                    var backSched = q.zdate_order;
                    var fronSched = $('#dr'+getID).data('sched');                    
                    if(backSched == fronSched){
                      $('#dr'+getID).css({'background':'rgba(7, 10, 43, 0.8)','color':'#fff','disabled':'disabled'}); 
                      $('#dr'+getID).find('input').remove();
                    }
                  
                  }); 
              } 
        });
      return false;
  },
  
  formatDate: function formatDate(mobile) {
    var d = new Date(),
    day = d.setDate(d.getDate() + mobile);
    return day;
  },

  myStopFunction: function(interval){
    
    clearInterval(interval);
  },

  removeCartAfterHour: function removeCartAfterHour() {
    app.wz++;
    var l = localStorage; 
    
    if (app.wz == 1) {
      
      var interval = setInterval(function () {
        var ccntr = $(".counter-clear").text();
        myCart.fetchData();
         
        if(ccntr == '00:00'){ 
          app.wz = 0;
          app.clearCart(); 
          $(".counter-clear").text('00:01'); 
        }
        if(ccntr == '00:01'){ 
          app.wz = 0;
        }
      }, 1000);
    } 

    var myCart = {
      lifespan: 1 * 3600 * 1000,

      /* 1 hour */
      def: $.Deferred(function (def) {
        if (l && l.getItem('gcart') && l.getItem('gcart') != '[]') {
          def.resolve(JSON.parse(l.getItem('gcart')));
        } else {
          def.resolve([]);
        }
      }).promise(),
      fetchData: function() {
        var endDate = l.getItem('gcartS');
        endDate = new Date(endDate);
        var now = $.now();
        var t = endDate - now; 
        if (t >= 0 && l.getItem('gcart') && l.getItem('gcart') != '[]') {
          var mins = Math.floor(t % (1000 * 60 * 60) / (1000 * 60));
          var secs = Math.floor(t % (1000 * 60) / 1000);
          var minZ = ("0" + mins).slice(-2);

          if (minZ < 20) {
            var sp = '<span class="text-danger font-weight-bold">';
          } else {
            var sp = '<span class="text-default font-weight-bold">';
          }

          var sp2 = '</span>';
          document.getElementById('counter-clear').innerHTML = sp + ("0" + mins).slice(-2) + ":" + ("0" + secs).slice(-2) + sp2;
        } else {
       
          var ccntr = document.querySelector(".counter-clear");
          var cartBody = document.querySelector(".cart-body");
          var mCount = document.querySelector(".meal-count");
          var tPrice = document.querySelector(".total-price");
          var btnP = document.querySelector(".btn-purchase");
          $(ccntr).html("00:01"), $(cartBody).html(""), $(mCount).html("0"), $(tPrice).html("0.00"), $(btnP).attr({
            "disabled": "disabled",
            "type": "button"
          }), $(btnP).removeClass('confirm-purchase').addClass('btn-danger');
        
          app.myStopFunction(interval);
        }  

        return this.def;
      }
    };
    return false;
  },
  
  studentInfo: function studentInfo(){
        var urlParams = app.paramQuery;
        var myParam = urlParams('o');
        var myParamID = urlParams('id');
        var sc = null;
        var xsection = '', active = '', xgrade = '', xdiv = '',pub ='',can=''; 
        
        var activeSchool = app.schoolApi + '?'+app.keyApi+'&x=sc'; 

        var scAPI = app.orderStatuses(activeSchool);
        
        if(scAPI){

          scAPI.always(function(ii,ss){
                if(ii.length == 0){ return false; }

                if(ss == 'success'){

                  if (myParam || myParamID) {
                        var studID = app.studentApi  + '?'+app.keyApi+ '&s=' + myParamID;
                        var idAPI = app.orderStatuses(studID);
                        
                          idAPI.always(function(i,s){
                            if(i.length == 0){ return false; }
                              if(s == 'success'){
                                  var status = i['data'][0][1];
                                  var fullname = i['data'][0][2];
                                  var first = fullname.replace(/ .*/,'');
                                  var last = fullname.split(" ").splice(-1);
                                  
                                  $('.cv_fname').val(first);
                                  $('.cv_lname').val(last);
                                  $('.cv_schoolID').val(i['data'][0][6]);
                                  sc = i['data'][0][8];
                                  xsection = i['data'][0][12];
                                  xgrade = i['data'][0][11];
                                  xdiv = i['data'][0][13];
                                  
                                  if(status === 'Published'){
                                      pub = 'selected';
                                  }else{
                                      can = 'selected';
                                  }

                                  /****
                                   * 
                                   * Add status
                                   * 
                                  ****/
                                 
                                  var studentStatusText = '<option value="9" '+ pub +'>Published</option>'+
                                                          '<option value="7" '+ can +'>Cancelled</option>';
                                   
                                  $(studentStatusText).appendTo('.cv_status');
                              } 

                              setTimeout(function(){  
                                app.allOrgs('gr','.cv_grade',sc,xgrade); /* grade */
                              }, 500);

                              setTimeout(function(){  
                                app.allOrgs('sec','.cv_section',sc,xsection); /* section */
                              }, 1000);
                              
                              setTimeout(function(){  
                                app.allOrgs('div','.cv_division',sc,xdiv); /* division */
                              }, 1500); 

                              $.each(ii, function(iz,o){
                                if(o['ID'] == sc){
                                    active = 'selected';
                                    var country = o['country'];
                                    var state = o['address']; 
                                }else{
                                    active = '';
                                    var country = '';
                                    var state = ''; 
                                }

                               
                                $('.cv_school').append('<option value="'+o['ID']+'" '+active+'>'+o['title']+'</option>');
                                if(country){
                                  $('.cv_country').append('<option value="'+country+'" '+active+'>'+country+'</option>');
                                }
                                if(state){
                                  $('.cv_state').append('<option value="'+state+'" '+active+'>'+state+'</option>');
                                }
                                
                              });
                        });                                     
                        
                  }else{

                    $.each(ii, function(iz,o){ 

                      $('.cv_school').append('<option value="'+o['ID']+'" '+active+'>'+o['title']+'</option>'); 
                      
                    });

                  }
                  
                  app.changeShool();
                }
          });  
      }

      var controller = app.studentNups + '?'+app.keyApi;
      app.formSubmittion('body.students','#form-update', controller, 'students');

      return false;
  },

  formSubmittion: function(bodyClass, formID, controller, page, customData){
    var namepage = $('body').data('namepage');
    var txt = '';
    if(customData){
      var typez = namepage;
      var data = customData;
      app.ajax_load_info(txt, namepage, data, controller, false, false, typez);
      
      return false;
    }

    $(bodyClass).on('submit', formID, function (event) {
      event.preventDefault();
      event.stopImmediatePropagation();
      var typez = false;   
      if(!namepage || !controller) { return false;}
      

      var target = $(this);
      var data = $(this).serialize();
      if(namepage == 'orders'){ 
         data = app.formOrders(target);   
        txt = 'Continue to Order...';
        typez = 'cart';
      }else if(namepage == 'addnew' || namepage == 'updating'){ 
        if(page == 'students'){
            data = app.formStudentInfo(target); 
        }  
        typez = page;
      }else if(namepage == 'profile' || namepage == 'lists-settings' ){  
        typez = 'profile';
      }else{
        txt = 'Updating System'; 
      }
      
      app.ajax_load_info(txt, namepage, data, controller, false, false, typez);
      
      return false;
    });
  },

  formStudentInfo: function(form){
      var infos = {};
        
      var fname = $(form).find('input[name="cv_fname"]').val();
      var lname = $(form).find('input[name="cv_lname"]').val();
      var sc = $(form).find('select[name="cv_school"]').val();
      var scID = $(form).find('input[name="cv_schoolID"]').val();
      var cnty = $(form).find('select[name="cv_country"]').val();
      var sec = $(form).find('select[name="cv_section"]').val();
      var st = $(form).find('select[name="cv_state"]').val();
      var gr = $(form).find('select[name="cv_grade"]').val();
      var dv = $(form).find('select[name="cv_division"]').val();
      var status = $(form).find('select[name="cv_status"]').val();
      var userID = $(form).find('input[name="cv_userID"]').val();

      if(!status){status = 'new';} 

      infos['fname'] = fname;
      infos['lname'] =  lname;
      infos['school'] =  parseInt(sc);
      infos['schoolID'] = scID;
      infos['country'] =  cnty;
      infos['state']   = Number.isNaN(parseInt(st)) ? 0 : st;
      infos['grade']  =  Number.isNaN(parseInt(gr)) ? 0 : gr;
      infos['section']  =  Number.isNaN(parseInt(sec)) ? 0 : sec;
      infos['division'] =Number.isNaN(parseInt(dv)) ? 0 : dv;
      infos['status'] =  status;
      infos['userID'] =  userID;
      
      return infos;
  },

  formOrders: function(form){ 
    var sum = 0;
    var mealOrder = {};
    mealOrder['student'] = {};
    mealOrder['mealID'] = {};
    mealOrder['mealPrice'] = {};
    mealOrder['totalPrice'] = {};
    mealOrder['compliments'] = {};
    mealOrder['prSched'] = {};

    var studentID = $(form).find('input[name="children"]').val();
    var selectedMeal = $(form).find('input[name="meals[]"]');
    var mealPrice = $(form).find('input[name="mealsprice[]"]');
    var comps = $(form).find('input[name="comps[]"]');
    var schedz = $(form).find('input[name="prodSched[]"]');
    
    mealOrder['student'] = studentID;

    $.each(selectedMeal, function(i,o){ 
      mealOrder['mealID'][i] = $(o).val(); 
    });

    $.each(comps, function(i,o){  
      mealOrder['compliments'][i] = $(o).val(); 
    });

    $.each(schedz, function(i,o){  
      mealOrder['prSched'][i] = $(o).val(); 
    });

    $.each(mealPrice, function(i,o){ 
      mealOrder['mealPrice'][i] = $(o).val();
      sum += parseFloat($(o).val());
    });

    mealOrder['totalPrice'] = sum;
    return mealOrder;
  },

  changeShool: function changeShool(){
     $('body.students').on('change','#validationSchool', function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
        var id = $(this).val();
        
        setTimeout(function(){  
          app.singleSchoolInfo(id,null,true);
          app.allOrgs('gr','.cv_grade',id,null,true); /* grade */
        }, 500); 

        setTimeout(function(){  
          app.allOrgs('sec','.cv_section',id,null,true); /* section */
        }, 1000);

        setTimeout(function(){  
          app.allOrgs('div','.cv_division',id,null,true); /* division */
        }, 1500);
        
      
     });
     return false;
  },

  singleSchoolInfo: function singleSchoolInfo(sc){
        var infos = app.schoolApi + '?'+app.keyApi+'&x=sc&s='+sc;

        var info = app.orderStatuses(infos);

        info.always(function(ii,s){
          if(ii.length == 0){ return false; }
          $.each(ii, function(iz,o){  
              if(o['ID'] == sc){
                    var active = 'selected';
                    var country = o['country'];
                    var state = o['address']; 
              }else{
                  var active = '';
                  var country = '';
                  var state = ''; 
              }
              $('.cv_country').html('<option value="'+country+'" '+active+'>'+country+'</option>');
              $('.cv_state').html('<option value="'+state+'" '+active+'>'+state+'</option>');
          }); 
        });
        return false;
  },

  allOrgs: function allOrgs(type,aClass, sc, studGrade=null, upd=null){
    if(sc){
        var aOrgs = app.schoolApi + '?'+app.keyApi+'&x='+type+'&g='+sc;

        if(upd) $(aClass).html('<option> - Select - </option>');

        var sOrgs = app.orderStatuses(aOrgs);

        sOrgs.always(function(ii,s){
          $.each(ii, function(iz,o){ 
           
            var title = o['title'];
            var ID = o['ID'];
            
            if(ID == studGrade){
              var active = 'selected';
            }else{
              var active = '';
            }

             $(aClass).append('<option value="'+ID+'" '+active+'>'+title+'</option>');
             
          }); 
        });
    }
    return false;
  }, 

  systemInfo: function(){ 

    var typez = app.userTypesApi + '?'+app.keyApi; 
    
    var info = app.orderStatuses(typez);

    info.always(function(ii,s){
      if(ii.length == 0){ return false; }
      $.each(ii, function(iz,o){
        
            if(iz == 0){
              var active = 'active';
            }else{
              var active = '';
            }
            
            
            var ctitle = o['ztitle'];
                title = ctitle.charAt(0).toUpperCase()+ctitle.slice(1);
                title = title.replace("_", " ");
            var titleID = o['ztitle'].toLowerCase();
            var zid = o['zid'];

            $('.nav-tabs').append('<li class="nav-item"> <a class="nav-link '+active+'" data-zid="'+zid+'" data-toggle="tab" data-id="'+titleID+'" href="#'+titleID+'" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">'+title+'</span></a> </li>');
            
            if(active){
                var items = o['zvalue']['pages'];
                var items2 = o['zvalue']['options'];
                $.each(items, function(i,o){ 
                  $("input[name='"+o+"']").prop('checked',true);
                });

                $.each(items2, function(i,o){ 
                  $("input[name='"+o+"']").prop('checked',true);
                });
            }
      });

      $('.sys-settings .nav-tabs').on('click','.nav-link', function(e){
          e.preventDefault();
          $("input").prop('checked',false);
          
          var id = $(this).data('id');
          var cid = $(this).data('zid');
          
          app.moduleOtherTabs(cid);
          var tabContent = $(this).parents('.card-body').find('.tab-pane');
          $(tabContent).children('#input-admin').val(cid);
          $(tabContent).attr('id',id);
          $(tabContent).attr('data-zid',cid);
      });

      /* Submit System Module */
      var controller = app.sysModuleApi + '?'+app.keyApi; 
      app.formSubmittion('body.sys-settings','#form-update', controller);
    });
  },

  moduleOtherTabs: function(cid){
    var typez = app.userTypesApi + '?'+app.keyApi+'&s='+cid; 

    var info = app.orderStatuses(typez);

    info.always(function(ii,s){
      if(ii.length == 0){ return false; }
      $.each(ii, function(iz,o){
        
            if(iz == 0){
              var active = 'active';
            }else{
              var active = '';
            }

            if(active){
                var items = o['zvalue']['pages'];
                var items2 = o['zvalue']['options'];
                
                $.each(items, function(i,o){ 
                  $("input[name='"+o+"']").prop('checked',true);
                });

                $.each(items2, function(i,o){ 
                  $("input[name='"+o+"']").prop('checked',true);
                });
            }
      }); 
    });
  },

  userInfoUpdate: function(param=null,pf=null){

        var profile = app.profileApi + '?'+app.keyApi+'&tz=214&s='+param;

        if(pf){
          var profile = app.profileApi + '?'+app.keyApi+'&tz=214&p=1';
        }
        var prof = app.orderStatuses(profile);

       
        prof.always(function(i,s){
            if(i.length == 0){ return false; }
            if(!s) { location.reload();}
           
            var fullname = i[0]['zfirstname'] + ' '+i[0]['zlastname'];
            $('input#inputFirst').val(fullname.toUpperCase());
            $('input#inputPhone').val(i[0]['zphone_num']);

          

            $('input#inputWeb').val(i[0]['zwebsite']);
            $('input#inputCompany').val(i[0]['zcompany'].toUpperCase());
            
            $('#old_inputFirst').val(fullname.toUpperCase());
            $('#old_profemail').val(i[0]['zemail']);
            $('#old_inputPhone').val(i[0]['zphone_num']);
            $('#old_inputWeb').val(i[0]['zwebsite']);
            /* $('#old_inputpostal').val(i[0]['zpostal_code']); */
            $('#old_inputState').val(i[0]['zstate']);
            $('#old_inputAddress').val(i[0]['zaddress']);
            
            $('input#old_inputCompany').val(i[0]['zcompany'].toUpperCase());
            $('#old_user_types').val(i[0]['ztypeID']);
            $('#old_user_access').val(i[0]['zcustomer_type']);
            $('#old_user_status').val(i[0]['zstatusID']);
            $('#old_customer_types').val(i[0]['zcustomer_typeID']);
            $('label#customer_types').html(i[0]['zcustomer_type']);
            $('label#user_status').html(i[0]['zstatus']);
            $('#old_inputCountry').val(i[0]['zcountry']);
            
            $('#profUser').text(i[0]['zusername']);  
            
            $('label#inputFirst').text(fullname.toUpperCase());
            $('label#inputPhone').text(i[0]['zphone_num']);
            $('label#inputWeb').text(i[0]['zwebsite']);
            $('label#inputCompany').text(i[0]['zcompany'].toUpperCase());
            $('label#profemail').text(i[0]['zemail']);
            $('label#inputAddress').text(i[0]['zaddress']);
            $('label#inputState').text(i[0]['zstate']);
            $('label#inputCountry').text(i[0]['zcountry']); 
            $('label#inputLicense').text(i[0]['zlicense_num']);
            $('label#inputvat').text(i[0]['zvat_num']);

            $('input#inputLicense').val(i[0]['zlicense_num']);
            $('input#inputvat').val(i[0]['zvat_num']);
            $('input#old_inputLicense').val(i[0]['zlicense_num']);
            $('input#old_inputvat').val(i[0]['zvat_num']); 
           
            var country = $('select#inputCountry').children();
            var zstate = $('select#inputState').children();

            var user_types = $('#user_types').children();
            var customer_types = $('#customer_types').children();
            var user_status = $('#user_status').children();

            $.each(customer_types, function(c,v){ 
                if($(v).val() == i[0]['zcustomer_typeID']){
                  $(v).attr('selected','selected'); 
                }
            });

            $.each(country, function(c,v){ 
              if($(v).val() == i[0]['zcountry']){
                 $(v).attr('selected','selected'); 
              }
           });

            $.each(zstate, function(c,v){ 
               if($(v).val() == i[0]['zstate']){
                  $(v).attr('selected','selected'); 
               }
            });

            $.each(user_types, function(c,v){  
              if($(v).val() == i[0]['ztypeID']){
                $(v).attr('selected','selected'); 
              }
           });

           $.each(user_status, function(c,v){
              if($(v).val() == i[0]['zstatusID']){
                $(v).attr('selected','selected');
              }
          });
            
           /*  $('#inputpostal').val(pcode); */
            $('#inputAddress').val(i[0]['zaddress']);    
            $('#profemail').val(i[0]['zemail']); 
            $('#inputCardHolder').val(i[0]['zfirstname'] + ' ' +i[0]['zlastname']);

        });
  },

  userInformation: function(){
    var urlParams = app.paramQuery;
    var myParam = urlParams('id');
    
    if(myParam){ app.userInfoUpdate(myParam); }  

    $('body.users').on('click', 'a.generate-pass', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation(); 
        vs = app.generatePass(12);  
        $('#inputPass').val(vs); 
    });

    var ts = 0;
    $('body.users').on('click', '.reveal-pass', function (e) {
      ts++;

      if (ts == 1) {
        $('#inputPass').attr('type', 'text');
      } else {
        ts = 0;
        $('#inputPass').attr('type', 'password');
      }
    });

    var controller = app.sysUserApi + '?'+app.keyApi;
    
   var namespace = $('body').data('namespace');
    app.formSubmittion('body','#form-users', controller, namespace);
  },
  
  systemSettings: function(){
   
    var settings = app.systemApi + '?'+app.keyApi;
     
    var system = app.orderStatuses(settings);
   
    system.always(function(i,s){
        if(i.length == 0){ return false; }
        if(!s) { location.reload(); }
        $.each(i, function(q,t){
              if(t['zsystem_option'] == 'site_title'){
                $('input[name="sys_site_title"]').val(t['zsystem_value']);  /* site title */
              }else if(t['zsystem_option'] == 'site_content'){
                $('input[name="sys_site_description"]').val(t['zsystem_value']); /* site description */
              }else if(t['zsystem_option'] == 'admin_email'){
                $('input[name="sys_site_email"]').val(t['zsystem_value']); /* site admin email */
              }else if(t['zsystem_option'] == 'users_can_register'){ 
                  var txt = 'No';
                if(t['zsystem_value'] == 1){  txt = 'Yes'; } 
                $('select[name="sys_site_register"]').prepend('<option value="'+t['zsystem_value']+'" selected> '+txt+' </option>'); /* site registration */ 
              }else if(t['zsystem_option'] == 'site_language_default'){
                $('input[name="sys_site_language"]').val(t['zsystem_value']); /* site default language */
              }else if(t['zsystem_option'] == 'site_logo'){
                if(t['zsystem_value']){
                  $('div.logo').html('<img src="'+t['zsystem_value']+'" class="img-thumbnail">'); /* site logo */
                }
              }else if(t['zsystem_option'] == 'site_icon'){
                if(t['zsystem_value']){
                  $('div.icon').html('<img src="'+t['zsystem_value']+'" class="img-thumbnail">'); /* site icon */
                }
              }else if(t['zsystem_option'] == 'site_meta_title'){
                $('input[name="sys_site_meta_title"]').val(t['zsystem_value']); /* site global meta title */
              }else if(t['zsystem_option'] == 'site_meta_desc'){
                $('textarea[name="sys_site_meta_description"]').val(t['zsystem_value']); /* site global meta description */
              }else if(t['zsystem_option'] == 'site_meta_keywords'){
                $('input[name="sys_site_meta_keyword"]').val(t['zsystem_value']); /* site global meta keywords */
              }else if(t['zsystem_option'] == 'site_analytics'){
                $('textarea[name="sys_site_script"]').val(t['zsystem_value']); /* site custom scripts */
              }else if(t['zsystem_option'] == 'n_pricing'){
                $('input[name="sys_normal_pricing"]').val(t['zsystem_value']); /* Normal Price */
              }else if(t['zsystem_option'] == 'a_pricing'){
                $('input[name="sys_advance_pricing"]').val(t['zsystem_value']); /* Advance Price */
              }else if(t['zsystem_option'] == 'p_pricing'){
                $('input[name="sys_premium_pricing"]').val(t['zsystem_value']); /* Premium Price */
              }else if(t['zsystem_option'] == 'social_fb'){
                $('input[name="sys_social_fb"]').val(t['zsystem_value']); /* Social Facebook */
              }else if(t['zsystem_option'] == 'social_twitter'){
                $('input[name="sys_social_twitter"]').val(t['zsystem_value']); /* Social Twitter */
              }else if(t['zsystem_option'] == 'social_insta'){
                $('input[name="sys_social_instagram"]').val(t['zsystem_value']); /* Social Instagram */
              }else if(t['zsystem_option'] == 'social_linkedin'){
                $('input[name="sys_social_linkedin"]').val(t['zsystem_value']); /* Social linkedIn */
              }
        });
    });

    var controller = app.adminSettingsApi + '?'+app.keyApi; 
    var namespace = $('body').data('namespace');
    app.formSubmittion('body.lists-settings','#form-setttings', controller, namespace);
  },
 
  trucksInfo: function(){
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

    var urlParams = app.paramQuery;
    var myParam = urlParams('id');

    if(myParam){
          app.trucksUpdateInfo(myParam); 
    } 

    var controller = app.sysFleetApi + '?'+app.keyApi;
    
    var namespace = $('body').data('namespace');
   
    app.formSubmittion('body.trucks','#form-trucks', controller, namespace);
  },

  trucksUpdateInfo: function(myParam){
      var trucks = app.productApi + '?'+app.keyApi+'&p=9&f='+myParam;      
      
      var info = app.orderStatuses(trucks); 
      info.always(function(i,s){
          if(i.length == 0){ return false; }
          if(!s) { location.reload();}
          $.each(i, function(q,t){
             
            if(t['zpublic'] == 1){
               var chkpub = true;
             }else{
               var chkpub = false;
             }
            
             $('input[name="input_public"]').prop('checked', chkpub);
             $('select[name="input_truck"]').prepend('<option value="'+t['zcategoryID']+'" selected> '+t['zcategory']+' </option>'); /* site global meta title */
             $('select[name="input_origin_place"]').prepend('<option value="'+t['ztravel_from']+'" selected> '+t['ztravel_from']+' </option>'); /* site global meta title */
             $('select[name="input_destination_place"]').prepend('<option value="'+t['ztravel_to']+'" selected> '+t['ztravel_to']+' </option>'); /* site global meta title */
             $('input[name="input_origin_date"]').val(t['zdate_from']); /* site global meta title */
             $('input[name="input_destination_date"]').val(t['zdate_to']); /* site global meta title */
             $('input[name="input_loads"]').val(t['zloads']); /* site global meta title */
             $('input[name="price_normal"]').val(t['zprice']); /* site global meta title */
             $('input[name="price_advance"]').val(t['zsaleprice']); /* site global meta title */
             $('input[name="price_prem"]').val(t['zpremprice']); /* site global meta title */
             $('textarea[name="fleet_notes"]').val(t['znotes']); /* site global meta title */
             $('select[name="truck_status"]').prepend('<option value="'+t['zstatusID']+'" selected> '+t['zstatus']+' </option>'); /* site global meta title */
         
          });
      });
  },
  inquiryInfos: function(){
    var urlParams = app.paramQuery;
    var myParam = urlParams('id');
    if(!myParam){ return false; }

          var orders = app.displayOrdersApi + '?'+app.keyApi+'&z='+myParam+'&x='+logged_id;
          var orderInfo = app.orderStatuses(orders);

          orderInfo.always(function(i,s){
            if(i.length == 0){ return false; }
            if(s){
              
             $('button.status-active').html(i[0].zstatus.replace(/<[^>]*>?/gm, ''));
               
              if(i[0].zurgent.toLowerCase() == 'yes'){
                $('span#urgent').addClass('text-danger');
              }
              $('span#urgent').html(i[0].zurgent);

               $('label.label-notes').html(i[0].znotes);
               $('input.inq-company').val(i[0].zcompany);
               $('input.inq-customer').val(i[0].zauthor);
               $('input.inq-email').val(i[0].zemail);
               $('input.inq-phone').val(i[0].zphone_num);
               $('input.inq-truck').val(i[0].zcategory);
               $('input.inq-loads').val(i[0].zloads);
               $('input.inq-from').val(i[0].ztravel_from + ' ' + i[0].zdate_from);
               $('input.inq-to').val(i[0].ztravel_to + ' ' + i[0].zdate_to); 
            } 
       
          });
      
      var controller = app.inquiryApi + '?'+app.keyApi;

      var namespace = $('body').data('namespace'); 
      
      $('body.inquiries').on('click','.change-status', function(e){
        e.preventDefault();
      
        var statusID = $(this).data('val');
        var orderID = $(this).parent().data('vid');
        
        var datas = { 'order_id' : orderID, 'status_id' : statusID };
        app.formSubmittion('body.inquiries','#form-inquire', controller, namespace, datas);
      });
  },

  postMainInfo: function(){ 
    
    var urlParams = app.paramQuery;
    var myParam = urlParams('id');

    if(myParam){
        app.postUpdateInfos(myParam); 
    }else{
        CKEDITOR.replace( 'cmsEditor',{
          customConfig: base_url+'ckeditor/ckconfig.js',
          height: 400
        });
    } 
    app.postUpload();

    var controller = app.postsApi + '?'+app.keyApi;

    var namespace = $('body').data('namespace');

    app.formSubmittion('body','#form-pages', controller, namespace);
    
    return;
  },

  postUpload: function postUpload(){
    $('body').on('submit','form#form-upload', function(e){
      e.preventDefault();
     
      $.ajax({
          type: "POST",
          url: base_url + "api/sys/ifile_upload?k=2zSM*(sOGkVs193201971Jq)Sk0*^%skdjDs3051Fz4AKz821Pq7053atK",
          dataType: "json",
          data: new FormData(this),
          cache: !1,
          processData: !1,
          contentType: !1,
          success: function(e) { 
            if(e.success){
              swal("Success!", e.message, "success"); 
              document.getElementById("form-upload").reset();
              
              $.get(CKEDITOR.config.simpleImageBrowserURL, function(e) {
                  var t;
                  return t=$.parseJSON(e), e="", $.each(t, function(t, i) {
                      e="thumbnails"===CKEDITOR.config.simpleImageBrowserListType?e+"<div onclick=\"CKEDITOR.tools.simpleimagebrowserinsertpicture('"+i.url+"');\" style=\"position:relative;width:75px;height:75px;margin-top:5px;margin-bottom:25px;margin-left:5px;margin-right:5px;background-image:url('"+i.url+"');background-repeat:no-repeat;background-size:125%;background-position:center center;float:left;\"><div style='bottom:-18px;position:absolute;width:inherit;overflow:hidden;'>"+i.title+"</div></div>": "link"
                  }), $("#imageBrowser").html(e)
              });
            }else{
              swal("Error!", e.message, "error");
            }
         
          }
      });
    });

   
  },

  postUpdateInfos: function(myParam){
    var dataInfo = app.pagesApi + '?'+app.keyApi+'&z='+myParam;
    var postPage = app.orderStatuses(dataInfo);

    postPage.always(function(i,s){
      if(i.length == 0){ return false; }
      if(s){ 
         
        $('input[name="input_title"]').val(i[0].ztitle);
        $('input[name="input_slug"]').val(i[0].zslug);
        $('textarea[name="cmsEditor"]').text(i[0].zcontent); 

        /* General SEO settings */
        $('input[name="input_meta_title"]').val(i[0].zvalue['general'].title);
        $('textarea[name="input_meta_description"]').text(i[0].zvalue['general'].description);
        $('textarea[name="input_meta_description"]').val(i[0].zvalue['general'].description);
        $('input[name="input_meta_keywords"]').val(i[0].zvalue['general'].keywords);

        /* FB - Social Media */
        $('input[name="social_fb_title"]').val(i[0].zvalue['facebook'].title);
        $('textarea[name="social_fb_description"]').text(i[0].zvalue['facebook'].description);
        $('textarea[name="social_fb_description"]').val(i[0].zvalue['facebook'].description);
        $('input[name="social_fb_image"]').val(i[0].zvalue['facebook'].image);

         /* Twitter - Social Media */
        $('input[name="social_twitter_title"]').val(i[0].zvalue['twitter'].title);
        $('textarea[name="social_twitter_description"]').text(i[0].zvalue['twitter'].description);
        $('textarea[name="social_twitter_description"]').val(i[0].zvalue['twitter'].description);
        $('input[name="social_twitter_image"]').val(i[0].zvalue['twitter'].image);
      }   
     
          CKEDITOR.replace( 'cmsEditor',{
            customConfig: base_url+'ckeditor/ckconfig.js',
            height: 400
          });  
       
      }); 
  },

  buildItem : function(item){ 
    
    var html = "<li class='dd-item' data-id='" + item.id + "' data-title='"+item.title+"' id='" + item.id + "'>"; 
    html += "<div class='dd-handle'>" + item.title + "</div>";
    html += "<i class='mdi mdi-close float-right cms-nav-remove' style='position:absolute;right:10px;top:10px;cursor:pointer;'></i>";

    if (item.children) {

        html += "<ol class='dd-list'>";
        $.each(item.children, function (index, sub) {
            html += app.buildItem(sub);
        });
        html += "</ol>"; 
    } 
    html += "</li>"; 
    return html;
  },

  displayCurrentMenu: function displayCurrentMenu(ids){
    var menus = app.systemApi + '?'+app.keyApi+'&m='+ids;
  
    var menuInfo = app.orderStatuses(menus);
    
     /* Display Page at left side menu*/
     menuInfo.always(function(i,s){
      $('#nestable #cmsSelectedNav').html(''); 
      if(i.length == 0){  return false; }
      if(s){  
          var zvalue = JSON.parse(i[0].zsystem_value);

          $.each(zvalue, function (index, item) { 
              $('#nestable #cmsSelectedNav').append(app.buildItem(item));   
          });

          $('#nestable').nestable(); 
      }
    });

       // Save Navigation to DB
       $('body.menu').on('submit','#form-menu',function(e){
        e.preventDefault();
          var t = $('.dd').nestable('serialize');
           var menuID = $('select[name="menu_selection"]').val();
  
          var controller = app.updateMenus + '?'+app.keyApi;
  
          var namespace = $('body').data('namespace');
  
          var data = {'menu_sel' : JSON.stringify(t), 'menuid' : menuID };
          console.log(data);
          app.formSubmittion('body','#form-pages', controller, namespace, data);
      });
  },

  menuInfos: function menuInfos(ids){
    var pages = app.pagesApi + '?'+app.keyApi+'&t=page'; 
    var posts = app.pagesApi + '?'+app.keyApi+'&t=posts';

    var pagesInfo = app.orderStatuses(pages);

    var postsInfo = app.orderStatuses(posts);

    /* Display Page at left side menu*/
    pagesInfo.always(function(i,s){
        if(i.length == 0){ return false; }
        if(s){ 
          var parent = $('#pageCollapse ul');
          $.each(i.data, function(o,q){
            $(parent).append('<li data-id="'+q[0]+'" class="cms-nav-select" data-navtitle="'+q[1]+'" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>'+q[1]+'</small></li>');
          });
        }
    });

    /* Display Posts at left side menu */
    postsInfo.always(function(i,s){
      if(i.length == 0){ return false; }
      if(s){ 
        var parent = $('#postCollapse ul'); 
        $.each(i.data, function(o,q){ 
          $(parent).append('<li  data-id="'+q[0]+'" class="cms-nav-select" data-navtitle="'+q[1]+'" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>'+q[1]+'</small></li>');
        });
      }
    });

    $('body.menu').on('change','#inlineFormCustomSelect', function(e){
      e.preventDefault(); 
      app.displayCurrentMenu($(this).val()); 
    });

    app.displayCurrentMenu(ids); 
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

  /* Display Inquiry Status Counts */
  orderInquiryStatus: function  orderInquiryStatus(dataInfo, dh){
    dataInfo.always(function(i,s){
      if(i.length == 0){ return false; }
      if(s){ 
        var received = 0;
        var responded = 0;
        var pending = 0;
        var completed = 0;
        var net = 0;
         $.each(i.data, function(z,k){ 

          if(dh){
              if(k[7] == 23 || k[7] == 24 || k[7] == 25){
                responded++;
              }else if(k[7] == 22){
                pending++;
              }else if(k[7] == 26){
                completed++;
              } 
          }else{
              if(k[11] == 23 || k[11] == 24 || k[11] == 25){
                responded++;
              }else if(k[11] == 22){
                pending++;
              }else if(k[11] == 26){
                completed++;
              }
          } 
           
           received++;
         });
         
         net = (parseInt(completed) / parseInt(received) ) * 100; 
         net = parseInt(net);
         net = net.toFixed(2);
          
         $('body h2#received span').html(received);
         $('body h2#responded span').html(responded);
         $('body h2#pending span').html(pending);
         $('body h2#completed span').html(net+'%');
      }
    });
  },
  
  init: function init() {
      console.log(jsCustom);
      /* Table Lists */
      if (jsCustom == 1) app.dataTableConnection();
      /* Profile */

      if (jsCustom == 2) app.resetPass();
      /* Card Payment */

      if (jsCustom == 3) app.cardPayment();

      /* Cart Menu Selection */
      if (jsCustom == 4) app.menuCreation(); 
      
      if (jsCustom == 5) app.studentInfo();

      /* Users */
      if (jsCustom == 6) app.userInformation();

      /* System Module */
      if (jsCustom == 7) app.systemSettings();

      if (jsCustom == 8) app.trucksInfo();
      
      /* System Module */
      if (jsCustom == 9) app.systemInfo();

      if (jsCustom == 10) app.inquiryInfos();

      if (jsCustom == 11) app.postMainInfo();

      if (jsCustom == 12) app.menuInfos(15);
 
  }
};
$(document).ready(function ($) { 
  try {
    setTimeout(function(){  app.init(); }, 300);  
  }
  catch(err) {
    alert('Error!');
    location.reload();
  }
});
