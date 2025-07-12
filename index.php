<?php require_once ('config/config.php');
session_start();
?>
<?php include "layout/header.php"?>
<?php include "layout/navbar.php"?>

<!-- ------search section--- -->
<?php
$baseUrl=$_SERVER['DOCUMENT_ROOT']."/store-2";
if(isset($_GET['search'])){
    $db->where("name", '%'. $_GET['search'] .'%' , "like");
    $products = $db->get("proudacts");
  
}else{
$products = $db->get("proudacts");

}
// ---------
$categories = $db->get("categories");
$faqs = $db->get("faqs");
$informations = $db->get("info");


?>
<body>
<div class="container-fluid">
    <!-- ------search_box------ -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="search-container position-relative my-3">
                    <form id="search_box" class="d-flex align-items-center" >
                        <input class="form-control search-input ps-5 ff-dana-medium" id="search" type="search"name="search" placeholder="جستجو"
                            >
                        <button class="btn btn-dfilter btn-fa btn-fa-white ms-2 ff-dana-medium" type="reset" name="reset">حذف
                            فیلتر</button>
                        <button class="btn btn-search btn-fa btn-fa-blue ms-2 ff-dana-medium"
                            type="submit">جستجو</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Header slider -->
    <div class="swiper swiperHeader position-relative mb-5">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#"><img src="public/images/banners/b1.webp" alt="banner"></a></div>
            <div class="swiper-slide"><a href="#"><img src="public/images/banners/b2.webp" alt="banner"></a></div>
            <div class="swiper-slide"><a href="#"><img src="public/images/banners/b3.webp" alt="banner"></a></div>
            <div class="swiper-slide"><a href="#"><img src="public/images/banners/b4.webp" alt="banner"></a></div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button position-absolute">
            <div class="swiper-button-prev rounded-circle p-1 bg-white border border-2"><i
                    class="ti ti-chevron-right fs-4 text-dark"></i></div>
            <div class="swiper-button-next rounded-circle p-1 bg-white border border-2"><i
                    class="ti ti-chevron-left fs-4 text-dark"></i></div>
        </div>
    </div>

    <!-- New items -->
    <div class="container bg-blue rounded-sm-4 p-3 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="swiper swiperNewItem">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide bg-transparent flex-column">
                            <p class="text-decoration-none ff-soofee text-white text-center fs-1">فن آوران</p>
                            <p class="text-white ff-dana-bold fs-4">محصولات محبوب</p>
                        </div>
                        <?php if(count($products) <=0) {
                            echo "<div class='alert alert-danger text-center fs-5  w-100'>اطلاعاتی موجود نیست</div>";
                        }?>
                    
                        <?php foreach($products as $product) : ?>
                        <div class="swiper-slide rounded-3">
                            <a href="product.php?id=<?=$product['id']?>" class="p-2 text-decoration-none">
                                <img src="/store-2/<?= $product['image'] ?>" alt="Newitem 1" class="my-2">
                                <p class="fs-7 text-end text-body-tertiary ff-dana-medium mb-1"><?= $product['name'] ?></p>
                                <div class="d-flex justify-content-center">
                                    <span class="d-flex align-items-center fs-6 ff-dana-medium text-dark"><?=number_format($product['price'])." "."تومان"?>
                                        </span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach ?>
                     
                    </div>
                    <div class="swiper-button swiper-button-prev rounded-circle p-1 bg-white border border-2"><i
                            class="ti ti-chevron-right fs-4 text-dark"></i></div>
                    <div class="swiper-button swiper-button-next rounded-circle p-1 bg-white border border-2"><i
                            class="ti ti-chevron-left fs-4 text-dark"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories -->
    <div class="container" id="categories">
        <div class="row justify-content-center gap-2">
            <div class="col-12 mb-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="line bg-blue-700 opacity-25"></div>
                    <p class="h2 text-blue-500 text-center ff-dana-bold mx-3">دسته بندی</p>
                    <div class="line bg-blue-700 opacity-25"></div>
                </div>
            </div>
            <?php foreach($categories as $category ) :   ?>
            <div class="col-2 ">
                <a href="categories.php?category_id=<?=$category['id']?>" class="text-decoration-none d-flex flex-column align-items-center m-2">
                    <img src="public/images/sections/section<?=$category['image']?>.jpg" alt="section" class="section-img">
                    <p class="ff-dana-medium text-dark text-center fs-responsive"><?=$category['name']?></p>
                </a>
            </div>

            <?php endforeach ?>
        </div>
    </div>
    <!-- Faq -->
    <div class="container my-5" id="faq">
        <div class="row justify-content-center">
            <div class="col-12 mb-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="line bg-blue-700 opacity-25"></div>
                    <p class="h2 text-blue-500 text-center ff-dana-bold mx-3">سوالات متداول</p>
                    <div class="line bg-blue-700 opacity-25"></div>
                </div>
            </div>
            <div class="col-10">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <?php foreach($faqs as $faq ) :   ?>
                                    <!-- <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button ff-dana-medium" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faq<?=$faq['id']?>">
                                            <?= $faq['name']?>
                                            </button>
                                        </h2>
                                        <div id="faq<?=$faq['id']?>" class="accordion-collapse ff-dana-medium collapse">
                                            <div class="accordion-body">
                                                <p><?=$faq['describtion']?></p>
                                            </div>
                                        </div>
                                    </div> -->
                    <div class="accordion-item">
                                <h2 class="accordion-header">
                                        <button class="accordion-button ff-dana-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?=$faq['id']?>">
                                        <?=$faq['name']?>
                                        </button>
                                </h2>
                            <div id="faq<?=$faq['id']?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><p><?=$faq['describtion']?></p></div>
                            </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <div class="container my-5" id="about">
        <div class="row bg-blue-50 px-4 py-5 rounded-4 mx-1 mx-lg-5">
        <?php foreach($informations as $information ) :   ?>
            <div class="col-12 col-lg-8 d-lg-flex flex-column justify-content-evenly">
                <p class="ff-dana-extrabold h3 text-blue-900 mb-3 text-center"><?=$information['name']?> </p>
                <div class="mb-4">
                    <p class="ff-dana-regular text-color-800 m-0 text-justify"><?=substr($information['describtion'],0 ,800)."..."?></p>
                </div>
                <a href="#" class="btn btn-fa btn-fa-lg btn-fa-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">بیشتر بخوانید</a>
            </div>
            <?php endforeach ?>
            <div class="col-12 col-lg-4">
                <img src="public/images/about.webp" alt="Fanavaran-student-image" class="img-fluid">
            </div>
        </div>
    </div>
