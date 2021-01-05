<?php require_once("../function/db.php");
if(isset($_POST['userid']))
 {
     if(isset($_POST['dateFrom']) && isset($_POST['dateTo']))
     {
        if($_POST['dateFrom']!=0 && $_POST['dateTo']==0)
        {
            $print=1;
            $date='"'.$_POST['dateFrom'].'"';
       
            ordersDateForUser('select order_id,date,amount from order_info where user_fk='.$_POST['userid'].' and date > '.$date.' order by date desc ');
            
        }  
        if($_POST['dateFrom']==0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $date='"'.$_POST['dateTo'].'"';
           
            ordersDateForUser('select order_id,date,amount from order_info where user_fk='.$_POST['userid'].' and date < '.$date.' order by date desc ');
           
        }  
        if($_POST['dateFrom']!=0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $dateFrom='"'.$_POST['dateFrom'].'"';
            $dateto='"'.$_POST['dateTo'].'"';
            
            ordersDateForUser('select order_id,date,amount from order_info where user_fk='.$_POST['userid'].' and date between '.$dateFrom.' and '.$dateto.' order by date desc ');
            
        }  
        
     }
     
 }
 function ordersDateForUser($query)
{ global $db;
    // $res=$user -> executeQuery($query);
    // $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    $stmt=$db->prepare($query);
    $result=$stmt->execute();
     $numrows=$stmt->rowCount();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); 
    if( $numrows!=0)
    {
        $lastOrderDate=array_values($rows[0])[0];
        echo "
        <table class='table table-dark table-bordered myTable' > 
        <thead>
              <tr  > 
                  <th>Order Date</th>
                  <th>Amount</th>
                  <th>Show Product</th>
                </tr>
              </thead>";
        for($i=0;$i<count($rows);$i++)
        {
            echo '<tr id="rowdata" value='.$rows[$i]['order_id'].' class= orderrow'.'>
            <td>'.$rows[$i]['date'].'</td>'.'<td>'.$rows[$i]['amount'].'</td>';
            echo "<td>" .'<button class="show btn-info"  id='.$rows[$i]['order_id'].'  >Show</button>'. "</td>";


        }
        echo '</tr>';
        echo " </table>";

        
    }
  


    // echo $numrows;
    // echo $query;
    // var_dump ($rows);
}