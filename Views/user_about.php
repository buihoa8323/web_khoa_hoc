<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- https://cocoshop.vn/ -->
<!-- http://mauweb.monamedia.net/vanihome/ -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>
    <!-- Font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icon fontanwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Reset css & grid sytem -->
    <link rel="stylesheet" href="./assets/css/library.css">
    <!-- Owl Slider css -->
    <link rel="stylesheet" href="assets/owlCarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlCarousel/assets/owl.theme.default.min.css">
    <!-- Layout -->
    <link rel="stylesheet" href="./assets/css/common.css">
    <!-- index -->
    <link rel="stylesheet" type="text/css" href="./assets/css/contact.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl caroucel Js-->
    <script src="assets/owlCarousel/owl.carousel.min.js"></script>

    <link rel="stylesheet" href="./assets/css/about.css">
</head>

<body>
    <?php
        require('header.php');
    ?>
    <div class="main">
        <div class="grid wide">
            <div class="main__breadcrumb">
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">Trang chủ</a>
                </div>
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">Giới thiệu</a>
                </div>
            </div>

            <div class="content_about">
                <p class="content_about">Chào mừng bạn đến với trang web của chúng tôi - nơi tuyệt vời để trải nghiệm và mở rộng kiến thức của bạn thông qua những khóa học online chất lượng. Chúng tôi tự hào là đối tác học tập của bạn, cung cấp một môi trường học tập linh hoạt, tiện lợi và chất lượng.</p>

                <h3 class="title_about">Giới thiệu</h3>
                <p class="content_about"> Five Study là một nền tảng cung cấp khóa học trực tuyến chất lượng cao, được xây dựng bởi đội ngũ chuyên gia giàu kinh nghiệm trong lĩnh vực giáo dục. Chúng tôi cam kết mang đến cho người học những khóa học chất lượng cao, với nội dung cập nhật, giảng viên uy tín, và mức học phí hợp lý.</p>
                <iframe width="1120" height="630" src="https://www.youtube.com/embed/TkZgf9ce0Jw?si=mq9H0VvvQUi9vxV1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h3 class="title_about">Sứ mệnh</h3>
                <p class="content_about">Sứ mệnh của chúng tôi là mang lại môi trường học tập linh hoạt và chất lượng cho mọi người trên khắp đất nước.</p>

                <h3 class="title_about">Tầm nhìn</h3>
                <p class="content_about">Chúng tôi hướng đến một tương lai nơi mọi học sinh cấp 3 có thể truy cập nguồn kiến thức chất lượng mọi lúc, mọi nơi. Five Study mong muốn trở thành điểm đến hàng đầu, nơi học sinh không chỉ học mà còn phát triển sự hiểu biết vững về bản thân và khám phá đam mê của mình.</p>

                <h3 class="title_about">Sản phẩm</h3>
                <p class="content_about">Chúng tôi cung cấp các khóa học cho học sinh cấp 3 với những đội ngũ giáo viên hàng đầu có trình độ cao và nhiều năm kinh nghiệm trong nghề. Các khóa học cung cấp đa dạng và đầy đủ các môn: Toán, Văn, Anh, Lý, Hóa, Sinh, Sử, Địa</p>

                <h3 class="title_about">Nhà sáng lập</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <img src="./assets/img/founder/huy.png" alt="Image 1">
                        <p class="founder">Nguyễn Ngọc Huy</p>
                    </div>
                    <div class="image-wrapper">
                        <img src="./assets/img/founder/hien.png" alt="Image 2">
                        <p class="founder">Nguyễn Thị Hiên</p>
                    </div>
                    <div class="image-wrapper">
                        <img src="./assets/img/founder/hoa.png" alt="Image 3">
                        <p class="founder">Bùi Thị Hồng Hoa</p>
                    </div>
                    <div class="image-wrapper">
                        <img src="./assets/img/founder/huyen.png" alt="Image 4">
                        <p class="founder">Nguyễn Thị Mỹ Huyền</p>
                    </div>
                    <div class="image-wrapper">
                        <img src="./assets/img/founder/trung.png" alt="Image 5">
                        <p class="founder">Thân Quang Trung</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>
    <div class="footer">
        <div class="grid wide">
            <div class="row">
                <div class="col l-3 m-6 s-12">
                    <a href="user_homepage.html" class="header__logo">
                        <img src="./assets/logoamban.png" alt="">
                    </a>
                    <h3 class="footer__slogan">Five Study - Nâng tầm tri thức</h3>
                </div>
                <div class="col l-3 m-6 s-12">
                    <h3 class="footer__title">Menu</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="user_homepage.html" class="footer__link">Trang chủ</a>
                        </li>
                        <li class="footer__item">
                            <a href="user_about.html" class="footer__link">Giới thiệu</a>
                        </li>
                        <li class="footer__item">
                            <a href="user_listProduct.html" class="footer__link">Khóa học</a>
                        </li>

                        <li class="footer__item">
                            <a href="contact.html" class="footer__link">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="col l-3 m-6 s-12">
                    <h3 class="footer__title">Liên hệ</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <span class="footer__text">
                                <i class="fas fa-map-marked-alt"></i> 79 Hồ Tùng Mậu, Cầu Giấy, Hà Nội
                            </span>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">
                                <i class="fas fa-phone"></i> 0123 456 789
                            </a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">
                                <i class="fas fa-envelope"></i> nhom5@gmail.com
                            </a>
                        </li>
                        <li class="footer__item">
                            <div class="social-group">
                                <a href="https://www.facebook.com/thuongmaiuniversity" class="social-item"><i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/thuongmaiuniversity/" class="social-item"><i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://twitter.com/ThuongmaiU" class="social-item"><i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.youtube.com/@ThuongmaiUniversityOfficial" class="social-item"><i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col l-3 m-6 s-12">
                    <h3 class="footer__title">Đăng kí</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <span class="footer__text">Đăng ký để nhận được được thông tin ưu đãi mới nhất từ chúng tôi.</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <span class="footer__text"> &copy Bản quyền thuộc về <a class="footer__link" href="#"> Nhóm 5</a></span>
        </div>
    </div>
    <!-- Modal Form -->

    <!-- Sccipt for owl caroucel -->

    <!-- Script common -->
    <script src="./assets/js/commonscript.js"></script>
</body>

</html>