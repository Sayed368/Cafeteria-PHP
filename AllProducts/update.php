<?php require_once("../function/db.php"); 

?> 

<?php 


// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['product_id'];
    $name=$_POST['name'];
	$price=$_POST['price'];

   // $img=$_FILES['img_name']['name'];
   $uploadfile=$_FILES['img'];
   $filename=$uploadfile['name'];
   $filetmpname=$uploadfile['tmp_name'];
   $img_dir='../addProduct/images/'.$filename;

	// update user data
	$sql = "UPDATE `product` SET `name`='$name',`price`='$price',`img_name`='$filename',`img_dir`='$img_dir'   WHERE `product_id`=".$id;
    $result = $db->query($sql);
    move_uploaded_file($filetmpname,$img_dir);
	// Redirect to homepage to display updated user in list
	header("Location: all_product.php");
}


?>
<?php
// Display selected user data based on id
// Getting id from url
$product_id = $_GET['id'];
    $sql = "SELECT `name`,`price` FROM `product` WHERE `product_id`=".$product_id;
    $stmt=$db->prepare($sql);
    $result=$stmt->execute();
    // var_dump($result);
    $numrows=$stmt->rowCount();

    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); #stmt fetch
      // var_dump($rows);
        $name=$rows[0]['name'];
        $price = $rows[0]['price'];
        //$img = $rows[0]['img_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
     
      
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
     
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   
    </head>
    <body style="background-image: url('https://secure.static.tumblr.com/c69c1abeb6981723f568c6b2884d62d5/antrfuo/cs3n6zp96/tumblr_static_coffee-beans-string.jpg');background-repeat:no-repeat;background-size:1800px;">
      <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
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
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../AllUsers/all_user.php">Users</a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="../addProduct/allCategory.php">Categories</a>
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
      
<div class="about_section layout_padding">
    
<div class="col-sm-6 offset-sm-3 border p-3" >
        <h2 class="text-center p-3 bg-light text-dark"><b>Update Product</b></h2>
        <form  method="post" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value=<?php echo $_GET['id'];?> class="form-control" >
            <div class="form-group">
                <label class="text-dark" ><b>Name</b> </label>
                <input type="text" name="name" value=<?php echo $name;?> class="form-control" >

            </div>

			<div class="form-group">
                <label class="text-dark" ><b>price</b> </label>
                <input type="text" name="price" value=<?php echo $price;?> class="form-control" >
            </div>
            <div class="form-group">
                <label class="text-dark"  ><b>Image</b> </label>
                <input type="file" name="img" class="form-control" >
            </div>


            <input class="edit_btn" type="submit" name="update" value="Update">
        </form>
        </div> 
    
      </div>
      <!-- about section end -->
      <!-- footer section start -->
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

