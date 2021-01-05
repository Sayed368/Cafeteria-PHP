
<?php require_once("../function/db.php"); 

// require_once(BLA."inc/header.php");
?>
 <div class="row">
   
<?php
if($_POST['ID'])
 {

   

    $sql="select oi.order_id,p.product_id,p.name,p.price,p.img_name
    from order_info oi,order_product op,product p
    where oi.order_id=op.order_fk 
    and p.product_id=op.product_fk
    and oi.order_id=".$_POST['ID'];
    $stmt=$db->prepare($sql);
    $result=$stmt->execute();
    $numrows=$stmt->rowCount();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {

?>
 <div style="float:left;padding:20px;">
 <!-- <img  style="width:70px;height:70px;" src=".'../../assets/images/'.$row['img_dir']."> -->
 <img alt='profile pic' src= "../addProduct/images/<?php echo $row['img_name'] ?>" height=100 width=100 style="border-radius:50%"/>
 <br>
 <p><?php echo $row["name"]."<br>" ?></P>
 <p><?php echo $row["price"]."&nbspEGP"."<br>" ?></P>
</div>
<?php
}
}
?>