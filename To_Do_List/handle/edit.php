<?php
require_once '../inc/connection.php';
require_once '../App.php';
if ($request->checkPost('submit')){
$id = $request->get('id');
$title = $request ->clean($request->post('title'));
echo $id;
echo $title;
$validation ->validate("title",$title,["Required","Str"]);
$errors=$validation->getError();
if (empty($errors)) {
    $stm = $conn->prepare("UPDATE todo set title=:title where id=:id");
    $stm ->bindParam(':id',$id,PDO::PARAM_INT);
    $stm -> bindParam(':title',$title,PDO::PARAM_STR);
    $output=$stm->execute();
    if($output){
        $session ->set("success",'Data updated successfuly');
        $request -> header('../index.php');
    }
}else {
    $session ->set("error",$errors);
    $request -> header('../index.php');
}
}else{
    $session ->set("error",["Error can't find id"]);
    $request -> header('../index.php');
}