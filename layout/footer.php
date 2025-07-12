<?php $settings = $db->get("setting");?>
<?php $socials = $db->get("socials");?>

<footer class="mt-5">
        <div class="container-fluid">
            <div class="row align-items-end">
                <?php foreach($settings as $setting) : ?>
                <div class="col-12 col-lg-4 bg-200 px-5 pt-5 pb-3">
                    <a class="text-decoration-none ff-soofee mb-5 text-color-950 fs-1" href="#"><?=$setting['logo']?></a>
                    <p class="mt-2 ff-dana-medium">آدرس: <span class="fw-medium text-color-700">  
                      <?=$setting['address']?>                                  </span></p>
                    <p class="mt-2 ff-dana-medium">شماره تلفن: <a href="tel:<?=$setting['phone']?>"
                            class="fw-medium text-decoration-none text-color-700"><?=$setting['phone']?></a></p>
                    <div class="w-25 bg-100 d-flex align-items-center justify-content-center rounded-4 p-2"><img
                            src="public/images/enamad.png" alt="enamad" class="img-fluid"></div>
                </div>
                <?php endforeach ?>
                <div class="col-12 col-lg-8 bg-100 p-0 pt-2 h-50 d-flex flex-column align-items-center">
                    <ul class="row mw-100 border-bottom border-1 p-3 text-center">
                        <li class="d-inline-block col-12 col-md-12"><a href="index.php"
                                class="text-decoration-none text-color-700 px-3 py-1 mx-2 rounded-3 bg-200 ff-dana-medium">صفحه
                                اصلی</a>
                        </li>
                        <li class="d-inline-block col-12 col-md-6"><a href="index.php?#categories"
                                class="text-decoration-none text-color-700 px-3 py-1 mx-2 rounded-3 ff-dana-medium">دسته
                                بندی ها</a></li>
                        <li class="d-inline-block col-12 col-md-6"><a href="index.php?#faq"
                                class="text-decoration-none text-color-700 px-3 py-1 mx-2 rounded-3 ff-dana-medium">سوالات
                                متداول</a></li>
                        <li class="d-inline-block col-12 col-md-6"><a href="#"
                                class="text-decoration-none text-color-700 px-3 py-1 mx-2 rounded-3 ff-dana-medium">تماس
                                با ما</a></li>
                        <li class="d-inline-block col-12 col-md-6"><a href="index.php?#about"
                                class="text-decoration-none text-color-700 px-3 py-1 mx-2 rounded-3 ff-dana-medium">درباره
                                ما</a></li>
                    </ul>
                    <h3 class="fs-4 ff-dana-bold text-color-800 mb-3">شبکه های اجتماعی فروشگاه </h3>
                    <div class="d-flex pb-3">
                        <?php foreach($socials as $social): ?>
                      <a href="<?=$social['url']?>"
                            class="footer-icon-link d-flex justify-content-center align-items-center mx-1 rounded-5 border border-1 border-secondary-subtle">
                            <i class="bi <?=$social['icon']?>"></i></a>
                       <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>