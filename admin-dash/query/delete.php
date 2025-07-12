<?php
require_once ('../../config/config.php');
session_start();

if(isset($_GET['product_id'])){
    $data=[
        "deleted_at"=>date("y-m-d")
    ];
    $db->where("id",$_GET['product_id']);
    $updated = $db->update("proudacts",$data);
    ?>
    <script>
        window.location.href="admin-products.php?person_id=<?=$_SESSION['id']?>"
    </script>

    <?php
}

if(isset($_GET['person_id'])){
    $data=[
        "deleted_at" => date("y-m-d")
    ];
    $db->where("id" , $_GET['person_id']) ; 
    $deletedUsers = $db->update("users" , $data);
    ?>
    <script>
        window.location.href="admin-users.php?person_id=<?=$_SESSION['id']?>"
    </script>
<?php
}