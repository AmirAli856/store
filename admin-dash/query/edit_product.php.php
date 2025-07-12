<?php
require_once ('../../config/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // اعتبارسنجی اولیه
if  (empty($_POST['productName'])) {
        echo "<div class='alert alert-danger'>فیلد نام را پر کنید</div>";
    } elseif (empty($_POST['productCode'])) {
        echo "<div class='alert alert-danger'>فیلد کد را پر کنید</div>";
    } elseif (empty($_POST['productDescription'])) {
        echo "<div class='alert alert-danger'>فیلد توضیحات را پر کنید</div>";
    } elseif (empty($_POST['productCount'])) {
        echo "<div class='alert alert-danger'>تعداد محصول را وارد کنید</div>";
} else{
    $editedData = [
        "name"=>$_POST['productName'],
        "describtion"=>$_POST['productDescription'],
        "count"=>$_POST['productCount'],
        "product_code"=>$_POST['productCode']
    ];
    $db->where("id" ,$_SESSION['generate_product_id'] );
    $edited = $db->update(" proudacts" , $editedData  ) ;
    $_SESSION['edite_product'] = "1";
    ?>
<script>
 Toastify({
  text: "ویرایش با موفقیت انجام شد",
  duration: 2000,
//   destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right,rgb(17, 247, 113),rgb(13, 189, 224))",
  },
  onClick: function(){} // Callback after click
}).showToast();
$("#edit_modal").fadeOut();
$(".modal-backdrop ").remove();
window.location.href="admin-products.php?person_id=<?=$_SESSION['id']?>"

</script>

<?php
}
}