<!-- Modal for About -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="bg-light modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">درباره فروشگاه</h1>
      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- Contact us -->
    <div class="modal fade" id="contactus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <span class="modal-title h5">تماس با ما</span>
                </div>
              
                <div class="modal-body px-4">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div
                            class="bg-blue-100 shadow-sm p-2 rounded-4 d-flex justify-content-center align-items-center">
                            <i class="ti ti-phone fs-3 text-blue-900"></i></div>
                        <p class="fs-5 ff-dana-medium text-blue-900 m-0">شماره تلفن: <a href="tel:09123456789"
                                class="fs-6 fw-medium text-decoration-none text-blue-800">...</a></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div
                            class="bg-blue-100 shadow-sm p-2 rounded-4 d-flex justify-content-center align-items-center">
                            <i class="ti ti-location fs-3 text-blue-900"></i></div>
                        <p class="fs-5 ff-dana-medium text-blue-900 m-0">آدرس: <span
                                class="fs-6 fw-medium text-decoration-none text-blue-800">
                               ...
                            </span></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div
                            class="bg-blue-100 shadow-sm p-2 rounded-4 d-flex justify-content-center align-items-center">
                            <i class="ti ti-brand-instagram fs-3 text-blue-900"></i></div>
                        <p class="fs-5 ff-dana-medium text-blue-900 m-0">اینستاگرام: <a href="#"
                                class="fs-6 fw-medium text-decoration-none text-blue-800">fanavaran</a></p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div
                            class="bg-blue-100 shadow-sm p-2 rounded-4 d-flex justify-content-center align-items-center">
                            <i class="ti ti-brand-telegram fs-3 text-blue-900"></i></div>
                        <p class="fs-5 ff-dana-medium text-blue-900 m-0">تلگرام: <a href="#"
                                class="fs-6 fw-medium text-decoration-none text-blue-800">fanavaran</a></p>
                    </div>
                </div>

               
                <div class="modal-footer">
                    <button type="button" class="btn btn-fa btn-fa-white w-100" data-bs-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="support-btn rounded-circle">dsmd</div> -->
    <!-- Footer -->
  <?php include "layout/footer.php" ?>
  <?php include "layout/script.php"?>
  <?php include "layout/modals.php"?>
 <!-- <a href="<?=__dir__?>/cart.php">link</a> -->

<script>
    $(document).ready(function () {
        $("#search").on("input", function (e) { 
            e.preventDefault();
            let input_search = $("#search").val();
            $.ajax({
                method: "post",
                url: "./query/search.php",
                data: {
                    input_search : input_search
                },
           
                success: function (response) {
                   console.log(response); 
                },
                error: function () {
                $('#results').html('<div class="item">خطا در بارگذاری نتایج</div>');
        }
            });
            
        });
    });
</script>


  
</body>

</html>
<?php




