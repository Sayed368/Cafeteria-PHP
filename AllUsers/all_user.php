<?php require_once("../function/db.php"); 
 

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- site metas -->
      <title>All Users</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <link rel="stylesheet" type="text/css" href="../css/style1.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../css/responsive.css">
     
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="../css/owl.carousel.min.css">
      <link rel="stylesheet" href="../css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   
    </head>
   <body style="background-image: url('https://secure.static.tumblr.com/c69c1abeb6981723f568c6b2884d62d5/antrfuo/cs3n6zp96/tumblr_static_coffee-beans-string.jpg');background-repeat:no-repeat;background-size:1700px;">
     
   <!--header section start -->
      <div class="header_section" >
         <div class="container-fluid" >
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo"><a href="index.html"><img src="../images/logo.png"></a></div>
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
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Users</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../sayed/view_order.php">orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../checks/checks.php">checks</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link btn-danger" href="#">admin</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
      <!--header section end -->
      <!-- about section start -->
 
      <div class="about_section layout_padding" >
         <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <div class="page-header clearfix">
                    <br><br><br>
                        <h1 class="pull-left">All Users </h1>
                        
                        <a href="../sayed/adduser.php" class="btn btn-dark pull-right">Add New User</a>
                 
                    </div>
                    <hr>
                    <?php

                          $selQry="select `user_id`,`user_name`,`room_num`,`img_name`,`img_dir`,`ext` from user_info";
                          $stmt=$db->prepare($selQry);
                          $res=$stmt->execute();
                          #fetch the result
                        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class='table table-dark table-bordered' > 
                              <thead>
                                    <tr> 
                                       
                                        <th> Name</th>
                                      
                                        <th>Room</th>
                                        
                                        <th> Image</th>
                                        <th>Ext</th>
                                        <th colspan='2'><center> Action</center></th>
                                
                                      </tr>
                                    </thead>";
                        foreach($rows as $row) {

                            echo "<tr>
                               
                                <td>" . $row["user_name"] . "</td>" .
                                "<td>" . $row["room_num"] . "</td>". 

                                "<td>" . 


                                 "<img alt='profile pic' src= ".'../users_images/'.$row['img_dir']." style='border-radius:50%;' height=50 width=70 />"

                                ."</td>" .
                                "<td>" . $row["ext"] . "</td>". 
                                "<td>" ."<a href='update.php?id=". $row['user_id'] ."' title='Update Record' 
                                class='btn btn-dark edit_btn'>Edit</a>"."</td>".
                                "<td>" . 
                                "<a href='delete.php?id=". $row['user_id'] ."' title='Delete Record' 
                                class='btn btn-dark del_btn'>Delete</a>"
                                ."</td></tr>";
                               
                        }
                        echo "</table>";


                    ?>
            </div>
            </div>
         </div>
      </div>
    
      <div class="footer_section layout_padding margin_top90">
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
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/jqueryy.js"></script>
      
      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../js/jquery-3.0.0.min.js"></script>
      <script src="../js/plugin.js"></script>
      <!-- sidebar -->
      <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../js/custom.js"></script>     
   </body>
</html>