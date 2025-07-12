<?php
require_once ('../config/config.php'); 
session_start();

if(isset($_POST)){
    $comments=[
        "comment"=> $_POST['comment'],
        "email"=> $_POST['email'],
        "user_id"=>$_SESSION['id'],
        "product_id"=>$_SESSION['GET_product_id']
    ];
   if(empty($_POST['email'])){
        echo"<div class='alert alert-danger'>ایمیل را پر کنید</div>";
    }elseif(empty($_POST['comment'])){
        echo"<div class='alert alert-danger'>نمیتوانید نظر خود را خالی ارسال کنید</div> " ;
    
   
    }else{
    if(!filter_var($_POST['email'] ,  FILTER_VALIDATE_EMAIL)){
        echo"<div class='alert alert-danger'>ایمیل صحیح نمی باشد</div> " ;
    }else{
        $db->insert("comments",$comments);
        // echo"<div class='alert alert-success'>نظر شما با موفقیت ارسال شد</div> " ;
        ?>
<script>           Toastify({
  text: "نظر شما با موفقیت ارسال شد",
  className: "info rounded-4",
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  position : "center",
}).showToast();
</script>

<?php
    }
}
}


