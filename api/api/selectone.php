<?php
require_once '../inc/conn.php';
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $uri=$_SERVER['REQUEST_URI'];
    $uri_array=explode("/",$uri);
    $id=end($uri_array);
    $query = "select * from employees where employee_id=$id";
    $result=mysqli_query($con,$query);
    if (mysqli_num_rows($result)>0) {
         $customer=json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
         echo"<pre>";
         print_r($customer);
        }else{
                echo json_encode("customer not found");
                http_response_code(404);
            }
        }else{
            echo json_encode("method not allowed");
            http_response_code(403);
        }