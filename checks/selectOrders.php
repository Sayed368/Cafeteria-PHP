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

    <title>orders</title>
    <script src="../js/jquery.js">
    </script>
   

</head>
<body>
 <?php 

 if($_POST['IDD'])
 {

    $sql = "select oi.order_id,oi.date,oi.amount,u.user_id
    from order_info oi,user_info u
    where oi.user_fk=u.user_id
    and u.user_id=".$_POST['IDD'];
    $stmt=$db->prepare($sql);
    $result=$stmt->execute();
    $numrows=$stmt->rowCount();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); 
         echo "
        <table class='table table-dark table-bordered myTable' > 
        <thead>
              <tr> 
                  <th>Order Date</th>
                  <th>Amount</th>
                  <th>Show Product</th>
                </tr>
              </thead>";
  foreach($rows as $row) {
      $date=$row['date'];
      $amount = $row['amount'];
      
        echo "<tr id='rowdata' value=".$row['order_id'] .">";
        // var_dump($row['order_id']);
        echo "<td>" .$date . " </td>";
        echo "<td>" . $amount  . "</td>";
         echo "<td>" .'<button class="show edit_btn"  id='.$row['order_id'].'  >Show</button>'. "</td>";     
        
    }
  echo   "</tr>";
  echo " </table>";
//   var_dump($rows);
 
 } 

if(isset($_POST['userid']))
 {
     if(isset($_POST['dateFrom']) && isset($_POST['dateTo']))
     {
        if($_POST['dateFrom']!=0 && $_POST['dateTo']==0)
        {
            $print=1;
            $date='"'.$_POST['dateFrom'].'"';
       
            ordersDateForUser('select order_id,date,price from order_info where user_id='.$_POST['userid'].' and date > '.$date.' order by date desc ');
            
        }  
        if($_POST['dateFrom']==0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $date='"'.$_POST['dateTo'].'"';
           
            ordersDateForUser('select order_id,date,price from order_info where user_id='.$_POST['userid'].' and date < '.$date.' order by date desc ');
           
        }  
        if($_POST['dateFrom']!=0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $dateFrom='"'.$_POST['dateFrom'].'"';
            $dateto='"'.$_POST['dateTo'].'"';
            
            ordersDateForUser('select order_id,date,price from order_info where user_id='.$_POST['userid'].' and date between '.$dateFrom.' and '.$dateto.' order by date desc ');
            
        }  
        
     }
     
 }


 function ordersDateForUser($query)
{
    // $res=$user -> executeQuery($query);
    // $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    $stmt=$db->prepare($sql);
    $result=$stmt->execute();
    $numrows=$stmt->rowCount();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); 
    if($result -> rowCount() !=0)
    {
        $lastOrderDate=array_values($rows[0])[0];
        for($i=0;$i<count($rows);$i++)
        {
            echo '<tr id='.$rows[$i]['order_id'].' class= orderrow'.'>
            <td>'.$rows[$i]['date'].'</td>'.'<td>'.$rows[$i]['price'].'</td>';
        }
        echo '</tr>';
        
    }
}
?>
 
 
</body>

</html>
