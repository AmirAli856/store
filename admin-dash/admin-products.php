<?php
 require_once ('../config/config.php');
 session_start();
include "./layout/header.php";
$categories = $db->get("categories");
$products =  $db->get("proudacts");



?>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar p-3 border-end">
        <div class="text-center mb-4">
          <h5 class="mt-2 ff-dana-bold text-blue-400">پنل مدیریت</h5>
        </div>
        <ul class="nav flex-column ff-dana-medium">
          <li class="nav-item mb-2">
            <a class="nav-link active" data-target="products" onclick="showContent('products')">
              <i class="bi bi-box-seam fs-5 me-2"></i> مدیریت محصولات
              <button type="button" class="btn badge d-flex justify-content-center align-items-center me-auto" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="bi bi-plus m-0 fs-5"></i></button>
            </a> 
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin-users.php?person_id=<?=$_SESSION['id']?>" data-target="users" onclick="showContent('users')">
              <i class="bi bi-people fs-5 me-2"></i> مدیریت کاربران
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin-comments.html" data-target="comments" onclick="showContent('comments')">
              <i class="bi bi-chat-dots fs-5 me-2"></i> مدیریت نظرات
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin-categories.html" data-target="categories" onclick="showContent('categories')">
              <i class="bi bi-tags fs-5 me-2"></i> مدیریت دسته‌بندی‌ها
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin-faq.html" data-target="faq" onclick="showContent('faq')">
              <i class="bi bi-question-circle fs-5 me-2"></i> مدیریت سوالات متداول
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin-orders.html" data-target="orders" onclick="showContent('orders')">
              <i class="bi bi-basket fs-5 me-2"></i> لیست خرید
            </a>
          </li>
        </ul>
      </nav>

      <main class="col-md-9 col-lg-10 px-md-4 ms-sm-auto">
        <div id="dashboard" class="content-section active d-flex align-items-center justify-content-center">
          <h2 class="ff-dana-bold text-blue-400 ms-auto">داشبورد مدیریت </h2>
          <p class="ff-dana-bold my-auto"><?=$_SESSION['name']." ".$_SESSION['lname']?></p>
          <div class="position-relative">
            <img src="public/images/User-Profile-PNG-Image.png" alt="Profile" class="img-fluid profile-img"
              style="width: 55px; cursor: pointer;" onclick="toggleProfileDropdown()">

            <div id="profileDropdown" class="dropdown-box shadow-sm rounded-3 ff-dana-medium">
              <a href="#" class="dropdown-item text-danger">خروج</a>
            </div>
          </div>
        </div>

        <div class="content">
          <div id="products" class="content-section d-block">
            <div class="row">
              <div class="table-responsive ff-dana-medium">
                <table id="productsTable" class="display table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>نام محصول</th>
                      <th>کد محصول</th>
                      <th>توضیحات محصول</th>
                      <th>تعداد موجود</th>
                      <th>وضعیت</th>
                      <th>فعالیت</th>
                    </tr>
                  </thead>
                  <tbody>

                
                  <?php $row = 1 ?>
                  <?php foreach($products as $product) : ?>
                    <?php if(empty($product['deleted_at'])) : ?>
                    <tr>
                      <td><?= $row++?></td>
                      <td><?=$product['name']?></td>
                      <td><?=$product['product_code']?></td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemDescription">نمایش توضیحات</button></td>
                      <td><?=$product['count']?></td>
                      <td class="">
                        <?php if($product['status']==1) : ?>
                        <span class="badge bg-success">فعال</span> 
                        <?php else : ?>
                        <span class="badge bg-danger">غیرفعال</span>
                        <?php endif ?>
                      </td>
                      <td>
                        
                        <button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemEdit">ویرایش</button>
                        <button class="btn btn-fa btn-fa-blue"><a class="text-dark" href="query/delete.php?product_id=<?=$product['id']?>">حذف</a></button>
                      </td>
                    </tr>
                    <?php endif ?>
                    <?php endforeach ?>

                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>


  <!-- Modal -->
  <!-- Products -->
  <!-- Products add -->
  <div class="modal fade" id="addProduct" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">اضافه کردن محصول</span>
          <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
        <div class="resault"></div>
          <form id="insert_product">
            <div class="mb-3">
              <label for="productName" class="form-label">نام محصول</label>
              <input type="text" class="form-control" name="productName" id="productName">
            </div>
            <div class="mb-3">
              <label for="productCode" class="form-label">کد محصول</label>
              <input type="text" class="form-control" name="productCode" id="productCode">
            </div>
            <div class="mb-3">
            <label for="productPrice" class="form-label">قیمت محصول</label>
            <input type="text" class="form-control" name="productPrice" id="productPrice">
            </div>
            <div class="mb-3">
            <label for="productDescription" class="form-label">توضیخات محصول</label>
            <textarea class="form-control" name="productDescription" id="productDescription"></textarea>
            </div>
            <div class="mb-3">
              <label for="productCount" class="form-label">تعداد موجود</label>
              <input type="text" class="form-control" name="productCount" id="productCount">
            </div>
            <div class="mb-3">
              <label for="productOs" class="form-label">سیستم عامل</label>
              <input type="text" class="form-control" name="productOs" id="productOs">
            </div>
            <div class="mb-3">
              <label for="productCamera" class="form-label">رزولوشن دوربین</label>
              <input type="text" class="form-control" name="productCamera" id="productCamera">
            </div>
            <div class="mb-3">
              <label for="productScreen" class="form-label">نوع صفحه نمایش</label>
              <input type="text" class="form-control" name="productScreen" id="productScreen">
            </div>
            <div class="mb-3">
              <label for="productImage" class="form-label">تصویر </label>
              <input type="file" class="form-control" name="productImage" id="productImage" enctype="multipart/form-data">
            </div>
            <div class="mb-3">
              <label for="productSize" class="form-label">اندازه صفحه نمایش</label>
              <input type="text" class="form-control" name="productSize" id="productSize">
            </div>
            <div class="mb-3">
              <select name="category_id" class="form-select">
                  <option value="">انتخاب دسته‌بندی</option>
                  <?php foreach ($categories as $cat): ?>
                      <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                  <?php endforeach; ?>
              </select>

            </div>
            <div class="mb-3">
              <label for="productStatus" class="form-label">وضعیت</label>
              <select id="productStatus" name="productStatus" class="form-select">
                <option value="1">فعال</option>
                <option value="2">غیر فعال</option>
              </select>
            </div>
            <button type="submit" class="btn btn-fa btn-fa-blue w-100">ثبت محصول</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Product edit -->
  <div class="modal fade" id="productItemEdit" tabindex="-1">
    <div class="modal-dialog" id="edit_modal">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">ویرایش </span>
          <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="editMessage"></div>
          <form id="edit_product">
              <div class="mb-3">
                <label for="productName" class="form-label">نام محصول</label>
                <input type="text" class="form-control" id="productName" name="productName" value="<?=$product['name']?>">
              </div>
              <div class="mb-3">
                <label for="productCode" class="form-label">کد محصول</label>
                <input type="text" class="form-control" id="productCode" name="productCode" value="<?=$product['product_code']?>">
              </div>
              <div class="mb-3">
                <label for="productDescription" class="form-label">توضیخات محصول</label>
                <textarea class="form-control" id="productDescription" name="productDescription" value="<?=$product['describtion']?>"></textarea>
              </div>
              <div class="mb-3">
                <label for="productCount" class="form-label">تعداد موجود</label>
                <input type="text" class="form-control" id="productCount" name="productCount" value="<?=$product['count']?>">
              </div>
              <div class="mb-3">
                <label for="productStatus" class="form-label">وضعیت</label>
                <select id="productStatus" class="form-select">
                  <option value="1"<?php if($product['status'] =="1"){echo"selected"; }else{echo"";}  ?>>فعال</option>
                  <option value="2"<?php if($product['status'] =="1"){echo"selected"; }else{echo"";}  ?>>غیر فعال</option>
                </select>
              </div>
              <button type="submit" class="btn btn-fa btn-fa-blue w-100">ثبت تغییرات</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Product description -->
  <div class="modal fade" id="productItemDescription" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">گوشی اپل مدل آیفون 16</span>
        </div>
        <div class="modal-body">
          <p><?=$product['describtion']?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-fa btn-fa-white w-100" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Alert -->
  <!-- <div id="welcome-alert"
    class="alert alert-info text-center position-fixed top-0 start-50 translate-middle-x w-50 ff-dana-bold" role="alert"
    style="display: none; z-index: 1050;">
    👋 به پنل مدیریت خود خوش آمدید !
  </div> -->


 <?php include "./layout/script.php" ?>
 <script>
$(document).ready(function () {
  $("#insert_product").submit(function (e) { 
    e.preventDefault();

    var formData = new FormData(this); // تمام فیلدها + فایل تصویر

    $.ajax({
      method: "POST",
      url: "query/insert_products.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
     $(".resault").html(response)
        console.log(response);
      },
      error: function (xhr, status, error) {
        alert("خطا در ارسال: " + error);
        console.log(xhr.responseText);
      }
    });
  });
  
  $("#edit_product").submit(function (e) { 
    e.preventDefault();
    var editformData = new FormData(this); // تمام فیلدها + فایل تصویر
    $.ajax({
      method: "POST",
      url: "query/edit.php",
      data: editformData,
      contentType: false,
      processData: false,
      success: function (response) {
     $(".editMessage").html(response)
        console.log(response);
        console.log(editformData);
       
      },
      error: function (xhr, status, error) {
        alert("خطا در ارسال: " + error);
        console.log(xhr.responseText);
      }
    });
  });

    
  });


</script>

</body>

</html>