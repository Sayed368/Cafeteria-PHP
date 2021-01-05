  $(document).ready(function(){

    $("#search").click(function(e){
            
          e.preventDefault();
          var from = $("#from").val() ;
          var to = $("#to").val() ;
          console.log(from);
          console.log(to);
          
          if (from == "" || to == "" ) {

            alert("Date Not Found");

          }else{
              $.ajax({
                  method :"POST" ,
                  url :"filterorders.php" ,
                  data :{"from":from,"to":to} , 
                  success : function(response){
                      $("#table").html(response)
                  }
              })
          }


    });


    $(".displayorder").click(function(e){
            
     
          $.ajax({
              method :"GET" ,
              url :"displayorderdetails.php" ,
              data : "id=" + $(this).attr("id") ,
              success : function(response){
                  $("#orderdetails").html(response)
              }
          })
     


});











}) ;