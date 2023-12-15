<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/Views/admin.css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon-greeting">
                            <ion-icon name="happy-outline"></ion-icon>
                        </span>
                        <span class="greeting"></span>
                    </a>
                </li>

                <li class="hovered">
                    <a href="/index.php?controller=admin">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Trang chính</span>
                    </a>
                </li>

                <li>
                    <a href="/index.php?controller=adminCourseList">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Quản lý khóa học</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li> -->

                <li>
                    <form action='/index.php?controller=login' method='post' id='viewFormLogout'>
                        <input hidden='true' type='text' name='method' value='logout' class='form-control'>
                        <a href="" onclick="document.getElementById('viewFormLogout').submit(); return false" class="signout">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <?php
                    if ($user instanceof UserModel) {
                        echo
                        '<div class="header__account">
                            <a href="login.html" class="header__account-login">Xin chào ' . $user->getUserName() . '</a>
                        </div>';
                    }
                    ?>
                    <img src="/Views/anh/customer01.jpg" alt="">
                </div>
            </div>
            <!-- ========================= Content start here ==================== -->
            <div class="welcome">
                <img src="/Views/anh/Welcome.png" alt="">
            </div>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="/Views/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>