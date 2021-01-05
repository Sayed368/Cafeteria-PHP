
<?php 

session_start();
require_once('../function/validation.php');
require_once('../function/db.php');

// if(isset($_SESSION['user_name']))
// {
  
//     header("Location:index.php");
// } 

?>



<?php
        $error='';
        $success="";
        if(isset($_POST['submit']))
        {
            $email=$_POST['email'];
            $password=$_POST['password'];
            if(checkEmpty($email)&&checkEmpty($password))
            {
                if(validEmail($email))
                {
                        $select=$newconnection->selectRow('user_info','email',$email);
                        // var_dump($select); 
                        $user_email='';
                        $user_name='';
                        $user_password='';
                        $user_id;
                        $user_img_dir='';

                        foreach($select as $row) {
                            $user_password.=$row['password'];
                            $user_email=$row['email'];
                            $user_name=$row['user_name'];
                            $user_id=$row['user_id'];
                            $user_img=$row['img_name'];
                            $user_type=$row['type'];
                        }  
                        
                       
                        // $check_password=password_verify($password,$user_password);
                        //&&$user_type=='admin'
                        if($user_password==$password)
                        {
                            $_SESSION['user_name']=$user_name;
                            $_SESSION['user_email']=$user_email;
                            $_SESSION['user_id']=$user_id;
                            $_SESSION['user_img']=$user_img;

                            if($user_type=="admin")
                            {

                                header('Location: ../Ahmedtarek/Admin/index.php');
                                $success="helllo admin";

                            }
                            else{
                               
                                header('Location: ../Ahmedtarek/User/index.php');
                                $success="helllo user";

                            }

                           
                            
                        }
                        else{
                            $error="Data Not Valid";
                        }

                }else{
                    $error="Email Not Valid";
                }


            }
            else{
                $error="Please Fill Input";
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
    <title></title>

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
<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login</h2>

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email..." name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="password..." name="password">
                        </div>

                        

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" name="submit" type="submit">Login</button>
                            <span class="text-danger ml-5" style="color: red; font-size: 16px;"><?php echo $error; ?></span>
                            <span class="text-danger ml-5" style="color: green; font-size: 16px;"><?php echo $success; ?></span>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

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