

<?php
require_once ('../config/config.php'); 
session_start();
$users = [
  "name" => $_POST['name'],  
  "lname" => $_POST['lname'],  
  "username" => $_POST['username'],  
  "gender" => $_POST['gender'],  
  "phone" => $_POST['phone'],  
  "password" => password_hash($_POST['password'],PASSWORD_DEFAULT)
];

//
// if($rejister){
//     echo"ثبت نام انجام شد ";
// }
if(empty($users['name'])  || empty($users['lname'])  || empty($users['username'])  || empty($users['gender']) || empty($users['phone']) ||empty($users['password'])){
  echo "<p class='text-danger'>لطفا تمام فیلد ها را با دقت وارد کنید</p>";
}else{
  $rejister = $db->insert("users", $users);
  $_SESSION['auth']="1";
  $_SESSION['name'] = $users['name'];
  $_SESSION['lname'] = $users['lname'];
  $_SESSION['username'] = $users['username'];
  $db->where("username" ,   $_SESSION['username']);
  $rejiser_id =  $db->getOne("users");
  $_SESSION['id'] = $rejiser_id ['id'];
 
  
//   echo"
// <div class='text-success'>عملیات با موفقیت انجام شد</div>";?>
<script>
$(".modal").fadeOut(1000);
$(".modal-backdrop ").remove();
setTimeout(() => {
  location.reload();
}, 1000);
Toastify({
  text: "ثبت نام با موقیت انجام شد",
  className: "info rounded-4",
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  position : "center",
}).showToast();

</script>
<?php } ?>
