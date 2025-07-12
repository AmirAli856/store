
<?php require_once ('config/config.php'); 
session_start();
?>

<?php include "layout/header.php"?>
<?php include "layout/navbar.php"?>
<?php 

// بررسی url و دریافت اطلاعات از  جدول  محصولات . 

if(isset($_GET['category_id'])){
  $_SESSION['category_id'] = $_GET['category_id'] ;
    $db->where('category_id' , $_GET['category_id'] );
    $products = $db->get("proudacts");

}


?>


    <div class="container mt-4">
        <div class="row g-4">

            <!-- filter box -->
            <div class="col-md-3">
                <div class="filter-box ff-dana-medium">
                  <h5 class="mb-3">فیلترها</h5>
                  <div class="accordion" id="filterAccordion">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#priceFilter">
                          محدوده قیمت
                        </button>
                      </h2>
                      <div id="priceFilter" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                          <div class="text-center mb-2">
                            <span id="filter-money-range-text">50</span><span class="me-1">میلیون تومان</span>
                          </div>
                          <input type="range" class="form-range" min="0" max="100" step="10" id="filter-money-range-input">
                          <div class="d-flex justify-content-between">
                            <span>۰ تومان</span>
                            <span>۱۰۰ میلیون</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                      document.getElementById("filter-money-range-input").addEventListener("input", function(e){
                        document.getElementById("filter-money-range-text").innerHTML = e.target.value
                      })
                    </script>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoryFilter">
                          دسته‌بندی
                        </button>
                      </h2>
                      <div id="categoryFilter" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat1">
                            <label class="form-check-label" for="cat1">موبایل</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat2">
                            <label class="form-check-label" for="cat2">تبلت</label>
                          </div>
                        </div>
                      </div>
                    </div>
          
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sellerFilter">
                          فروشنده
                        </button>
                      </h2>
                      <div id="sellerFilter" class="accordion-collapse collapse" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="seller1">
                            <label class="form-check-label" for="seller1">دیجی‌کالا</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="seller2">
                            <label class="form-check-label" for="seller2">فروشنده دیگر</label>
                          </div>
                        </div>
                      </div>
                    </div>
          
                  </div>
                </div>
              </div>
           
            <!-- product box -->
            <div class="col-md-9">
                <div class="d-flex justify-content-start mb-3">
                  <!-- <form id="sort-products" method="get" action="categories.php">
                    <select class="form-select w-auto ff-dana-medium" onchange="this.form.submit()">
                      <option>مرتب‌سازی بر اساس</option>
                      <option  <?=( $_GET['sort-products'] ?? "") == 'default' ?  'selected' : ' ' ?> value="1" id="popular" name="popular">پرفروش‌ترین</option>
                      <option value="2" id="cheapest" name="cheapest">ارزان‌ترین</option>
                      <option value="3" id="expensive"  name="expensive">گران‌ترین</option>
                    </select>
                  </form> -->

    <form method="get" action="order_categories.php"  >
      <select name="sort" class="form-select w-auto ff-dana-medium" onchange="this.form.submit()">
        <option value="default" <?= ($_GET['sort'] ?? '') == 'default' ? 'selected' : '' ?>>مرتب‌سازی بر اساس</option>
        <option value="bestselling" <?= ($_GET['sort'] ?? '') == 'bestselling' ? 'selected' : '' ?>>پرفروش‌ترین</option>
        <option value="cheapest" <?= ($_GET['sort'] ?? '') == 'cheapest' ? 'selected' : '' ?>>ارزان‌ترین</option>
        <option value="expensive" <?= ($_GET['sort'] ?? '') == 'expensive' ? 'selected' : '' ?>>گران‌ترین</option>
      </select>
    </form>
                  </div>
                <div class="row g-3">
                  
                    <?php
                        if(!$products){
                            echo"<div class='alert alert-danger'>محصولی موجود نیست</div>";
                        }
                    ?>

                    <?php foreach($products as $product) : ?>
                        <div class="col-md-3">
                            <a href="product.php?id=<?=$product['id']?>" class="text-decoration-none text-dark">
                                <div class="product-card text-center ff-dana-medium">
                                    <div class="color-dots mb-2 text-start">
                                        <span class="color-gray"></span>
                                        <span class="color-black"></span>
                                    </div>
                                    <img src="public/images/items/item1-product.webp" class="product-image w-50" alt="محصول">
                                    <div class="product-title"><?=$product['name']?></div>
                                    <div class="product-desc"><?=$product['os']?></div>
                                    <div class="rating mt-2">★ ۴.۵</div>
                                    <div class="price mt-2"><?=$product['price']?></div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach?>
                    

                </div>
            </div>
        </div>
    </div>

   <!-- <script>
      document.getElementById("sort-products").addEventListener("change", function(){
        document.getElementById("sort-products").submit();
      })
   </script> -->
   

    <!-- Footer -->
    <?php include "layout/footer.php" ?>
    <?php include "layout/script.php"?>
    <?php include "layout/modals.php"?>

    <!-- register modal -->

<?php
var_dump($_SESSION['category_id']);
var_dump($_SESSION);