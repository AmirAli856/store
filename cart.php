<?php require_once ('config/config.php');
session_start();

include "layout/header.php";
include "layout/navbar.php";

// افزودن محصول به سبد خرید 

if($_SERVER['REQUEST_METHOD'] == "POST"){

 $data=[
    "name"=>$_POST['name'],
    "price"=>$_POST['price'],
    "tech_screen"=>$_POST['tech_screen'],
    "user_id"=>$_SESSION['id'],
    "product_id"=>$_SESSION['GET_product_id']
 ];
 $insert_shop=$db->insert("shop" , $data);
 if($insert_shop){
  ?>


<?php
 }
}
$db->where("user_id" ,$_GET['person_id'] );
$carts = $db->get("shop");

?>
<body>
 
  

    <!-- empty-cart -->
    <!-- <div class="container">
        <div class="row text-center flex-column">
            <div class="col--md-4 mx-auto"><img src="public/images/empty-cart.svg" alt="cart">
                <div class="h4 ff-dana-medium mt-2 mb-4">سبد خرید شما خالی است!</div>
            </div>
            <div class="col-md-6 mx-auto my-5">
                <p class="ff-dana-regular">برای مشاهده محصولاتی که پیش‌تر به سبد خرید خود اضافه کرده‌اید وارد شوید.</p>
                <a href="login.html" class="btn btn-fa btn-fa-blue">ورود</a>
                        <a href="register.html" class="btn btn-fa btn-fa-white">ثبت نام</a>
            </div>

        </div>      
    </div> -->

    <!-- cart -->
    <!-- <div class="container col-md-6 my-5">
        <h2 class="text-center mb-4 ff-dana-bold text-blue">سبد خرید شما</h2>
        <div class="card shadow-sm mb-4">
          <div class="row g-0 align-items-center">
            <div class="col-md-3 text-center p-2">
              <img src="public/images/items/item1.webp" class="img-fluid rounded" alt="item">
            </div>
            <div class="col-md-6 p-3">
              <h5 class="ff-dana-medium">گوشی آیفون ۱۶</h5>
              <p class="text-muted small ff-dana-medium mb-1">ظرفیت ۱۲۸ گیگابایت | رم ۸</p>
              <p class="text-muted small ff-dana-medium mb-1">دو سیم کارت | گارانتی ۱۸ ماهه</p>
            </div>
            <div class="col-md-3 text-center p-3">
              <p class="ff-dana-medium mb-2">۲,۵۰۰,۰۰۰ <i class="ti ti-currency-iranian-rial"></i></p>
              <button class="btn btn-outline-danger ff-dana-medium btn-sm">حذف</button>
            </div>
          </div>
        </div>
      
        <div class="card shadow-sm mb-4">
          <div class="row g-0 align-items-center">
            <div class="col-md-3 text-center p-2">
              <img src="public/images/items/item1.webp" class="img-fluid rounded" alt="item">
            </div>
            <div class="col-md-6 p-3">
              <h5 class="ff-dana-medium">هدفون بی‌سیم سامسونگ</h5>
              <p class="text-muted small ff-dana-medium mb-1">مدل Galaxy Buds Pro</p>
              <p class="text-muted small ff-dana-medium mb-1">رنگ مشکی | نویز کنسلینگ</p>
            </div>
            <div class="col-md-3 text-center p-3">
              <p class="ff-dana-medium mb-2">۲,۵۰۰,۰۰۰ <i class="ti ti-currency-iranian-rial"></i></p>
              <button class="btn btn-outline-danger ff-dana-medium btn-sm">حذف</button>
            </div>
          </div>
        </div>

        <div class="p-3 text-center">
          <h5 class="mb-3 ff-dana-medium">مبلغ نهایی: ۲,۵۰۰,۰۰۰ <i class="ti ti-currency-iranian-rial"></i></h5>
          <a href="checkout.html" class="btn btn-fa btn-fa-blue px-4 w-50 mx-auto">ادامه فرایند خرید</a>
        </div>
      </div> -->

      <div class="col-md-10 mx-auto text-center" dir="rtl">
  <h2 class="text-center mb-4 ff-dana-bold text-blue mt-3">سبد خرید</h2>
  <table id="myTable" class="table table-bordered table-hover text-center align-middle mb-0 w-100">
            <thead class="table-light ff-dana-medium text-center">
              <tr>
                <th>ردیف</th>
                <th>محصول</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th>قیمت کل</th>
                <th>عملیات</th>
              </tr>
            </thead>
            <tbody class="ff-dana-medium">
        <?php if(count($carts) == 0) : ?>
          <?=" <div class='alert alert-info'> محصولی در سبد خرید شما وجود ندارد</div>"?>
          <?php else : ?>
         <?php foreach($carts as $cart) : ?>
          <?php $row = 1?>
          <?php if(empty($cart['deleted_at'])) :?>
              <tr>
                <td><?=$row++?></td>
                <td><?=$cart['name']?></td>
                <td>1</td>
                <td><?=number_format($cart['price'])." "."تومان"?></td>
                <td><?=number_format($cart['price'])." "."تومان"?></td>
                <td>
                  <button class="btn btn-sm btn-outline-danger" ><a class="text-dark" id="delete_shop" href="query/delete.php?id=<?=$cart['id']?>">حذف</a></button>
                  <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" >ویرایش</button>
                </td>
              </tr>
              
            <?php endif ?>
          <?php endforeach ?>
        <?php endif ?>
            </tbody>
          </table>
        </div>
        <script>
           document.getElementById("delete_shop").addEventListener('click' , function(){
  console.log("yes");
  
           })
        </script>
       
   

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog bg-light">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ویرایش</h1>
      </div>
      <div class="modal-body">
       <form action="">

       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">ویرایش اطلاعات</button>
      </div>
    </div>
  </div>
</div>


    <!-- Footer -->
    <?php include "layout/footer.php" ?>
    <?php include "layout/script.php"?>
    <?php include "layout/modals.php"?>
</body>

</html>