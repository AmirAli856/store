<?php
require_once ('../config/config.php'); 
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['lusername'];
    $password = $_POST['lpassword'];

    if(empty($username) || empty($password)){
        echo "<p class='alert alert-danger fs-4'>فیلد های مورد نظر را پر کنید!</p>" ;
    } else {
        $db->where('username', $username);
        $user = $db->getOne('users', ['username', 'password', 'name', 'lname', 'id', 'is_admin']);

        if($user){
            if(isset($user['password']) && password_verify($password, $user['password'])){
                $_SESSION['auth'] = "1";
                $_SESSION['name'] = $user['name'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['is_admin'] = $user['is_admin'];
?>
<script>
    $(".modal").fadeOut(1000);
    $(".modal-backdrop").remove();

    Toastify({
        text: "در حال انتقال به صفحه...",
        className: "info rounded-4",
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        position: "center",
    }).showToast();

    setTimeout(() => {
        <?php if ($user['is_admin'] == 1): ?>
            window.location.href = "admin-dash/admin-dash.php?person_id=<?= $_SESSION['id']?>";
        <?php else: ?>
            window.location.href = "index.php?person_id=<?= $_SESSION['id']?>";
        <?php endif; ?>
    }, 1000);
</script>
<?php
            } else {
                echo "<div class='alert alert-danger '>نام کاربری یا رمز عبور اشتباه است.</div>";
            }
        } else {
            echo "<div class='alert alert-danger '>کاربری با این نام یافت نشد.</div>";
        }
    }
}
?>
