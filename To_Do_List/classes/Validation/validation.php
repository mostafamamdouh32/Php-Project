<?php
namespace classess\validation;
require_once 'Required.php';
require_once 'Str.php';
class validation 
{
    private $errors = [];
    public function validate($key , $value, $rules){
         foreach($rules as $rule){
            $rule = "classess\\validation\\" . $rule ;
            $object = new $rule;
            $error=$object -> check ($key , $value);
            if ($error != false) {
               $this -> errors [] = $error ;
            }
         }
    }
    public function getError(){
        return $this->errors ;
    }
}
