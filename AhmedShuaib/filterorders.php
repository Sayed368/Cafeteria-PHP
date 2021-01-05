<?php

  $conn = mysqli_connect("localhost", "root", "medohadedo", "phpdb");

  if(isset($_POST["from"],$_POST["to"])){


        $from = $_POST["from"] ;                                                       // $_COOKIE["id"]
        $to = $_POST["to"] ;
        $query=mysqli_query($conn,"SELECT status,date,amount,order_id FROM order_info WHERE user_fk = 11 AND date BETWEEN '$from' AND '$to' order by date " ) ;
      $count=mysqli_num_rows($query) ;

      echo "<table class='table table-dark table-bordered'> <tr><th><center>Date</center></th>
                               <th><center>View</center></th> 
                               <th><center>Status</center></th>
                               <th><center>Amount</center></th>
                               <th><center>Action</center></th> </tr>" ;
        while($row = mysqli_fetch_array($query)){
          echo "<tr ><td class='text-center' >" .$row['date'] ."</td>     
                     <td><input type='button'  class='displayorder btn_delete' id=$row[order_id] value='View'></td>
                     <td class='text-center' >" .$row['status'] ."</td>
                     <td class='text-center' >" .$row['amount'] ."</td>
                    " ;
                     if ($row['status'] == "processing"){ 

                      echo "<td>  <a href='delete-order.php?delete=" . $row["order_id"] ." '> <input type='button' class='btn_delete'' value='Delete'> </a></td>" ;
                       
                     }else{
                       echo "<td> </td>" ;
                     }
              
          echo  "</tr>"  ;
          // var_dump ($row) ;
        } echo "</table>" ;
      


  }
?>