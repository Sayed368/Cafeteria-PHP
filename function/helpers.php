<?php

require 'db2.php';

function is_post(){return strtolower($_SERVER['REQUEST_METHOD'])==='post'?true:false;}
function is_get() {return strtolower($_SERVER['REQUEST_METHOD'])==='get'?true:false;}

function validator_errors($r){
	$errors=[];
	$req=is_get()?$_GET:$_POST;
	foreach ($r as $k=>$v) {
		$sub=explode('|',$v);
		$err=[]; //errors of one key
		//makes sure that all strings are lowercase.
		$sub=array_map(function($value){return strtolower($value);},$sub);
		foreach ($sub as $x) {
			if ($x=='required' && empty($req[$k])){$err[]=$k.' field is required.';}
			if (!empty($req[$k])) {
				if ($x=='string' && !is_string($req[$k]) && !preg_match("/^[a-zA-Z ]*$/",$req[$k])){$err[]=$k.' field must be a string.';}
				if ($x=='int' && !is_numeric($req[$k])){$err[]=$k.' field must be an integer.';}
				if ($x=='array' && !is_array($req[$k])){$err[]=$k.' field must be an array.';}
				if ($x=='email' && !filter_var($req[$k],FILTER_VALIDATE_EMAIL)){$err[]=$k.' field must be a valid email.';}
				if ($x=='confirm' && !isset($req[$k.'_confirmation'])){$err[]=$k.' field must be confirmed.';}
				if ($x=='confirm' && !empty($req[$k.'_confirmation']) && $req[$k] != $req[$k.'_confirmation']){$err[]=$k." field confirmation doesn't match.";}
				if (substr($x,0,3)=='max'){
					$type=gettype($req[$k]);
					$l=substr($x,4);
					$e=$type=='array'?(count($req[$k])>$l?true:false):($type=='string'?(strlen($req[$k])>$l?true:false):($req[$k]>$l?true:false));
					$e?$err[]=$k.' field must not bigger than '.$l.'.':'';
				}
				if (substr($x,0,3)=='min'){
					$type=gettype($req[$k]);
					$l=substr($x,4);
					$e=$type=='array'?(count($req[$k])<$l?true:false):($type=='string'?(strlen($req[$k])<$l?true:false):($req[$k]<$l?true:false));
					$e?$err[]=$k.' field must not smaller than '.$l.'.':'';
				}
				$ex=substr($x,0,6)=='exists';
				if (substr($x,0,6)=='unique' || $ex){
					$msg=$ex?$req[$k]." doesn't match our records.":$req[$k].' has been taken.';
					$l=explode(',',substr($x,7));$t=db_tables();
					if(!in_array($l[0],$t)){throw new Exception($l[0]." table is not exist in the database.");}
					if(empty($l[1])){throw new Exception(" you have to specify the column you wanna search in.");}
					$f=fetch("SELECT {$l[1]} FROM {$l[0]} WHERE $l[1]='{$req[$k]}' LIMIT 1");
					$e=$f?($ex?false:true):($ex?true:false);
					$e?$err[]=$msg:'';
				}
			}
		}
		foreach ($err as $i){$errors[]=$i;}
	}
	return $errors;
}
function request(){
	global $con;$data=[];
	$req=is_get()?$_GET:$_POST;
	foreach ($req as $k=>$v){
	    $x=trim(strip_tags($req[$k]));                //Remove any preceding/leading whitespace
	    $x=htmlspecialchars($x);                      //Convert any HTML characters to their entity value
		$data[$k]=mysqli_real_escape_string($con,$x); //Escape any SQL special characters
	}
	return $data;
}

//required : this makes sure that field is sent from user.
//string   : this makes sure that field is string.
//email    : this makes sure that field is email.
//confirm  : this makes sure that field is confirmed.
//int      : this makes sure that field is int.
//min:size : this makes sure that field's length has a minimum value of size.
//max:size : this makes sure that field's length has a maximum value of size.
//unique:table,column : this makes sure that field is unique inside a column table.
//exists:table,column : this checks that field is exist inside a column table.
//you can use both min and max with ( strings, array, int )
//if you wanna confirm any field, just make it ( confirm ) and send filed_confirmation with your data.

$rules=[
	'first_name'=>'required|string|min:3|max:50',
	'last_name' =>'required|string|min:3|max:50',
	'password'  =>'required|string|min:4|max:40|confirm',
	'email'     =>'required|string|email|min:5|max:100|unique:users,email',
];
//checks if your data is valid or not.
//print_r(validator_errors($rules));
//you can use this function to retrieve both $_GET, $_POST data.
//print_r(request());