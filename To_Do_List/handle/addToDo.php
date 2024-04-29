<?php
require_once '../inc/connection.php';
require_once '../App.php'; 
if ($request->checkPost('submit')){
    $title = $request ->clean($request->post('title'));
    $validation ->validate("title",$title,["Required","Str"]);
    $errors=$validation->getError();
   
    if (empty($errors)) {
        $stm = $conn->prepare ("INSERT INTO `todo` ( `title`) VALUES (:title);");
        $stm ->bindParam(':title',$title,PDO::PARAM_STR);
        $output=$stm->execute();
        if($output){
            $session ->set("success",'Data inserted successfuly');
            $request -> header('../index.php');
                   }
       
    }else {
        $session ->set("error",$errors);
        $request -> header('../index.php');
        }



}else{
    $session ->set("error",["please enter a note"]);
    $request -> header('../index.php');
}
