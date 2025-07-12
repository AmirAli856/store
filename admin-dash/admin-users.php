<?php 
 require_once ('../config/config.php');
 session_start();
include "layout/header.php";
$login_users = $db->get("users");
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
            <a class="nav-link" href="admin-products.php?person_id=<?=$_SESSION['id']?>" data-target="products" onclick="showContent('products')">
              <i class="bi bi-box-seam fs-5 me-2"></i> مدیریت محصولات
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link active" href="admin-users.php?person_id=<?=$_SESSION['id']?>" data-target="users" onclick="showContent('users')">
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
              <a href="../index.php" class="dropdown-item text-danger">خروج</a>
            </div>
          </div>
        </div>

        <div class="content">
          <div id="users" class="content-section d-block">
            <div class="row">
              <div class="table-responsive ff-dana-medium">
                <table id="usersTable" class="display table">
                  <thead>
                    <tr id="userRow_<?=$user['id']?>">
                      <th>#</th>
                      <th>نام</th>
                      <th>نام خانوادگی</th>
                      <th>شماره تلفن</th>
                      <th>تاریخ تولد</th>
                      <th>آدرس</th>
                      <th>شماره حساب</th>
                      <th>عملیات</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php $row = 1 ?> 
                      <?php foreach($login_users as $user) : ?>
                        <?php if(empty($user['deleted_at']) &&( $user['is_admin']) == 0 ): ?>
                          <tr>
                            <td><?= $row++ ?></td>
                            <td><?=$user['name']?></td>
                            <td><?=$user['lname']?></td>
                            <td><?=$user['phone']?></td>
                            <td><?php if(empty($user['date_birth'])){echo "وارد نکرده";}else{echo $user['date_birth'];} ?></td>
                            <td><?php  if(empty($user['address'])){echo "وارد نکرده";}else{echo $user['address'];}  ?></td>
                            <td><?php if(empty($user['accountNumber'])){echo "وارد نکرده";}else{echo $user['accountNumber'];}?></td>
                            <td>
                              <button class="btn btn-fa btn-fa-white edit-btn"
                                data-id="<?=$user['id']?>"
                                data-bs-toggle="modal"
                                data-bs-target="#userEdit">
                                ویرایش
                              </button>
                              <button class="btn btn-fa btn-fa-blue">
                                <a href="query/delete.php?person_id=<?=$user['id']?>">حذف</a>
                              </button>
                              <button class="btn btn-fa btn-fa-blue">بلاک</button>
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
  <!-- Users -->
  <!-- User edit -->
  <div class="modal fade" id="userEdit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">ویرایش اطلاعات</span>
          <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="message"></div>
                  
          <form id="edit_users">
            <div class="mb-3">
              <label for="userFName" class="form-label">نام</label>
              <input type="text" class="form-control" name="userFName" id="userFName" value="<?=$user['name']?>">
            </div>
            <div class="mb-3">
              <label for="userLName" class="form-label">نام خانوادگی</label>
              <input type="text" class="form-control" name="userLName" id="userLName"  value="<?=$user['lname']?>">
            </div>
            <div class="mb-3">
              <label for="userPhone" class="form-label">شماره تلفن</label>
              <input class="form-control" type="text" name="userPhone" id="userPhone" value="<?=$user['phone']?>">
            </div>
            <div class="mb-3">
              <label for="userBirthday" class="form-label">تاریخ تولد</label>
              <input data-jdp class="form-control pwt-datepicker-input-element" type="text" name="userBirthday" id="userBirthday" value="<?=$user['date_birth']?>">
            </div>
            <div class="mb-3">
              <label for="userAddress" class="form-label">آدرس</label>
              <textarea class="form-control" name="userAddress" id="userAddress"><?=$user['address']?></textarea >
            </div>
            <div class="mb-3">
              <label for="userCard" class="form-label">شماره حساب</label>
              <input class="form-control" type="text" name="userCard" id="userCard" value="<?=$user['accountNumber']?>">
            </div>
            <div class="mb-3">
              <label for="categoryStatus" class="form-label">وضعیت</label>
              <select name="categoryStatus" id="categoryStatus" class="form-select">
              <option value="1"<?php if($user['status'] =="1"){echo"selected"; }else{echo"";}  ?>>فعال</option>
              <option value="2"<?php if($user['status'] =="2"){echo"selected"; }else{echo"";}  ?>>غیر فعال</option>
              </select>
            </div>
            <input type="hidden" name="userID" id="userID" value="<?=$user['id']?>">
            <button type="submit" class="btn btn-fa btn-fa-blue w-100">ثبت تغییرات</button>
          </form>
          
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

<?php
include "layout/script.php";
?>
<script>
  jalaliDatepicker.startWatch();
</script>
<script>
  $(document).ready(function () {
    
    // ارسال Ajax
    $("#edit_users").submit(function (e) {
      e.preventDefault();
      var eUsers_form = new FormData(this);
      $.ajax({
        method: "POST",
        url: "query/edit_users.php",
        data: eUsers_form,
        contentType: false,
        processData: false,
        success: function (response) {
          $(".message").html(response);
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

