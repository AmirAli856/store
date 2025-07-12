<?php
 require_once ('../config/config.php');
session_start();
include "../layout/header.php";
include "../user-dash/layout/header.php";

// --get information of user who login and come to user-dash----
if(isset($_SESSION['id'])){
    $db->where('id' ,$_SESSION['id'] );
    $users = $db->getOne("users");
    $db->where('user_id' ,$_SESSION['id'] );
    $comments = $db->get("comments");
 
    // print_r($productName);
    // $imploded = implode('',$productName);
    // echo $imploded;

}


if(isset($_SESSION['change'])){
    $db->where('id' ,$_SESSION['id'] );
    $users = $db->getOne("users");

}


?>




<body>
    <div class="container-fluid">
        <div class="row">
            <?php include"layout/sidebar.php" ?>
            <main class="col-md-9 col-lg-10 px-md-4 ms-sm-auto" >
                <div id="dashboard" class="content-section active d-flex align-items-center justify-content-center">
                    <h2 class="ff-dana-bold text-blue-400 me-auto">داشبورد</h2>
                    <p class="ff-dana-bold my-auto"><?=$_SESSION['name']." ".$_SESSION['lname']?></p>
                    <div class="position-relative">
                        <img src="public/images/User-Profile-PNG-Image.png" alt="Profile" class="img-fluid profile-img"
                            style="width: 55px; cursor: pointer;" onclick="toggleProfileDropdown()">

                        <div id="profileDropdown" class="dropdown-box shadow-sm rounded-3 ff-dana-medium">
                            <a href="../index.php?signOut" class="dropdown-item text-danger">خروج</a>
                        </div>
                    </div>
                </div>

                <div class="container d-flex justify-content-center align-items-center">
                    <div class="main-box mt-4 p-4 rounded-3 shadow-sm bg-white" id="mainBox">
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h5 class="ff-dana-bold text-blue-400 mb-3">📌 آخرین آیتم‌های علاقه‌مندی</h5>
                        <?php
                            $db->orderBy("id","Desc");
                            $favorite_dashboard = $db->getOne("favorites");
                        
                        ?>
                        <?php if(empty($favorite_dashboard)) : ?>
                            <?="  <div class='alert alert-info text-center'>محصولی در لیست علاقه مندی شما وجود ندارد</div>";?>
                            <?php else : ?>
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="../public/images/items/item1.webp"
                                                    class="img-fluid rounded-start" alt="آیتم ۱">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title ff-dana-bold"><?=$favorite_dashboard['name']?></h6>
                                                    <p class="card-text text-body-tertiary ff-dana-medium">افزوده شده به
                                                        علاقه‌مندی‌ها: امروز</p>
                                                    <a href="#"
                                                        class="btn btn-sm bg-blue-400 text-white ff-dana-medium">مشاهده
                                                        جزئیات</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h5 class="ff-dana-bold text-blue-400 mb-3">🛍️ آخرین خریدها</h5>
                                    <!-- <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="../public/images/items/item1.webp"
                                                    class="img-fluid rounded-start" alt="آیتم ۱">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title ff-dana-bold">گوشی اپل مدل آیفون 16</h6>
                                                    <p class="card-text text-body-tertiary ff-dana-medium">تحویل داده
                                                        شده: 3 روز پیش</p>
                                                    <span class="badge text-bg-success ff-dana-medium p-2">تحویل داده
                                                        شده</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="alert alert-info">محصولی خریداری نشد</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container d-flex justify-content-center align-items-center">
                    <div id="profile" class="content-section col-md-12">
                        <h2 class="ff-dana-bold"> مدیریت اطلاعات کاربری</h2>
                        <p class="ff-dana-light">در این بخش می‌توانید اطلاعات خود را ویرایش کنید.</p>
                        <ul class="list-group ff-dana-medium">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                نام: <span><?=$users['name']?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                نام خانوادگی: <span><?=$users['lname']?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                شماره تلفن: <span><?=$users['phone']?></span>
                            </li>
                           
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                تاریخ تولد: <span><?php if((isset($_SESSION['change']) || (!empty($users['date_birth'])))){echo $users['date_birth'];}else{echo"<span class='text-danger'>اطلاعاتی ثبت نشد !!</span>";}?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                آدرس:  <span><?php if((isset($_SESSION['change']) || (!empty($users['address'])))){echo $users['address'];}else{echo"<span class='text-danger'>اطلاعاتی ثبت نشد !!</span>";}?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                شماره حساب: <span> <?php if((isset($_SESSION['change']) || (!empty($users['accountNumber'])))){echo $users['accountNumber'];}else{echo"<span class='text-danger'>اطلاعاتی ثبت نشد !!</span>";}?></span>
                            </li>

                        </ul>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="button" class="btn bg-blue-400 ff-dana-light text-white"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                ویرایش
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 ff-dana-bold" id="staticBackdropLabel">ویرایش
                                                اطلاعات</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ff-dana-medium">
                                       

                           <div class="result_modal"></div>                 
                        <form id="change" >
                            <div class="mb-3">
                                <label for="name" class="form-label">نام</label>
                                <input type="text" class="form-control" id="pname" name ="pname"value="<?=$users['name']?>">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">نام خانوادگی</label>
                                <input type="text" class="form-control" id="lastName" name ="lname" value="<?=$users['lname']?>">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">شماره تلفن</label>
                                <input type="text" class="form-control" id="phone" name ="phone" value="<?=$users['phone']?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">تاریخ تولد</label>
                                <input  data-jdp type="text" class="form-control" id="birthdate"   name="birthdate">
                                
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">آدرس</label>
                                <input type="text" class="form-control" id="address"  name="address">
                            </div>
                            <div class="mb-3">
                                <label for="accountNumber" class="form-label">شماره حساب</label>
                                <input type="text" class="form-control" id="accountNumber"  name="accountNumber">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary ff-dana-medium"
                                    data-bs-dismiss="modal">انصراف</button>
                                <button type="submit" name="change" class="btn bg-blue-400 ff-dana-medium text-white">ثبت
                                    تغییرات</button>
                            </div>
                        </form>
                        </div>

                       </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php
