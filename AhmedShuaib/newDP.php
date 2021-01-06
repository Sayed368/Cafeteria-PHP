<?php
session_start();
  $count=0;
  $query="" ;
  $conn = mysqli_connect("localhost", "root", "root", "testorder");
    if(!$conn) {
       die("Connection Failed:" .mysqli_connect_error() ) ;
    }
          // SELECT status,date,amount FROM order_info WHERE user_fk = 26 AND date BETWEEN ' 2020-12-02 22:13:00' AND '2020-12-17 21:27:00' order by date
                     
         //  var_dump($_SESSION['user_id']);
      $query=mysqli_query($conn,"SELECT status,date,amount,order_id  FROM order_info where user_fk=".$_SESSION['user_id'] ) ;
      $count=mysqli_num_rows($query) ;
       
    
?>



<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="orderstyle.css" >
    
        
     <?php 
    //  echo ($count) ; 
     ?>
      <script  src="js/jqueryy.js"></script>
</head>
<body style="background-image:url('https://secure.static.tumblr.com/c69c1abeb6981723f568c6b2884d62d5/antrfuo/cs3n6zp96/tumblr_static_coffee-beans-string.jpg'); background-size: 1500px;">
   
  <!-- navbar -->
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
               <div class="logo"><a href="#"><img src="../images/logo.png"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item "> 
                        <a class="nav-link" href="../home.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../Ahmedtarek/User/index.php">Order Now</a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="newDP.php">My Orders</a>
                     </li>
                     <!-- <li class="nav-item">
                        <a class="nav-link" href="#">My orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">checks</a>
                     </li>
                     <li class="nav-item"> -->
                        <a class="nav-link btn btn-danger" href="#"><?php echo $_SESSION['user_name']; ?> </a>
                     </li>
                  </ul>
               
         
   </div>
</nav>
  
            <br><br><br><br>






<div class="container">
<form  method="post">
     <div class="row">
     <div class="col-6">
    <input type="date"  name="FromDate" id="from" class="form-control" style="border:2px solid #d33a11;" ></div>
    <div class="col-6">
    <input type="date" name="ToDate" id="to" class="form-control" style="border:2px solid #d33a11;"></div>
    </div><br>
    <div class="row justify-content-center">
     <div class=" col-6 ">
    <input type="submit" name="search" id="search" value="Search Date" class="form-control font-weight-bolder"  style="border:2px solid #d33a11; background-color:#d33a11; color:#fff; color-weight:bold"> 
    </div>
    </div>
    <br>
    <?php
      if($count == "0")
      {                                                        
        echo '<h2>notfound</h2>' ;
      }
      else{  echo "<div id='table'> <table class='table table-dark table-bordered'  > <tr><th><center>Date</center></th>
                               <th><center>View</center></th> 
                               <th><center>Status</center></th>
                               <th><center>Amount</center></th>
                               <th><center>Delete</center></th> </tr>" ;
        while($row = mysqli_fetch_array($query)){
          echo "<tr ><td class='text-center' >" .$row['date'] ." </td>
          <td><input type='button'  class='displayorder btn_delete' id=$row[order_id] value='View'></td> 
                     <td class='text-center' >" .$row['status'] ."</td>
                     <td class='text-center' >" .$row['amount'] ."</td>
                    " ;
                     if ($row['status'] == "process"){ 

                      echo "<td> <a href='delete-order.php?delete=$row[order_id]  '> <input type='button' class='btn_delete' value='Delete'> </a></td>" ;
                       
                     }else{
                       echo "<td> </td>" ;
                     }
              
          echo  "</tr>"  ;
          // var_dump ($row) ;
        } echo "</table> </div>" ;


      
    }
    ?>

    <div class="container"  id="orderdetails"></div>

</form>

 </div>

         <!-- footer -->
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
  <script src="js/MyOrder.js"></script>
  
</html>

