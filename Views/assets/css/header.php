<?php
session_start();
?>
<div class="header scrolling" id="myHeader">
    <div class="grid wide">
        <div class="header__top">
            <div class="navbar-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="user_homepage.html" class="header__logo">
                <img src="../Views/assets/logo.png" alt="">
            </a>
            <form action="/index.php?controller=course" method="post" style="width: 600px" id='viewFormLogout123'>
                <div class="header__search">
                    <div class="header__search-wrap">
                        <input hidden="true" type="text" name="method" value="course_name_filter" class="form-control" id="method">
                        <input type="text" class="header__search-input" name="course_filter" placeholder="Tìm kiếm">
                        <a onclick="document.getElementById('viewFormLogout123').submit(); return false" class="header__search-icon" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                <button hidden="true" type="submit"></button>
            </form>
            <?php
            $user = $_SESSION["user"];
            if ($user instanceof UserModel) {
                echo
                "<div class='header__account'>
                        <a href='login.html' class='header__account-login'>Xin chào " . $user->getUserName() . "</a>
                        <form action='/index.php?controller=login' method='post' id='viewFormLogout'>
                            <input hidden='true' type='text' name='method' value='logout' class='form-control'>
                            <a style='font-size: medium;' href='' onclick='document.getElementById(\"viewFormLogout\").submit(); return false'>Đăng xuất</a>
                        </form>
                    </div>";
            } else {
                echo
                '<div class="header__account">
                        <form action="/index" method="get" id="viewFormLogout">
                            <input hidden="true" type="text" name="controller" value="login" class="form-control">
                            <a style="font-size: medium;" href="" onclick="document.getElementById(\'viewFormLogout\').submit(); return false">Đăng nhập</a>
                        </form>
                        <p style="font-size: large">&nbsp | &nbsp</p>
                        <form action="/index" method="get" id="viewFormLogout1">
                            <input hidden="true" type="text" name="controller" value="register" class="form-control">
                            <a style="font-size: medium;" href="" onclick="document.getElementById(\'viewFormLogout1\').submit(); return false">Đăng kí</a>
                        </form>
                    </div>';
            }
            ?>
            <!-- Cart -->

        </div>
    </div>
    <!-- Menu -->
    <div class="header__nav">
        <ul class="header__nav-list">
            <li class="header__nav-item nav__search">
                <div class="nav__search-wrap">
                    <input class="nav__search-input" type="text" name="" id="" placeholder="Tìm sản phẩm...">
                </div>
                <div class="nav__search-btn">
                    <i class="fas fa-search"></i>
                </div>
            </li>
            <li class="header__nav-item authen-form">
                <a href="#" class="header__nav-link">Tài Khoản</a>
                <ul class="sub-nav">
                    <li class="sub-nav__item">
                        <a href="login.html" class="sub-nav__link">Đăng Nhập</a>
                    </li>
                    <li class="sub-nav__item">
                        <a href="login.html" class="sub-nav__link">Đăng Kí</a>
                    </li>
                </ul>
            </li>
            <li class="header__nav-item index">
                <a href="/index?controller=home" class="header__nav-link">Trang chủ</a>
            </li>
            <li class="header__nav-item">
                <a href="/Views/user_about.php" class="header__nav-link">Giới Thiệu</a>
            </li>
            <li class="header__nav-item">
                <a href="/index?controller=course" class="header__nav-link">Khóa học</a>
                
            </li>

            <li class="header__nav-item">
                <a href="/Views/user_contact.php" class="header__nav-link">Liên Hệ</a>
            </li>
        </ul>
    </div>
</div>