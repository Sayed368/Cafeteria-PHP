<?php require_once("../function/db.php"); 
// include database connection file



?> 

<?php  
require_once("../function/db.php");

if(isset($_POST['submit']))
{

    $name=$_POST['name'];

	
    
	// insert product data 
	 $array=['cat_name'=>$name];
    $insert=$newconnection->insert('categories',$array);
  
    //header("Location: all_product.php");
      
      
 
}
// var_dump($_POST)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add category</title>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    

    <link href="css/style.css" rel="stylesheet" media="all">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
               <div class="logo"><a href="#"><img src="images/02fa130c-8e65-4e3d-a729-e34703a6ca27.jpg"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active"> 
                        <a class="nav-link" href="#">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">My orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">checks</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">admin</a>
                     </li>
                  </ul>
               </div>
            </nav>
<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="images/Caramel-Brulee-Coffee-3_285x480.jpg" alt="">
				</div>
				<form method="POST" action="addcategories.php" enctype="multipart/form-data">
					<h3>Add category</h3>
					<div class="form-row">
						<input type="text" class="form-control" placeholder="category Name" name="name">
					
						
					</div>
				
					<div class="form-row">
					
					
					<input class="edit_btn" type="submit" name="submit" value="add " />
					
				
				</form>
				
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
		<script src="js/jquery-3.3.1.min.js"></script>
		
	</body>
</html>
