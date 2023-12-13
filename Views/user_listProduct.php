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
    <title>Khóa học</title>
    <!-- Font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icon fontanwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Reset css & grid sytem -->
    <link rel="stylesheet" href="../Views/assets/css/library.css">
    <!-- Layout -->
    <link rel="stylesheet" href="../Views/assets/css/common.css">
    <!-- index -->
    <link rel="stylesheet" type="text/css" href="../Views/assets/css/product.css">
    <link rel="stylesheet" type="text/css" href="../Views/assets/css/productSale.css">

</head>

<body>

    <?php 
        require('header.php');
    ?>

    <div class="main">
        <div class="grid wide">
            <div class="main__taskbar">
                <div class="main__breadcrumb">
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Trang chủ</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Khóa học</a>
                    </div>
                   
                </div>
                <!-- <div class="main__sort">
                    <h3 class="sort__title">
                        Hiển thị kết quả theo
                    </h3>
                    <select class="sort__select"> name="" id="">
                        <option value="1">Thứ tự mặc định</option>
                        <option value="2">Mức độ phổ biến</option>
                        
                        <option value="4">Mới cập nhật</option>
                        <option value="5">Giá : Cao đến thấp</option>
                        <option value="6">Giá : Thấp đến cao</option>
                    </select>
                </div> -->
            </div>
            <div class="productList">
                <div class="listProduct">
                            <div class="row">

                                <?php
                                    // In your view (user_listProduct.php)
                                    foreach ($data["course_list"] as $course) {
                                        if($course instanceof CourseModel){
                                            echo 
                                            '<div class="col l-2 m-4 s-6">
                                                <div class="product">
                                                    <div class="product__avt" style="background-image: url('.$course->getCourseImage().');">
                                                    </div>
                                                    <div class="product__info">
                                                        <h3 class="product__name">'.$course->getCourseName().'</h3>
                                                        <h3 class="teacher__name">'.$course->getTeacherName().'</h3>
                                                        <div class="product__price">
                                                        
                                                            <div class="price__new">'.$course->getCoursePrice().' <span class="price__unit">đ</span></div>
                                                        </div>
                                                    </div>
                                                    <a href="/index?controller=courseDetail&course_id='.$course->getCourseId().'" class="viewDetail">Xem chi tiết</a>
                                                </div>
                                            </div>';
                                        }
                                    }
                                ?>

                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product1.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Đại Số 10</h3>
                                            <h3 class="teacher__name">Thầy Lê Văn Tuấn</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new">210.000 <span class="price__unit">đ</span></div>
                                            </div>
                                          
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                      
                                    </div>
                                </div>

                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product5.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Hình Học 10</h3>
                                            <h3 class="teacher__name">Thầy Lê Văn Tuấn</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new">210.000 <span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                       
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product2.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Giải Tích 11</h3>
                                            <h3 class="teacher__name">Thầy Lê Văn Tuấn</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new">210.000 <span class="price__unit">đ</span></div>
                                            </div>
                                            
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                       
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product3.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Hình Học 11</h3>
                                            <h3 class="teacher__name">Thầy Lê Văn Tuấn</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new">210.000 <span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                       
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product6.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Giải Tích 12</h3>
                                            <h3 class="teacher__name">Thầy Lê Văn Tuấn</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new">210.000 <span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                     
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product4.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Hình Học 12</h3>
                                            <h3 class="teacher__name">Thầy Lê Văn Tuấn</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new">210.000 <span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product7.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Tiếng Anh 10</h3>
                                            <h3 class="teacher__name">Cô Trang Anh</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                            </div>
                                            
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                       
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product8.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Tiếng Anh 11</h3>
                                            <h3 class="teacher__name">Cô Trang Anh</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product9.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Tiếng Anh 12</h3>
                                            <h3 class="teacher__name">Cô Trang Anh</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                            </div>
                                          
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product10.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Ngữ Văn 10</h3>
                                            <h3 class="teacher__name">Cô Lệ Quyên</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                            </div>
                                            
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                       
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product11.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Ngữ Văn 11</h3>
                                            <h3 class="teacher__name">Cô Lệ Quyên</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                            </div>
                                            
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product12.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Ngữ Văn 12</h3>
                                            <h3 class="teacher__name">Cô Lệ Quyên</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product13.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Vật Lý 11</h3>
                                            <h3 class="teacher__name">Thầy Lại Đắc Hợp</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new"> 200.000<span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product14.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Vật Lý 12</h3>
                                            <h3 class="teacher__name">Thầy Lại Đắc Hợp</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new"> 200.000<span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                      
                
                                    </div> 
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product15.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Hóa Học 11</h3>
                                            <h3 class="teacher__name">Thầy Đặng Duy Hữu</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new"> 200.000<span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product16.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Hóa Học 12</h3>
                                            <h3 class="teacher__name">Thầy Đặng Duy Hữu</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new"> 200.000<span class="price__unit">đ</span></div>
                                            </div>
                                          
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                       
                
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product17.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Sinh Học 12</h3>
                                            <h3 class="teacher__name">Thầy Phan Khắc Nghệ</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new"> 200.000<span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                    
                
                                    </div>  
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product18.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Lịch Sử 12</h3>
                                            <h3 class="teacher__name">Thầy Bùi Hữu Bến</h3>
                                            <div class="product__price">
                                                
                                                <div class="price__new"> 200.000<span class="price__unit">đ</span></div>
                                            </div>
                                         
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                        
                
                                    </div>
                                </div>
                                <div class="col l-2 m-4 s-6">
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../Views/assets/img/product/product19.jpg);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name">Địa Lý 12</h3>
                                            <h3 class="teacher__name">Cô Hồng Thúy</h3>
                                            <div class="product__price">
                                               
                                                <div class="price__new"> 200.000<span class="price__unit">đ</span></div>
                                            </div>
                                           
                                        </div>
                                        <a href="user_product.html" class="viewDetail">Xem chi tiết</a>
                                       
                
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="pagination">
                    <ul class="pagination__list">
                        <li class="pagination__item">
                            <a href="listFilm.html" class="pagination__link">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="pagination__item active">
                            <a href="listFilm.html" class="pagination__link">1</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.html" class="pagination__link">2</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.html" class="pagination__link">3</a>
                        </li>
                     
                        <li class="pagination__item">
                            <a href="listFilm.html" class="pagination__link">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="grid wide">
            <div class="row">
                <div class="col l-3 m-6 s-12">
                    <a href="user_homepage.html" class="header__logo">
                        <img src="../Views/assets/logoamban.png" alt="">
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
                            <a href="user_contact.html" class="footer__link">Liên hệ</a>
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
   
    <!-- Script common -->
    <script src="../Views/assets/js/commonscript.js"></script>
</body>

</html>