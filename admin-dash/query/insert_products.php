<?php
require_once ('../../config/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // اعتبارسنجی اولیه
    if (empty($_POST['productName'])) {
        echo "<div class='alert alert-danger'>فیلد نام را پر کنید</div>";
    } elseif (empty($_POST['productCode'])) {
        echo "<div class='alert alert-danger'>فیلد کد را پر کنید</div>";
    } elseif (empty($_POST['productDescription'])) {
        echo "<div class='alert alert-danger'>فیلد توضیحات را پر کنید</div>";
    } elseif (empty($_POST['productCount'])) {
        echo "<div class='alert alert-danger'>تعداد محصول را وارد کنید</div>";
    } elseif (empty($_POST['productStatus'])) {
        echo "<div class='alert alert-danger'>وضعیت را معلوم کنید</div>";
    } elseif (empty($_POST['productSize']) || empty($_POST['productScreen']) || empty($_POST['productPrice'])) {
        echo "<div class='alert alert-danger'>فیلد ها را پر کنید</div>";
    } else {

        // بررسی و آپلود تصویر
        $imagePath = '';
        if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == UPLOAD_ERR_OK) {
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif','jfif'];
            $ext = pathinfo($_FILES['productImage']['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);

            if (in_array($ext, $allowedTypes)) {
                $newFileName = uniqid() . "." . $ext;
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/store-2/uploadfile/products/";
                $uploadPath = $uploadDir . $newFileName;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true); // ساخت پوشه اگر وجود نداشته باشد
                }

                if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadPath)) {
                    $imagePath = "/uploadfile/products/" . $newFileName;
                } else {
                    echo "<div class='alert'>آپلود فایل ناموفق بود</div>";
                    exit;
                }

            } else {
                echo "<div class='alert'>فرمت فایل مجاز نیست</div>";
                exit;
            }
        }

        // آماده‌سازی داده‌ها
        $product_data = [
            "product_code" => $_POST['productCode'],
            "name" => $_POST['productName'],
            "price" => $_POST['productPrice'],
            "describtion" => $_POST['productDescription'],
            "count" => $_POST['productCount'],
            "os" => $_POST['productOs'],
            "camera" => $_POST['productCamera'],
            "tech_screen" => $_POST['productScreen'],
            "image" => $imagePath,
            "size" => $_POST['productSize'],
            "status" => $_POST['productStatus'],
            "category_id" => $_POST['category_id']
        ];

        // ذخیره در دیتابیس
        $inserted = $db->insert('proudacts', $product_data);

        if ($inserted) {
          
 ?>
<script>
    Toastify({
  text: "ثبت محصول با موفقیت انجام شد",
  duration: 1000,
//   destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();
setTimeout(() => {
    location.reload();
}, 1500);
</script>

<?php
        } else {
          ?>
<script>
    Toastify({
  text: "خطا در ذخیره‌سازی محصول",
  duration: 2000,
//   destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right,rgb(215, 63, 8),rgb(226, 140, 29))",
  },
  onClick: function(){} // Callback after click
}).showToast();

</script>


<?php
        }
    }
}
?>
<?php


