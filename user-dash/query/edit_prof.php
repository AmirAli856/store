<?php
require_once ('../../config/config.php'); 
session_start();
if(isset($_POST)){


    $data=[
        "name" =>$_POST['pname'],
        "lname" =>$_POST['lname'],
        "phone" =>$_POST['phone'],
        "date_birth" =>$_POST['birthdate'],
        "address"=> $_POST['address'],
        "accountNumber"=>$_POST['accountNumber']
    ];
    $db->where("id" , $_SESSION['id']);
     $db->update("users" , $data);
    $_SESSION['change'] = "1";

    ?>
<script>
Toastify({
                text: "ویرایش با موفقیت انجام شد",
                className: "info rounded-4",
                style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                position : "center",
                }).showToast();

setTimeout(() => {
    window.location.href="user-dash.php?person_id=<?=$_SESSION['id']?>";
}, 1000);

 
// </script>

    <?php
    
}
 


?>