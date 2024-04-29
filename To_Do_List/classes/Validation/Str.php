<?php
namespace classess\validation;
require_once 'validator.php';
use classess\validation\validator;

class Str implements Validator{
    public function check($key , $value){
        if (is_numeric($value)) {
            return "$key must be string";
        }else {
            return false ;
        }
    }
}