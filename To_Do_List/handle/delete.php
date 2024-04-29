<?php
require_once '../App.php';
require_once '../inc/connection.php';
if ($request->CheckGet('id')) {
    $id=$request->get('id');
    $stm=$conn->prepare("delete from todo where id=:id");
    $stm->bindParam("id",$id,PDO::PARAM_INT);
    $output=$stm->execute();
    if($output){
        $session->set('success',"Deleted");
        $request->header('../index.php');
    }else {
        $session->set('errors',["Error"]);
        $request->header('../index.php');
    }
    
}else{
    $session->set('errors',["can't find id"]);
    $request->header('../index.php');
}