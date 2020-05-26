$(document).ready(function(){
    $(".addtocart").click(function(){
        var addid=$(this).attr('id');
                    $(".addtocart").click(function() {
                        $(this).parent().parent().find(".product_overlay").css({
                          'transform': ' translateY(0px)',
                          'opacity': '1',
                          'transition': 'all ease-in-out .45s'
                        }).delay(1500).queue(function() {
                          $(this).css({
                            'transform': 'translateY(-500px)',
                            'opacity': '0',
                            'transition': 'all ease-in-out .45s'
                          }).dequeue();
                        });
                      });
                      
                    $('html, body').animate({
                        scrollTop: $("#"+addid+"").offset().top
                    }, 1);
                    
                    
                });
            });
