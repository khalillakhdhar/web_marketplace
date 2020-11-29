<?php 
include("../models/crud_user.php");
$us = new User();

if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    $type=$_GET["type"];
    $us->deleteuser($id);
if($type=='vendeur')
    header("location:..\vendeurs.php");
    else {
    header("location:..\clients.php");
    }
}

?>