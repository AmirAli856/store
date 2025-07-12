<?php
 require_once ('../config/config.php');
 session_start();
include "./layout/header.php";
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
            <a class="nav-link active" href="#" data-target="chart" onclick="showContent('chart')">
              <i class="bi bi-graph-up fs-5 me-2"></i> نمودار بازدید سایت
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin-products.php?person_id=<?=$_SESSION['id']?>" data-target="products" onclick="showContent('products')">
              <i class="bi bi-box-seam fs-5 me-2"></i> مدیریت محصولات
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin-users.php?person_id=<?=$_SESSION['id']?>" data-target="users" onclick="showContent('users')">
              <i class="bi bi-people fs-5 me-2"></i> مدیریت کاربران
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#" data-target="comments" onclick="showContent('comments')">
              <i class="bi bi-chat-dots fs-5 me-2"></i> مدیریت نظرات
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#" data-target="categories" onclick="showContent('categories')">
              <i class="bi bi-tags fs-5 me-2"></i> مدیریت دسته‌بندی‌ها
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#" data-target="faq" onclick="showContent('faq')">
              <i class="bi bi-question-circle fs-5 me-2"></i> مدیریت سوالات متداول
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#" data-target="orders" onclick="showContent('orders')">
              <i class="bi bi-basket fs-5 me-2"></i> لیست خرید
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#" data-target="income" onclick="showContent('income')">
              <i class="bi bi-cash-stack fs-5 me-2"></i> بخش درآمد
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

          <div id="chart" class="content-section col-9 mx-auto">
            <canvas id="myChart"></canvas>
            <div class="text-center mt-5">
              <button id="download-pdf" class="btn bg-blue-400 ff-dana-medium text-white mx-1">خروجی PDF</button>
              <button id="download-excel" class="btn bg-blue-400 ff-dana-medium text-white mx-1">خروجی Excel</button>
            </div>
          </div>
          <div id="products" class="content-section">
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
                    <tr>
                      <td>1</td>
                      <td>گوشی اپل مدل آیفون 16</td>
                      <td>116</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemDescription">نمایش توضیحات</button></td>
                      <td>100</td>
                      <td class=""><span class="badge bg-success">فعال</span> <span class="badge bg-danger">غیر
                          فعال</span></td>
                      <td>
                        <button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemEdit">ویرایش</button>
                        <button class="btn btn-fa btn-fa-blue">حذف</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>گوشی اپل مدل آیفون 16</td>
                      <td>116</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemDescription">نمایش توضیحات</button></td>
                      <td>100</td>
                      <td class=""><span class="badge bg-success">فعال</span> <span class="badge bg-danger">غیر
                          فعال</span></td>
                      <td>
                        <button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemEdit">ویرایش</button>
                        <button class="btn btn-fa btn-fa-blue">حذف</button>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>گوشی اپل مدل آیفون 16</td>
                      <td>116</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemDescription">نمایش توضیحات</button></td>
                      <td>100</td>
                      <td class=""><span class="badge bg-success">فعال</span> <span class="badge bg-danger">غیر
                          فعال</span></td>
                      <td>
                        <button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#productItemEdit">ویرایش</button>
                        <button class="btn btn-fa btn-fa-blue">حذف</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="users" class="content-section">
            <div class="row">
              <div class="table-responsive ff-dana-medium">
                <table id="usersTable" class="display table">
                  <thead>
                    <tr>
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
                    <tr>
                      <td>1</td>
                      <td>محمدجواد</td>
                      <td>عیلزاده</td>
                      <td>09123456789</td>
                      <td>00/00/0000</td>
                      <td>مازندران - ساری</td>
                      <td>0000000000000000</td>
                      <td><button class="btn btn-fa btn-fa-white">ویرایش</button>
                        <button class="btn btn-fa btn-fa-blue">حذف</button>
                        <button class="btn btn-fa btn-fa-blue">بلاک</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="comments" class="content-section">
            <div class="row">
              <div class="table-responsive ff-dana-medium">
                <table id="commentsTable" class="display table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>نام کاربر</th>
                      <th>متن نظر</th>
                      <th>محصول</th>
                      <th>تاریخ ثبت</th>
                      <th>فعالیت</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>محمدجواد علیزاده</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#commentShow">نمایش نظر</button></td>
                      <td>گوشی اپل مدل آیفون 16</td>
                      <td>1404/01/11 - 00:00:00</td>
                      <td><button class="btn btn-fa btn-fa-white">حذف</button>
                        <button class="btn btn-fa btn-fa-blue">تایید</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="categories" class="content-section">
            <div class="row">
              <div class="table-responsive ff-dana-medium">
                <table id="categoriesTable" class="display table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>نام دسته بندی</th>
                      <th>عکس دسته بندی</th>
                      <th>وضعیت</th>
                      <th>فعالیت</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>موبایل</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#categoryImage">نمایش عکس</button></td>
                      <td class=""><span class="badge bg-success">فعال</span> <span class="badge bg-danger">غیر
                          فعال</span></td>
                      <td>
                        <button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#categoryItemEdit">ویرایش</button>
                        <button class="btn btn-fa btn-fa-blue">حذف</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="faq" class="content-section">
            <div class="row">
              <div class="table-responsive ff-dana-medium">
                <table id="faqTable" class="display table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>سوال</th>
                      <th>پاسخ</th>
                      <th>وضعیت</th>
                      <th>فعالیت</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>تست</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#faqAnswer">نمایش پاسخ</button></td>
                      <td class=""><span class="badge bg-success">فعال</span> <span class="badge bg-danger">غیر
                          فعال</span></td>
                      <td>
                        <button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#faqItemEdit">ویرایش</button>
                        <button class="btn btn-fa btn-fa-blue">حذف</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="orders" class="content-section">
            <div class="row">
              <div class="table-responsive ff-dana-medium">
                <table id="orderTable" class="display table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>نام کالا</th>
                      <th>عکس کالا</th>
                      <th>مشخصات کالا</th>
                      <th>وضعیت</th>
                      <th>قیمت</th>
                      <th>خریدار</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>گوشی موبایل اپل مدل آیفون 16</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#categoryImage">نمایش عکس</button></td>
                      <td><button class="btn btn-fa btn-fa-blue">جزییات بیشتر</button></td>
                      <td class=""><span class="badge bg-success">فروخته شده</span> <span
                          class="badge bg-danger">مرجوعی</span></td>
                      <td>1.200.000 تومان</td>
                      <td>مهدی قاسمی</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>گوشی موبایل اپل مدل آیفون 16</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#categoryImage">نمایش عکس</button></td>
                      <td><button class="btn btn-fa btn-fa-blue">جزییات بیشتر</button></td>
                      <td class=""><span class="badge bg-success">فروخته شده</span> <span
                          class="badge bg-danger">مرجوعی</span></td>
                      <td>1.200.000 تومان</td>
                      <td>مهدی قاسمی</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>گوشی موبایل اپل مدل آیفون 16</td>
                      <td><button class="btn btn-fa btn-fa-white" data-bs-toggle="modal"
                          data-bs-target="#categoryImage">نمایش عکس</button></td>
                      <td><button class="btn btn-fa btn-fa-blue">جزییات بیشتر</button></td>
                      <td class=""><span class="badge bg-success">فروخته شده</span> <span
                          class="badge bg-danger">مرجوعی</span></td>
                      <td>1.200.000 تومان</td>
                      <td>مهدی قاسمی</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="income" class="content-section">
            <div class="row">
              <div class="col-12 col-md-6">
                <div>
                  <canvas id="incomeChart" width="100%" height="360"
                    style="display: block; box-sizing: border-box; height: 360px; width: 100%;"></canvas>
                </div>
                <div class="text-center">
                  <p class="fs-3 fw-bold mb-2">1000</p>
                  <p class="fs-5 fw-semibold">میزان فروش در ماه گذشته</p>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div>
                  <canvas id="salesCountChart" width="100%" height="360"
                    style="display: block; box-sizing: border-box; height: 360px; width: 100%;"></canvas>
                </div>
                <div class="text-center">
                  <p class="fs-3 fw-bold mb-2">1,000,000</p>
                  <p class="fs-5 fw-semibold">میزان درآمد در ماه گذشته</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>


  <!-- Modal -->
  <!-- Products -->
  <!-- Product edit -->
  <div class="modal fade" id="productItemEdit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">ویرایش گوشی اپل مدل آیفون 16</span>
          <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="productName" class="form-label">نام محصول</label>
              <input type="text" class="form-control" id="productName">
            </div>
            <div class="mb-3">
              <label for="productCode" class="form-label">کد محصول</label>
              <input type="text" class="form-control" id="productCode">
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">توضیخات محصول</label>
              <textarea class="form-control" id="productDescription"></textarea>
            </div>
            <div class="mb-3">
              <label for="productCount" class="form-label">تعداد موجود</label>
              <input type="text" class="form-control" id="productCount">
            </div>
            <div class="mb-3">
              <label for="productStatus" class="form-label">وضعیت</label>
              <select id="productStatus" class="form-select">
                <option value="enable">فعال</option>
                <option value="disable">غیر فعال</option>
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
          <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای
            متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
            جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی،
            و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
            راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات
            پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-fa btn-fa-white w-100" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Comment -->
  <!-- Comment show -->
  <div class="modal fade" id="commentShow" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">نظر محمدجواد علیزاده</span>
        </div>
        <div class="modal-body">
          <p<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
            </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-fa btn-fa-white w-100" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Categories -->
  <!-- category edit -->
  <div class="modal fade" id="categoryItemEdit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">ویرایش دسته بندی</span>
          <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="categoryName" class="form-label">نام دسته بندی</label>
              <input type="text" class="form-control" id="categoryName">
            </div>
            <div class="mb-3">
              <label for="categoryImageInput" class="form-label">انتخاب عکس دسته بندی</label>
              <input class="form-control" type="file" id="categoryImageInput">
            </div>
            <div class="mb-3">
              <label for="categoryStatus" class="form-label">وضعیت</label>
              <select id="categoryStatus" class="form-select">
                <option value="enable">فعال</option>
                <option value="disable">غیر فعال</option>
              </select>
            </div>
            <button type="submit" class="btn btn-fa btn-fa-blue w-100">ثبت تغییرات</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Category image -->
  <div class="modal fade" id="categoryImage" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">موبایل</span>
        </div>
        <div class="modal-body">
          <img src="public/images/User-Profile-PNG-Image.png" alt="موبایل" class="img-fluid rounded-3">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-fa btn-fa-white w-100" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Faq -->
  <!-- Faq edit -->
  <div class="modal fade" id="faqItemEdit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">ویرایش سوال</span>
          <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="categoryName" class="form-label">سوال</label>
              <input type="text" class="form-control" id="categoryName">
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">پاسخ</label>
              <textarea class="form-control" id="productDescription"></textarea>
            </div>
            <div class="mb-3">
              <label for="categoryStatus" class="form-label">وضعیت</label>
              <select id="categoryStatus" class="form-select">
                <option value="enable">فعال</option>
                <option value="disable">غیر فعال</option>
              </select>
            </div>
            <button type="submit" class="btn btn-fa btn-fa-blue w-100">ثبت تغییرات</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Faq answer -->
  <div class="modal fade" id="faqAnswer" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <span class="modal-title h-5">سوال تست</span>
        </div>
        <div class="modal-body">
          <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای
            متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
            جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی،
            و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
            راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات
            پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-fa btn-fa-white w-100" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Alert -->
  <div id="welcome-alert"
    class="alert alert-info text-center position-fixed top-0 start-50 translate-middle-x w-50 ff-dana-bold" role="alert"
    style="display: none; z-index: 1050;">
    👋 به پنل مدیریت خود خوش آمدید !
  </div>

  <?php include "./layout/script.php" ?>

</body>

</html>