$db->where("user_id", $_GET['person_id']);
$product_bag=$db->get("shop");

?>
                <div id="cart" class="content-section">
                    <h2 class="ff-dana-bold my-4">🛒 سبد خرید شما</h2>
                    <div class="container my-4 ff-dana-medium">
                        <div class="table-responsive">
                            <table class="table custom-table text-center cart-table">
                                <thead>
                                  <tr>
                                    <th>تصویر</th>
                                    <th>نام محصول</th>
                                    <th>توضیحات</th>
                                    <th>تعداد</th>
                                    <th>عملیات</th>
                                  </tr>
                                </thead>
                                <tbody>
               <?php if(count($product_bag) == 0):?>
                <?=" <div class='alert alert-info'> محصولی در سبد خرید شما وجود ندارد</div>"?>
                <?php else : ?>
                    <?php foreach($product_bag as $bag) :  ?>
                      
                                <?php if(empty($bag['deleted_at'])) : ?>

                                  <tr>
                                    <td><img src="../public/images/items/item1.webp" class="product-img" alt="محصول"></td>
                                    <td class="ff-dana-bold"><?=$bag['name']?></td>
                                    <td><?=$bag['tech_screen']?></td>
                                    <td>1</td>
                                    <td>
                                      <a href="#" class="btn btn-info text-white btn-sm">جزییات</a>
                                      <button class="btn btn-danger btn-sm"><a class="text-light" href="../query/delete.php?bag_id=<?=$bag['id']?>">حذف</a></button>
                                    </td>
                                  </tr>

                        <?php endif ?>
                    <?php endforeach ?>
                    <?php endif?>
                       
                                </tbody>
                              </table>
                              
                        </div>
                    </div>
                </div>
             
                
    <?php
        $db->where("user_id" , $_GET['person_id']);
        $favorite_products=$db->get("favorites");

    ?>
                <div id="favorite" class="content-section">
                    <h2 class="ff-dana-bold my-2">📌 لیست علاقه مندی ها </h2>
                    <div class="container my-4 ff-dana-medium">
                        <div class="table-responsive">
                        <table class="table custom-table text-center favorites-table">
                            <thead>
                              <tr>
                                <th>تصویر</th>
                                <th>نام محصول</th>
                                <th>توضیحات</th>
                                <th>عملیات</th>
                              </tr>
                            </thead>
                            <tbody>
                    <?php if(count($favorite_products) <= 0) : ?>
                    <?php echo " <div class='alert alert-info text-center'> محصولی در لیست علاقه مندی شما وجود ندارد</div>" ; ?>
                    <?php else : ?>
                        <?php foreach($favorite_products as $favorite_product) :?>
              
                                <?php if(empty($favorite_product['deleted_at'])) : ?>
                              <tr>
                                <td><img src="../public/images/items/item1.webp" class="product-img" alt="محصول"></td>
                                <td class="ff-dana-bold"><?=$favorite_product['name']?></td>
                                <td><?= "صفحه نمایش  :".$favorite_product['describtion']?></td>
                                <td >
                      <!-- <form  class=" d-flex flex-row align-items-center" method="post">
                      <input type="hidden" name="name" id="name" value="<?=$product['name']?>">
                      <input type="hidden" name="price" id="price" value="<?=$product['price']?>">
                      <input type="hidden" name="tech_screen" id="tech_screen" value="<?=$product['tech_screen']?>"> -->

                      <button class="btn btn-success btn-sm" type="submit" name="addShop">افزودن به سبد</button>
                      <!-- </form> -->
                                  <button class="btn btn-danger btn-sm"><a class="text-light" href="../query/delete.php?favorite_id=<?=$favorite_product['id']?>">حذف</a></button>
                                </td>
                              </tr>
                              <?php endif ?>
                        <?php endforeach ?>
                    <?php endif?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div id="orders" class="content-section">
                    <h2 class="ff-dana-bold my-2"> ✅خریدهای انجام شده </h2>
                    <div class="container my-4 ff-dana-medium">
                        <div class="table-responsive">
                        <table class="table custom-table text-center orders-table">
                            <thead>
                              <tr>
                                <th>تصویر</th>
                                <th>نام محصول</th>
                                <th>تعداد</th>
                                <th>مبلغ کل</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- <tr>
                                <td><img src="../public/images/items/item1.webp" class="product-img" alt="محصول"></td>
                                <td class="ff-dana-bold">محصول ۳</td>
                                <td>2</td>
                                <td>۲۵,۰۰۰,۰۰۰ تومان</td>
                                <td>۱۴۰۳/۰۱/۲۰</td>
                                <td><span class="badge bg-success">پرداخت شده</span></td>
                              </tr> -->
                              <div class="alert alert-info text-center">محصولی خریداری نشد</div>
                            </tbody>
                          </table>
                        </div> 
                    </div>
                </div>
                <div id="comments" class="content-section">
                    <h2 class="ff-dana-bold"> 💬نظرات</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4 ff-dana-medium text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">متن نظر</th>
                                    <th scope="col">کالا</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(count($comments)<=0):?>
                               
                                <?= " <div class='alert alert-info text-center'>نظری ارسال نشد </div>"?>
                                <?php else : ?>
                                    <?php $row= 1?>
                                    <?php foreach($comments as $comment) : ?>
                                        <?php
                                            $db->where('id' , $comment['product_id'] );
                                            $productName  = $db->get("proudacts");?>

                                            <?php if(!empty($comment['deleted_at']) && count($comment) >= 1 ) : ?>
                                                <?= " <div class='alert alert-info text-center'>نظری ارسال نشد</div>" ?>
                                       <?php elseif(empty($comment['deleted_at'])) : ?>
                                            <tr>
                                                <th scope="row"><?=$row++?></th>
                                                <td><?=$comment['comment']?></td>
                                                <td><?php foreach($productName as $product){
                                                    echo $product['name'];
                                                    }?></td>
                                                <td><?=$comment['created_at']?></td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editCommentModal">
                                                        <i class="fas fa-edit"></i> ویرایش
                                                    </button>
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i><a class="text-light" href="../query/delete.php?comment_id=<?=$comment['id']?>">حذف </a></button>
                                                </td>
                                            </tr>
                                           
                                        <?php endif?>
                               <?php endforeach ?>
                               <?php endif?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="content-section">
                <h2 class="ff-dana-bold"> برگشت به صفحه اصلی</h2>
                </div>
              
               
                   

                <!-- Modal ویرایش نظر -->
                <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ff-dana-medium">
                            <div class="modal-header">
                                <h5 class="modal-title ff-dana-bold" id="editCommentModalLabel">ویرایش نظر</h5>
                                <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal"
                                    aria-label="بستن"></button>
                            </div>
                            <form method="post">
                                     <div class="modal-body">
                             
                                    <textarea id="correction-text" name="correction-text" class="form-control" rows="4"
                                            placeholder="متن جدید نظر را وارد کنید..."></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                        <button type="submit"  class="btn btn-primary">ذخیره</button>
                               
                                     </div>
                            </form>
                            <?php
                    if(isset($_POST['correction-text'])){
                    }if(empty($_POST['correction-text'])){
                        echo"<div class='alert alert-warning'>لطفا فیلد مورد نظر را خالی نگذارید</div>";
                    }else{
                     
                        $db->update("comments",$_POSt['correction-text']);
                        echo"<div class='alert alert-success'>عملیات با موفقیت انجام شد</div>";
                    
                    }
                    
                 
                    ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Alert -->
    <div id="welcome-alert"
        class="alert alert-info text-center position-fixed top-0 start-50 translate-middle-x w-50 ff-dana-bold"
        role="alert" style="display: none; z-index: 1050;">
        <?=$_SESSION['name']." ".$_SESSION['lname']?>👋 به پنل کاربری خود خوش آمدید !
    </div>
  
   <?php include "../user-dash/layout/script.php"?>
   <?php include "../layout/script.php"?>
   
 

   <script>
  $(document).ready(function () {
    $("#change").submit(function (e) { 
        e.preventDefault();
       let pname = $("#pname").val();
       let lname = $("#lastName").val();
       let phone = $("#phone").val();
       let birthdate = $("#birthdate").val();
       let address = $("#address").val();
       let accountNumber = $("#accountNumber").val();
       $.ajax({
        method: "post",
        url: "query/edit_prof.php",
        data: {
            pname : pname,
            lname : lname,
            phone : phone,
            birthdate : birthdate,
            address : address,
            accountNumber : accountNumber
        },
    
        success: function (response) {
            $(".result_modal").html(response);
            
        },
        error : function(){
            console.log(error);
        }
       });
        
    });
        
  
  });

   </script>
   
</body>

</html>



