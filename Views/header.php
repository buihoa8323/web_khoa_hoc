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
                <div class="header__search">
                    <div class="header__search-wrap">
                        <input type="text" class="header__search-input" placeholder="Tìm kiếm">
                        <a class="header__search-icon" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                <?php 
                $user = $_SESSION["user"];
                if($user instanceof UserModel){
                    echo 
                    "<div class='header__account'>
                        <a href='login.html' class='header__account-login'>Xin chào ".$user->getUserName()."</a>
                        <form action='/index.php?controller=login' method='post' id='viewFormLogout'>
                            <input hidden='true' type='text' name='method' value='logout' class='form-control'>
                            <a style='font-size: medium;' href='' onclick='document.getElementById(\"viewFormLogout\").submit(); return false'>Đăng xuất</a>
                        </form>
                    </div>";
                }else{
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
                    <a href="/Views/user_homepage.php" class="header__nav-link">Trang chủ</a>
                </li>
                <li class="header__nav-item">
                    <a href="/Views/user_about.php" class="header__nav-link">Giới Thiệu</a>
                </li>
                <li class="header__nav-item">
                    <a href="/index?controller=course" class="header__nav-link">Khóa học</a>
                    <div class="sub-nav-wrap grid wide">
                        <ul class="sub-nav">
                            <li class="sub-nav__item">
                                <a href="" class="sub-nav__link heading">Lớp</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Lớp 10</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Lớp 11</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Lớp 12</a>
                            </li>
                           
                        </ul>
                        <ul class="sub-nav">
                            <li class="sub-nav__item">
                                <a href="" class="sub-nav__link heading">Môn học</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Toán học</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Ngữ Văn</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Tiếng Anh</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Vật Lý</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Hóa Học</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Sinh Học</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Lịch Sử</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Địa Lý</a>
                            </li>
                        </ul>
                        <ul class="sub-nav">
                            <li class="sub-nav__item">
                                <a href="" class="sub-nav__link heading">Giáo Viên</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Thầy Lê Văn Tuấn</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Cô Lệ Quyên</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Cô Trang Anh</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Thầy Lại Đắc Hợp</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Thầy Đặng Duy Hữu</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Thầy Phan Khắc Nghệ</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Thầy Bùi Hữu Bến</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="user_listFilter.html" class="sub-nav__link">Cô Hồng Thúy</a>
                            </li>
                        </ul>
                     
                    </div>
                </li>
               
                <li class="header__nav-item">
                    <a href="/Views/user_contact.php" class="header__nav-link">Liên Hệ</a>
                </li>
            </ul>
        </div>
    </div>
