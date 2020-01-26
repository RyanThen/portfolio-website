$(document).ready(function(){
    

// Smooth Scroll To Anchor Tags
    $('a[href^="#"]').on('click', function(e){
        e.preventDefault();
        
        var target = this.hash;
        var $target = $(target);
        
        $('html, body').animate({
            'scrollTop': $target.offset().top
        }, 1000, 'swing');
    }); 
    
    
});  //End Document Ready