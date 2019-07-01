// Theme color settings
jQuery(document).ready(function($){ 
    function store(name, val) {  
        if (typeof (Storage) !== "undefined") {
          localStorage.setItem(name, val);
        } else {
          window.alert('Please use a modern browser to properly view this template!');
        }
    }

    $("*[data-theme]").click(function(e){
      e.preventDefault();
        var currentStyle = $(this).attr('data-theme');

        store('theme', currentStyle); 
        
        $('#theme').attr({href: base_url+'assets/back/css/colors/'+currentStyle+'.css'})
        console.log($('#theme').attr('href'));
    });

    var currentTheme =  localStorage.getItem('theme');
    
    if(currentTheme) {
     
      $('#theme').attr({href: base_url+'assets/back/css/colors/'+currentTheme+'.css'});
    }
    // color selector
    $('#themecolors').on('click', 'a', function(){
        $('#themecolors li a').removeClass('working');

        $(this).addClass('working')
      });

});