<?php
namespace classess\Ses;
class Session{
    public function __construct()
    {
        session_start();
    }
    //set
    public function set($key , $value){
        $_SESSION[$key] = $value ;
    }
    //get
    public function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null  ;
    }
    //remove
    public function remove($key){
       unset($_SESSION[$key]);
    }
    //destory
    public function destory(){
        session_destroy();
     }
      //check
    public function check($key){
        return isset($_SESSION[$key]);
     }
}