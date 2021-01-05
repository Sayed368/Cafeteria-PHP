<?php
function checkEmpty($value){
    if(empty($value))
    {
        return false;
    }
    else{
        return true;
    }

}

function sanitizeString($string)
{
    $string = trim($string);
    $string = filter_var($string,FILTER_SANITIZE_STRING);
    return $string;
}


function checkLess($value,$minimum)
    {
        if(strlen($value) < $minimum)
        {
            return false;
        }
        return true;
    }


function validEmail($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    
        return false;

    }
    else{
        return true;
    }
}


function validImage($ext)
{
    
    $extentions=['png','jpg','jpeg','gif','bmp'];
    

    if(in_array($ext,$extentions))
    {
        return true;
        //move_uploaded_file($filetmpname,$filename);
        
    }
    else{
        return false;
    }
    
}
?>