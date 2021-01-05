$(document).ready(function() {

    $(".slide").hover(function(){
        console.log("in");
        // $(".content").css('left','0');
        $(".slide").animate({'left':'0px'} , 1000);
        
        
        $("h3").click(function(){
            $(".list").slideUp(500);
            $(this).next().slideDown(500);
         });
        
    },function(){
        console.log("out");
        // $(".content").css('left','-20%');
        $(".slide").animate({'left':'-20%'} , 1000); 
        // $(".list").hide();
    
    
    
    })

    // $("tr").click(function(){

    
    //     $(".view-details").fadeIn(500);
        
        
    // });
    
    // $(".view-details").click(function(){

    
    //     $(".view-details").fadeOut(500);
        
        
    // })



    $(".order-title").next().hide()

    $(".order-title").click(function(event) {
        event.preventDefault();
        var $target = $(event.target);
        $(this).next().slideToggle();
                        
    });


    $(".card").click(function(){

    
        $(".view-details").fadeIn(500);
        
        
    });

    
    
    $(".view-details").click(function(){

    
        $(".view-details").fadeOut(500);
        
        
    })




    // $("table tr td").find("div").hide();
    // $("table").click(function(event) {
    //     event.stopPropagation();
    //     var $target = $(event.target);
    //     $target.closest("tr").next().find("div").slideToggle();
                        
    // });
})

