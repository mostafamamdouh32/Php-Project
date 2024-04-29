<?php
require_once '../inc/conn.php';
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    
    $query = "select * from employees";
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
            echo json_encode("eroor");
            http_response_code(403);
        }