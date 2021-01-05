
<?php 
//require_once("../../config.php"); 


require_once('../function/validation.php');
require_once('../function/db.php');

?>

<?php

        $error='';
        $success="";
		if(isset($_POST['submit']))
		{
            // var_dump($_POST['submit']);
            
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$confpassword=$_POST['confpassword'];
			$room=$_POST['room'];
            $ext=$_POST['ext'];

            $type=$_POST['type'];
            // $type="";

			$uploadfile=$_FILES['img'];
			$filename=$uploadfile['name'];
			$filesize=$uploadfile['size'];
			$filetmpname=$uploadfile['tmp_name'];
			$fileinfo=explode('.',$filename);  //array[filename , fileextention]
			$extention=end($fileinfo); //last index in file info array 
			
			$img_dir='user_img/'.$filename;

			if(checkEmpty($name)&&checkEmpty($email)&&checkEmpty($password)&&checkEmpty($confpassword)&&checkEmpty($room)&&checkEmpty($ext)&&checkEmpty($uploadfile)&&checkEmpty($type)){

				if(validEmail($email))
				{
					if($password==$confpassword)
					{
						if(validImage($extention)){
							// var_dump($uploadfile);
							// echo "valid image".'<br>';
							// echo $filename.'<br>';
							// echo $filesize.'<br>';
							// echo $filetmpname.'<br>';
							// echo $fileinfo.'<br>';
							// echo $extention.'<br>';
							// echo $img_dir;
							// move_uploaded_file($filetmpname,$filename);

							// $passwordnew=password_hash($password,PASSWORD_DEFAULT);
							$passwordnew=$password;
							$confpasswordnew=password_hash($confpassword,PASSWORD_DEFAULT);

							$arr=['user_name'=>$name,'email'=>$email,'password'=>$passwordnew,'ext'=>$ext,'room_num'=>$room,'img_name'=>$filename,'img_dir'=>$img_dir,'type'=>$type];

							$insert=$newconnection->insert('user_info',$arr);
							if ($insert){
								$success= "Added Succsseful";

							}else{
								$error="Faild To Add Email Already Exist";

							}

						}
						else{
							$error="Image Not Valid";

						}
						
						

					}
					else{
						$error="not matching password";

					}
					

					
					
				}else{
					$error="please type correct email";
				}

			}
			else{
				$error="please fill all fildes";
            }
           

			
			

		}
?>




















<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="logo"><a href="#"><img src="img/logo.png"></a></div>
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

<div class="row mt-5">
    <div class="col-sm-12">
        <h1 class="gallery_taital">All Orders</h1>
    </div>
</div> -->


<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Add User</h2>

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name..." name="name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email..." name="email">
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 " type="password" placeholder="Password..." name="password">
                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 " type="password" placeholder="Confirm Password ..." name="confpassword">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 " type="number" placeholder="Room ..." name="room" min="1">
                                    
                                </div>
                                
                            </div>
                            <div class="col-2">
                                    <div class="input-group">
                                        <input class="input--style-2 " type="number" placeholder="Ext ..." name="ext" min="1">
                                        
                                    </div>
                                
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="type">
                                            <!-- <option disabled="disabled" selected="selected">type</option> -->
                                            <option>user</option>
                                            <option >admin</option>
                                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    
                                    <input class="input--style-2" type="file" value="image"  name="img">
                                   
                                </div>
                            </div>
                        </div>

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" name="submit" type="submit">Add</button>
                            <span class="text-danger ml-5" style="color: red; font-size: 16px;"><?php echo $error; ?></span>
                            <span class="text-danger ml-5" style="color: green; font-size: 16px;"><?php echo $success; ?></span>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="footer_section layout_padding">
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
</div> -->

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->