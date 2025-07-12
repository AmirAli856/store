<?php require_once ('config/config.php');
session_start();
 include "layout/header.php";

//  بررسی شناسه محصول برای نمایش اطلاعات 
$id = $_GET['id'];
$db->where('id' , $id);
$products = $db->get("proudacts");
$_SESSION['GET_product_id'] =  $_GET['id'];
// var_dump($_SESSION['GET_id']);
// var_dump($_SESSION['id']);
// $db->where("product_id" , $_SESSION['GET_product_id']  ); 
// $prod = $db->getOne("favorites");
// var_dump($prod);

?>

<body>
    <!-- Navbar -->
    <?php include "layout/navbar.php" ?>

    <div class="container my-5">
        <!-- ---information of product-- -->
    <?php foreach($products as $product) :?>
        <div class="row gy-3">
         <div class="col-12 col-lg-3">
                <img src="/store-2<?=$product['image']?>" alt="item" class="img-fluid w-100">
            </div>
            <div class="col-12 col-lg-6">
                <h2 class="h5 mb-2"><?=$product['name']?></h2>
                <div class="text-body-tertiary d-flex align-items-center gap-1 justify-content-center justify-content-lg-start mb-2">
                    <!-- <h2 class="fs-7">Apple iPhone 16 CH Dual SIM Storage 128GB And RAM 8GB Mobile Phone</h2> -->
                    <div class="line bg-secondary-subtle rounded-pill d-none d-lg-block"></div>
                </div>
                <div class="d-flex align-items-center gap-1 mb-4">
                    <i class="ti ti-star-filled text-warning"></i>
                    <div class="fs-6">
                        <span>4.3 </span><span class="text-body-tertiary">(امتیاز ۸۵۸ خریدار)</span>
                    </div>
                </div>
                <div>
                    <span class="fw-bold">ویژگی ها</span>
                    <div class="row mt-2">
                        <div class="col-4 p-1">
                            <div class="p-2 bg-body-secondary bg-opacity-75 rounded-3">
                                <p class="fs-6 mb-1 fw-semibold text-body-tertiary">فناوری صفحه نمایش</p>
                                <p class="fs-6 mb-1 fw-semibold text-dark text-truncate product-option-card-text"><?=$product['tech_screen']?></p>
                            </div>
                        </div>
                        <div class="col-4 p-1">
                            <div class="p-2 bg-body-secondary bg-opacity-75 rounded-3">
                                <p class="fs-6 mb-1 fw-semibold text-body-tertiary">نسخه سیستم عامل</p>
                                <p class="fs-6 mb-1 fw-semibold text-dark text-truncate product-option-card-text"><?=$product['os']?></p>
                            </div>
                        </div>
                        <div class="col-4 p-1">
                            <div class="p-2 bg-body-secondary bg-opacity-75 rounded-3">
                                <p class="fs-6 mb-1 fw-semibold text-body-tertiary">رزولوشن دوربین اصلی</p>
                                <p class="fs-6 mb-1 fw-semibold text-dark text-truncate product-option-card-text"><?=$product['camera']?></p>
                            </div>
                        </div>
                        <div class="col-4 p-1">
                            <div class="p-2 bg-body-secondary bg-opacity-75 rounded-3">
                                <p class="fs-6 mb-1 fw-semibold text-body-tertiary">اندازه</p>
                                <p class="fs-6 mb-1 fw-semibold text-dark text-truncate product-option-card-text"><?=$product['size']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 p-0">
                <div class="bg-body-secondary bg-opacity-75 p-3 rounded-3">
                    <div class="d-flex flex-column">
                        <span class="fw-semibold">قیمت محصول</span>
                        <span class="d-flex align-items-center justify-content-end fs-5 fw-semibold text-dark"><?=number_format($product['price'])?><i class="ti ti-currency-iranian-rial"></i></span>
                    </div>
                    <div class="d-flex gap-1 mb-4">
                        
                       <form class="w-100"id="shop" method="post" action="cart.php?person_id=<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];} ?>">
                        <input type="hidden" name="name" id="name" value="<?=$product['name']?>">
                        <input type="hidden" name="price" id="price" value="<?=$product['price']?>">
                        <input type="hidden" name="tech_screen" id="tech_screen" value="<?=$product['tech_screen']?>">
                     <?php if(!isset($_SESSION['auth'])):?>
                        <button class="btn btn-fa btn-fa-blue w-100 mt-3" name="addshop" id="alert" type="button" >افزودن به سبد</button> 
                        <?php else : ?>
                            <button class="btn btn-fa btn-fa-blue w-100 mt-3" name="addshop" type="submit" >افزودن به سبد</button> 
                            <?php endif ?>
                        
                     
                       </form>
                        <!-- sweet alerts -->
 <script>
        document.getElementById("alert").addEventListener('click' , function(){
            Toastify({
  text: "ابتدا وارد شوید",
  position : "center",
  close : true

}).showToast();
        })
     </script>

