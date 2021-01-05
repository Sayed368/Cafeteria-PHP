<?php
session_start();
// $con = mysqli_connect('localhost', 'root','root', 'cafeteria1');
$con = mysqli_connect('localhost', 'root','', 'cafeteria');
if (!$con) {
	"Connection failed: " . mysqli_connect_error();
    die();
}
//to perform any Query, just give it a sql statement as an argument.
function query($sql){
	global $con;
	$res = mysqli_query($con, $sql);
	if (mysqli_error($con)) {
		echo 'Error with :' .$sql.' : '.mysqli_error($con);
	}
	return $res ? $res : null;
}
//to fetch any selected data, just give it a sql statement as an argument.
function fetch($sql){
	$res = query($sql);
	if ($res) {
		if (mysqli_num_rows($res) > 0) {
			$data=[];
			while ($x = mysqli_fetch_assoc($res)) {
			    $data[]=$x;
			}
			return $data;
		}
	}
	return null;
}
function db_tables(){
	$d=fetch('SHOW TABLES');$t=[];
	foreach ($d as $v){foreach ($v as $x){$t[]=$x;}}
	return $t;
}
//to find one record in a table, just give it a table and ID.
function find($table,$id){
	if ($id && is_int($id) && $id > 0) {
		return fetch("SELECT * FROM $table WHERE id=$id LIMIT 1");
	}
	return null;
}
//to find all data of a table, just give it the table name.
function all($table){
	return $table && is_string($table) ? fetch("SELECT * FROM $table") : null;
}
/*
* to INSERT data in any table.
* first argument  : the table name u wanna insert into.
* second argument : an assoc array with column name as a key and it's value.
*/
function create($table,$data){
	global $con;

	$sql  = 'INSERT INTO '.$table.' (';
	$sql .= implode(',', array_keys($data));
	$sql .= ") VALUES('";
	$sql .= implode("','", array_values($data));
	$sql .= "');";

	$res = query($sql);
	return $res ? mysqli_insert_id($con) : null;
}
//create user and handle authentication stuff
function create_user($data){
	$id=create('users',$data);
	if ($id) {
		$_SESSION['user_id']=$id;
		return true;
	}
	return false;
}
//checks if email and password is exist.
function check_user($email,$pass){
	$sql="SELECT * FROM users WHERE email='$email' AND password='$pass' LIMIT 1";
	$res=query($sql);
	if ($res && mysqli_num_rows($res) > 0){
		$res=mysqli_fetch_assoc($res);
		$_SESSION['user_id']=$res['id'];
	}
	return $res;
}
//checks if the user is authenticated or not.
function auth(){
	if(isset($_SESSION['user_id'])){
		$sql="SELECT * FROM users WHERE id={$_SESSION['user_id']} LIMIT 1";
		$res=query($sql);
		if ($res && mysqli_num_rows($res) > 0) {
			return mysqli_fetch_assoc($res);
		}
	}
	return null;
}
function logout(){
	session_destroy();
}
//redirect
function redirect($path,$errros=[]){
	if($errros){$_SESSION['errors']=$errros;}
	header('location: '.$path);
}

//print_r(find('users',1));
//print_r(all('users'));
//print_r(all('comments'));
//print_r(exists('ahmed@gmail.com','12365'));
//print_r(auth());
//create('users',['first'=>'ahmed','last'=>'last','email'=>'tarek@gmail.com','password'=>123456]);

//mysqli_close($con);
?>