<?php
// require_once ('../config/config.php'); 

// session_start();

// if(isset($_GET['search'])){
//     $db->where("name", '%'. $_GET['search'] .'%' , "like");
//     $products = $db->get("proudacts");
//     var_dump($products);

  
// }else{
// $products = $db->get("proudacts");

// }

// require_once ('../config/config.php'); 
// session_start();

// if (isset($_GET['search'])) {
//     $search = trim($_GET['search']);
//     $db->where("name", '%' . $search . '%', 'LIKE');
//     $products = $db->get("proudacts");

//     if ($products) {
//         foreach ($products as $product) {
//             echo "<div class='item'>" . htmlspecialchars($product['name']) . "</div>";
//         }
//     } else {
//         echo "<div class='item'>محصولی یافت نشد.</div>";
//     }

// } else {
//     echo "<div class='item'>لطفاً جستجو را آغاز کنید.</div>";
// }



require_once ('../config/config.php'); 
session_start();

if (isset($_POST['search'])) {
    $search = trim($_POST['search']);
    $db->where("name", '%' . $search . '%', 'LIKE');
    $products = $db->get("proudacts");

    if ($products) {
        foreach ($products as $product) {
            echo "<div class='item'>" . htmlspecialchars($product['name']) . "</div>";
        }
    } else {
        echo "<div class='item'>محصولی یافت نشد.</div>";
    }

} else {
    echo "<div class='item'>لطفاً جستجو را آغاز کنید.</div>";
}
