<?php
require_once '../inc/conn.php';
if ($_SERVER["REQUEST_METHOD"] == 'DELETE') {
    $uri=$_SERVER['REQUEST_URI'];
    $uri_array=explode("/",$uri);
    $id=end($uri_array);
    $query = "select * from posts where id =$id";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result)==1) {
      $post = mysqli_fetch_assoc($result);
      $imageName = $post['image'];
      unlink("../uploads/$imageName");
      $query = "delete from posts where id=$id";
      $result=mysqli_query($con,$query);
      if ($result) {
        echo json_encode("successfly");
        http_response_code(201); 
      }else {
        echo json_encode("error data");
        http_response_code(301);
      }
    }else {
        echo json_encode("Not found");
        http_response_code(403);
    }

}else {
    echo json_encode("method not allowed");
    http_response_code(403);
}