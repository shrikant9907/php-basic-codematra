

jQuery('document').ready(function() {
    
    jQuery('.search_icon').click(function(){
        jQuery('.search_layer').show(); 
    });
    
    jQuery('.search_close').click(function(){
       jQuery('.search_layer').hide();   
    });
});