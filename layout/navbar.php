<?php

if(isset($_GET['signOut'])){
    session_destroy();
    echo"<script>window.location.href='index.php';</script>;";
 
}


?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm z-2">
        <div class="container-fluid">
            <a class="navbar-brand ff-soofee ms-4 text-blue fs-4" href="#">فروشگاه</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ff-dana-medium">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">صفحه اصلی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?#categories">دسته بندی ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?#faq">سوالات متداول</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?#about">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#contactus" class="nav-link"
                            href="#">تماس با ما</button>

                    </li>
                    <li class="nav-item">
                        <?php if(!isset($_SESSION['auth'] )) :?>
                        <?php else :?>
                            <a class="nav-link" href="cart.php?person_id=<?=$_SESSION['id']?>">سبد خرید</a>
                            <?php endif?>
                    </li>
                </ul>
                <div class="nav-btn-div d-flex align-items-center gap-2">
                    <?php if(isset($_SESSION['auth'])) : ?>
                    <div class="dropdown">
                        <a href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="public/images/Profile-PNG-File.png" class="pro-img" alt="pro-img">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start text-end" aria-labelledby="profileDropdown">
                           <li><a class="dropdown-item ff-dana-regular" href="user-dash/user-dash.php?person_id=<?=$_SESSION['id']?>">پنل کاربری</a></li>
                            <li><a class="dropdown-item ff-dana-medium" href="index.php?signOut">خروج</a></li>
                        </ul>
                        <?php else : ?>
                        
                    </div>
                    <a href="#" class="btn btn-fa btn-fa-blue" data-bs-toggle="modal" data-bs-target="#loginModal">ورود</a>
                    <a href="#" class="btn btn-fa btn-fa-white" data-bs-toggle="modal" data-bs-target="#registerModal">ثبت نام</a>
                </div>
            </div>
        </div>
        <?php endif?>
    </nav>
    
    <!-- user-dash/user-dash.php -->