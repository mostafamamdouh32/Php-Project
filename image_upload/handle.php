<?php

if (isset($_POST['sumbit'])){
$image = $_FILES['file'];
$temp_name =$image['tmp_name'];
$image_name =$image['name'];
$ext=pathinfo($image_name,PATHINFO_EXTENSION); # TO GET EXTENSION FROM FILE .PNG OR .JPG
$size = $image['size'] / (1024*1024); // byte -> kb-mb
//validation (size , ext , error)
$errors=[];
$arr =["png","jpg","jpeg"];
if ($image['error'] !=0) {
    $errors[]= "image not correct";
}elseif ($size > 1) {
    $errors[]= "image large size";
}elseif (!in_array(strtolower($ext),$arr)) {
    $errors[]= "choose correct image";
}
$newName=uniqid().".".$ext; #to change name to randuom name
if (empty($errors)) {
    move_uploaded_file($temp_name,"upload/$newName"); # to upload image in file (tempName,location)
    header("location:index.php");
}else{
    print_r($errors);
}
    

}else{
    header("location:index.php");
}