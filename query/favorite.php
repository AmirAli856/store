
<?php
require_once ('../config/config.php'); 
session_start();

if(isset($_POST)){
    $favorite_data =[
        "name"=>$_POST['favorite_name'],
        "describtion"=>$_POST['tech_screen'],
        "user_id"=>$_SESSION['id'],
        "product_id"=>$_SESSION['GET_product_id'],
    ];
    $db->insert("favorites" , $favorite_data);
    $_SESSION['add_favorite'] = "1"; 
    
}
?>