<form id="favorite_form" >
<input type="hidden" name="favorite_name" id="favorite_name" value="<?=$product['name']?>">
<input type="hidden" name="tech_screen" id="tech_screen" value="<?=$product['tech_screen']?>">
<!-- عکس هم باید آپلود شود -->


<?php if(!isset($_SESSION['auth'])):?>
   
<button id="add-favorite" type="button" name="add_Favorite" class="btn btn-fa btn-fa-white w-25 mt-3 d-flex align-items-center justify-content-center"><i id="f_alert" class="ti text-danger ti-heart fs-5" ></i>
    <?php else : ?>
        <?php if(!isset($_SESSION['add_favorite']) ) :  ?>
            <button id="add-favorite" type="submit" name="add_Favorite" class="btn btn-fa btn-fa-white w-25 mt-3 d-flex align-items-center justify-content-center"><i  class="ti text-danger ti-heart fs-5" ></i>
            <?php else : ?>
                <?php if($prod['product_id'] = $_SESSION['GET_product_id']) : ?>
                <button id="add-favorite" type="button" name="add_Favorite" class="btn btn-fa btn-fa-white w-25 mt-3 d-flex align-items-center justify-content-center"><i  class="ti text-danger ti-heart-filled fs-5" ></i>
                    <?php endif ?>
                <?php endif ?>
    <?php endif ?>

</button> 
<script>
        document.getElementById("f_alert").addEventListener('click' , function(){
            Toastify({
  text: "ابتدا وارد شوید",
  position : "center",
  close : true

}).showToast();
        })
     </script>


</form>
                   
                   
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-rosette-discount-check fs-5"></i>
                        <span class="fs-7 fw-medium text-dark">گارانتی ۱۸ ماهه عمران تل(نیک مهر عمرانی)</span>
                    </div>
                </div>
            </div>
        </div>
        
        <?php endforeach?>
    </div>






    <div class="container my-5">
        <!-- ---ارسال نظرات--- -->
        <div class="row">
            <div class="col-12 mb-5 d-flex gap-3 align-items-center justify-content-center justify-content-lg-start">
                <span class="h3 text-secondary">ثبت نظر</span>
                <div class="line bg-secondary-subtle rounded-pill d-none d-lg-block"></div>
            </div>
            <?php if(!isset( $_SESSION['auth'])) : ?>
            <?php echo"<div class='alert alert-info w-50 h-50 text-center'>ثبت نظر مختص به کاربران سایت می باشد</div>" ?>
            <?php else :  ?>

                <div class="col-12 col-lg-6">
                <div class="message"></div>
                <form id="comment-form" >
                    <div class="mb-3">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="text" class="form-control rounded-3" name="email" id="c-email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">توضیحات</label>
                        <textarea class="form-control rounded-3" name="comment" id="c-comment" rows="3"></textarea>
                    </div>
                    <button type="submit" name="sendComment" class="btn btn-fa btn-fa-blue w-100">ثبت نظر</button>
                </form>

            </div>

            <?php endif ?>

            <div class="col-12 col-lg-6 d-none d-lg-block">
                <img src="public/images/comment.png" alt="comment" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include "layout/footer.php" ?>
    <?php include "layout/script.php"?>
    <?php include "layout/modals.php"?>
    <script>
     $(document).ready(function () {
        $("#comment-form").submit(function (e) { 
            e.preventDefault();
            let email = $("#c-email").val();
            let comment = $("#c-comment").val();
            $.ajax({
                method: "post",
                url: "query/comment.php",
                data: {
                    email : email,
                    comment:comment
                },
                
                success: function (response) {
                $(".message").html(response);
                },
                error : function(){
                    alert("no");
                }
            });
        
            
        });

        $("#favorite_form").submit(function (e) { 
            e.preventDefault();
            let favorite_name = $("#favorite_name").val();
            let tech_screen = $("#tech_screen").val();

            $.ajax({
                method: "post",
                url: "query/favorite.php",
                data: {
                    favorite_name : favorite_name,
                    tech_screen : tech_screen
                },
               
                success: function (response) {
                    
                Toastify({
                    text: "محصول با موفقیت وارد لیست علاقه مندی ها شد",
                    className: "info rounded-4",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    position : "center",
                }).showToast();

                },
                error : function(){
                    alert("no");
                }
            });
            
        });
       
     });
           

    </script>
   
</body>
</html>
<?php
var_dump($_SESSION);