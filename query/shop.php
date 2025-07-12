<?php
 require_once ('../config/config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
 var_dump($_POST);
 $data=[
    "name"=>$_POST['name'],
    "price"=>$_POST['price'],
  
 ];
 $db->insert("shop" , $data);
}