<?php

require_once("db.php");
$table = $_POST['table'];
$id = $_POST['item_id'];
$field = $_POST['field'];
$value =$_POST['value'];


$update='update '.$table.' set '.$field.'='.'"'.$value.'"'.' WHERE order_id ='.$id;
$result=$newconnection->updateRow($update);


// var_dump($result);

if($result)
{
    // $data=array('successmessage' => 'success');
    $data['successmessage'] = "success";
}
else 
{

    // $data=array('successmessage' => 'error');
    
    $data['successmessage'] = "error";
}



echo json_encode($data);



?>