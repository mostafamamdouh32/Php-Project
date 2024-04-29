<?php
require_once '../inc/conn.php';
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    //POST
    $title = trim(htmlspecialchars($_POST['title']));
    $desc = trim(htmlspecialchars($_POST['descc']));
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $image = $_FILES['image'];
        $image_name =$image['name'];
        $temp_name =$image['tmp_name'];
        $ext=strtolower(pathinfo($image_name,PATHINFO_EXTENSION)); # TO GET EXTENSION FROM FILE .PNG OR .JPG
        $size = $image['size'] / (1024*1024);
        $newName=uniqid()."">$ext;
    }else{
        $newName='error';
    }
    $query="insert into posts values (null,'$title','$desc','$newName')";
    $result = mysqli_query($con , $query);
    if ($result) {
        if (isset($_FILES['image']) && $_FILES['image']['name']) {
        move_uploaded_file($temp_name,"../upload/$newName"); 
        }
        echo json_encode("successfly");
        http_response_code(201); 
       }else {
        echo json_encode("error data");
        http_response_code(301); 
           }
}else{
    echo json_encode("method not allowed");
    http_response_code(403);
}