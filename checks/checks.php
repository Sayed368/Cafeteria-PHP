<?php require_once("../function/db.php");  

// require_once(BLA."inc/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/bootstrap.min.css" >
     <link rel="stylesheet" href="../css/style1.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">

    <title>checks</title>
    <script src="../js/jquery.js">
    </script>
   
   
</head>
<!-- <body style="background-image: url('https://secure.static.tumblr.com/c69c1abeb6981723f568c6b2884d62d5/antrfuo/cs3n6zp96/tumblr_static_coffee-beans-string.jpg');background-repeat:no-repeat;background-size:1800px;"> -->
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
               <div class="logo"><a href="#"><img src="../images/logo.png"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ml-auto">
                     <li class="nav-item "> 
                        <a class="nav-link" href="../Ahmedtarek/Admin/index.php">Home</a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="../AllProducts/all_product.php">Products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../AllUsers/all_user.php">Users</a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="../addProduct/allCategory.php">Categories</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link " href="../sayed/view_order.php">orders</a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="checks.php">checks</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link btn-danger" href="#">admin</a>
                     </li>
               </ul>
               </div>
            </nav>

<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Checks </h2>
                    </div>
                    <form action="" method="post" >
                    
                    <div class="container mt-3">
                    <form>
                    <div class="row">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                        </div>
                        <input type="date" class="form-control" id='dateFrom' style="border:2px solid #d33a11; ">
                        <input type="date" class="form-control" id='dateTo' style="border:2px solid #d33a11; ">
                    </div>  
                    </div>
                    </form>
                    </div>
                    
                    <?php 
                    $sqlD="SELECT `user_id`,`user_name` FROM user_info order by `user_name`"; 
                    ?>
                    <div class="row">
                     <div class="form-group col-md-6">
                     
                     <label for="inputState">List</label>
                      <?php  echo 
                      "<select id='select' class='form-control' style='border:2px solid #d33a11;'>User Name</option>"; 
                     foreach ($db->query($sqlD) as $row){
                           echo "<option value=".$row['user_id']." >".$row['user_name']."</option>"; 
                               }
                           echo "</select>";
                           
                      ?>
                
                      </div>
                </div>
                   

                  </form>
                  <button class="edit_btn" id="search"  name="search" >Search</button>
<br>  
                    <?php
                    
                     $selQry=
                     "SELECT `user_id`,`user_name`, SUM(amount) as total_amount
                     from user_info
                     join order_info on user_id = user_fk
                     group by user_id,user_name";
                                
                     $stmt=$db->prepare($selQry);
                     $res=$stmt->execute();
                   $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   
                        echo "<table class='table table-dark table-bordered' > 
                              <thead>
                                    <tr> 
                                        <th> User Name</th>
                                        <th>Total Amount</th>
                                      </tr>
                                    </thead>";
                        foreach($rows as $row) {

                            echo "<tr>
                                <td>" . $row["user_name"] . "</td>" .
                                "<td>" . $row["total_amount"] . "</td>". 

                              "</tr>";

                        }
                        echo "</table>";

                    ?>
                 </div>
            </div>  

             <div id="order">
             </div>
             <div id="product">
             </div>
      
        </div>
    </div>
    <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <h3 class="useful_text">About</h3>
                  <p class="footer_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h3 class="useful_text">Menu</h3>
                  <div class="footer_menu">
                     <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h1 class="useful_text">Useful Link</h1>
                  <p class="dummy_text">Adipiscing Elit, sed do Eiusmod Tempor incididunt </p>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h1 class="useful_text">Contact Us</h1>
                  <div class="location_text">
                     <ul>
                        <li>
                           <a href="#">
                           <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_10">Address : Loram Ipusm</span>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                           <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">Call : +01 1234567890</span>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                           <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_10">Email : demo@gmail.com</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
</body>
<script>
    var datefrom=0;
    var dateto=0;
    $('#dateFrom').blur(function(e){
    if(e.target.value)
    {
        datefrom=e.target.value;
    } 
    else{
        datefrom=0;
    } 
 });
$('#dateTo').blur(function(e){
    if(e.target.value)
    {
        dateto=e.target.value;
    }
    else
    {
        dateto=0;
    }
    
});
    var orderList=document.getElementById('search');
    orderList.addEventListener('click',search);
    function search(){
    var orderList=document.getElementById('select');
    if (datefrom !=0 ||dateto!=0) {
        $.post('searchDate.php',{
            userid: orderList.value,
            dateFrom: datefrom,
            dateTo: dateto
         },
    function(data){
        // console.log(data);
        // console.log(datefrom);
        // console.log(dateto);
        // console.log(orderList.value);

         document.getElementById('order').innerHTML=data;
         $('.show').click(function(){
        // console.log($(this)[0].id); 
        $.post('selectProduct.php',{
        ID: $(this)[0].id
        },function(data){
        //   console.log(data);
         document.getElementById('product').innerHTML=data;
        }); 
      })
       function searchp(){
        var sa=document.getElementById('rowdata');
        console.log(sa.value);
        $.post('selectProduct.php',{
        ID: sa.value
        },function(data){
        //   console.log(data);
         document.getElementById('product').innerHTML=data;
        });
       }

        });
 }
else{
    var orderList=document.getElementById('select');
    // console.log(orderList.value);
    $.post('selectOrders.php',{
    IDD: orderList.value
    },
    function(data){
        document.getElementById('order').innerHTML=data;
      $('.show').click(function(){
        // console.log($(this)[0].id); 
        $.post('selectProduct.php',{
        ID: $(this)[0].id
        },function(data){
        //   console.log(data);
         document.getElementById('product').innerHTML=data;
        }); 
      })
       function searchp(){
        var sa=document.getElementById('rowdata');
        console.log(sa.value);
        $.post('selectProduct.php',{
        ID: sa.value
        },function(data){
        //   console.log(data);
         document.getElementById('product').innerHTML=data;
        });
       }

        });
}
    }

    

</script>
   

</html>
