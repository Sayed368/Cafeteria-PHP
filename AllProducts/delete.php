<?php require_once("../function/db.php"); 


// require_once(BLA."inc/header.php");
// require_once(BL.'function/validation.php');

?> 


<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){

    $sql = "DELETE FROM product WHERE product_id = :id";

    if($stmt = $db->prepare($sql)){

        $stmt->bindParam(":id", $param_id);
        $param_id = trim($_POST["id"]);

        if($stmt->execute()){
             header("location: all_product.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    unset($stmt);
    unset($db);
} else{

    if(empty(trim($_GET["id"]))){

        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="all_product.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html> 