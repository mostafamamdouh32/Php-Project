<?php
namespace classess\validation;
require_once 'validator.php';
use classess\validation\validator;
class Required implements Validator{
    public function check($key , $value){
if (empty($value)){
    return "this $key is required";
}else{
    return false ;
}
    }
}