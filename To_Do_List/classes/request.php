<?php
namespace classess\Req;
class Request {
    public function get($key){
        return (isset($_GET[$key])) ? $_GET[$key] : null ;
    }
    public function post($key){
        return (isset($_POST[$key])) ? $_POST[$key] : null ;
    }
    public function checkPost($key){
        return isset($_POST[$key]) ;
    }
    public function CheckGet($key){
        return isset($_GET[$key]) ;
    }
    public function clean($key){
        return trim(htmlspecialchars($key)) ;
    }
    public function checkMethod(){
        return $_SERVER['REQUEST_METHOD '];
    }
    public function header($file){
        return header("location:$file");
    }
}