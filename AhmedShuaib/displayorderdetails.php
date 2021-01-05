<?php
             $totalprice=0 ; 
       
        //    $conn = mysqli_connect("localhost", "root", "medohadedo", "phpdb");

        $conn = mysqli_connect("localhost", "root", "root", "testorder");
           if(isset($_GET["id"])){

            $order_id= $_GET["id"] ;

            $query=mysqli_query($conn,"Select name,price,img_name,count from product,order_product where order_fk = $order_id and product_fk = product_id ") ;
             

  echo "<div class='row justify-content-center'>";

    while($row = mysqli_fetch_array($query)){
            $totalprice +=$row['price']*$row['count'] ;
        echo 
        "<div class='col-4 col-sm-4 col-md-3  align-items-end' >
              
            <div class='card  text-center' style='width: 70%; height: 100%'>
            
            <img class='card-img-top'  height='50%' src='../addProduct/images/".$row['img_name']."' alt='Card image cap'>
            <br>
            <div class='card-body'>
                <h3><span class='badge badge-pill badge-light'>".$row['name']."</span></h3>
                <h5 class='label'><span>".$row['price']." EGP</span></h5>
                 <h4><span class='badge badge-pill badge-light'>Total:".$row['price']*$row['count']." EGP</span></h4>
            </div>
            </div>
            
        </div> ";

        
    } 
   
    echo "</div>";
    echo "<br>" ;
   

           }

?>