<?php
require_once "../inc/connection.php";
require_once "../App.php";
if ($request->CheckGet('id') && $request->CheckGet('name')) 
{
$id = $request->get('id');
$name= $request->get('name');
if ($name == "doing") {
    $stm = $conn->prepare("UPDATE todo set status='doing' where id=:id ");
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $output=$stm->execute();
    if ($output) {
        $session ->set("success",'doing');
        $request -> header('../index.php');
    }else {
        $session ->set("error",["Errors"]);
        $request -> header('../index.php');
    }
}else if($name == "done") {
    $stm = $conn->prepare("UPDATE todo set status='done' where id=:id ");
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $output=$stm->execute();
    if ($output) {
        $session ->set("success",'done');
        $request -> header('../index.php');
    }else {
        $session ->set("error",["Errors"]);
        $request -> header('../index.php');
    }
}
}