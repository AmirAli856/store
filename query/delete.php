<?php
require_once ('../config/config.php');
session_start();
if(isset($_GET['id'])){
    $datas=[
        'deleted_at' => date("y-m-d")
    ];
    // delete method
    // $db->where('id', $_GET['id']);
    // if($db->delete('users')) echo 'successfully deleted';
    //update
    $db->where ('id', $_GET['id']);
    if($db->update ('shop', $datas)){
        echo $db->count . ' records were updated' ;
    ?>
<script>window.location.href='../cart.php?person_id=<?=$_SESSION['id']?>'</script>

    <?php
    }else{ 
        echo 'update failed: ' . $db->getLastError();
}
}

if(isset($_GET['comment_id'])){
    $datas=[
        'deleted_at' => date("y-m-d")
    ];
    
    $db->where ('id', $_GET['comment_id']);
    if($db->update ('comments', $datas)){
        echo $db->count . ' records were updated' ;
        ?>
    <script>window.location.href='../user-dash/user-dash.php?person_id=<?=$_SESSION['id']?>'</script>

<?php
}
}

if(isset($_GET['favorite_id'])){
    $datas=[
        'deleted_at' => date("y-m-d")
    ];
    
    $db->where ('id', $_GET['favorite_id']);
    if($db->update ('favorites', $datas)){
        echo $db->count . ' records were updated' ;
        ?>
    <script>window.location.href='../user-dash/user-dash.php?person_id=<?=$_SESSION['id']?>'</script>

<?php
unset($_SESSION['add_favorite']);
}
}

if(isset($_GET['bag_id'])){
    $datas=[
        'deleted_at' => date("y-m-d")
    ];
    
    $db->where ('id', $_GET['bag_id']);
    if($db->update ('shop', $datas)){
        echo $db->count . ' records were updated' ;
        ?>
    <script>window.location.href='../user-dash/user-dash.php?person_id=<?=$_SESSION['id']?>'</script>

<?php
}
}



