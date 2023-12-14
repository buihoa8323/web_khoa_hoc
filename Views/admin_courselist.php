<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/Views/admin.css/style.css">
    <link rel="stylesheet" href="/Views/admin.css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container-fluid" style="padding:0;">
        <div class="navigation">
            <ul style="padding: 0;">
                <li>
                    <a href="#">
                        <span class="icon-greeting">
                            <ion-icon name="happy-outline"></ion-icon>
                        </span>
                        <span class="greeting"></span>
                    </a>
                </li>

                <li>
                    <a href="/index.php?controller=admin">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Trang chính</span>
                    </a>
                </li>

                <li class="hovered">
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
                </li> -->

                <!-- <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li> -->

                <!-- <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li> -->

                <!-- <li>
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
                    <img src="/Views/anh/customer01.jpg" alt="">
                </div>
            </div>
            <!-- ========================= Content start here ==================== -->
            <div class="admin_home" style="margin-right:20px; margin-bottom: 100px;">
                <div>
                    <center>
                        <h1>Danh sách khóa học</h1>
                    </center>
                    <div class="d-flex justify-content-between align-items-center">
                        <button id="modalBtn" class="btn btn-outline-primary"> Add Course </button>
                    </div>

                    <!-- filter box -->
                    <div>

                        <form action="/index.php?controller=adminCourseList" method="post" class="form-group">
                            <input hidden="true" type="text" name="method" value="filter" class="form-control" id="course-name">

                            <div class="row">

                                <div class="col-md-3">

                                    <label for="course-name">Course Name:</label>
                                    <div class="input-group">
                                        <input type="text" name="course_filter" value="<?php echo $data["course_filter"] ?>" class="form-control" id="course-name">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">

                                    <label for="teacher-name">Teacher Name:</label>
                                    <div class="input-group">
                                        <input type="text" name="teacher_filter" value="<?php echo $data["teacher_filter"] ?>" class="form-control" id="teacher-name">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">


                                    <label for="subject">Subject:</label>
                                    <div class="input-group">
                                        <select name="subject_filter" class="form-control" id="subject">
                                            <option value="">-- chọn bộ môn --</option>
                                            <?php
                                            foreach ($data["subject_list"] as $subject) {
                                                if ($subject instanceof SubjectModel) { //use this line so that can use method of the SubjectModel conviniently
                                                    echo '<option ' . ($subject->getSubjectId() == $data["subject_filter"] ? 'selected' : '') . ' value="' . $subject->getSubjectId() . '"> ' . $subject->getSubjectName() . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">

                                    <input hidden="true" type="text" name="method" value="grade_filter" class="form-control" id="grade">
                                    <label for="grade">Grade:</label>
                                    <div class="input-group">
                                        <!-- <input type="number" name="grade_filter" class="form-control" id="grade"> -->
                                        <select name="grade_filter" class="form-control" id="subject">
                                            <option value="">-- chọn khối --</option>
                                            <option <?php echo '<option ' . (10 == $data["grade_filter"] ? 'selected' : '') ?> value="10">10</option>
                                            <option <?php echo '<option ' . (11 == $data["grade_filter"] ? 'selected' : '') ?> value="11">11</option>
                                            <option <?php echo '<option ' . (12 == $data["grade_filter"] ? 'selected' : '') ?> value="12">12</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Course Image</th>
                            <th class="text-center">Course Name</th>
                            <th class="text-center">Teacher Name</th>
                            <th class="text-center">Course Description</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Grade</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php
                    // In your view (user_listProduct.php)
                    foreach ($data["course_list"] as $course) {
                        if ($course instanceof CourseModel) {
                            echo
                            "<tr>
                                    <td>" . $course->getCourseId() . "</td>
                                    <td>
                                        <form action='/index.php?' method='get' id='viewForm" . $course->getCourseId() . "'>
                                            <input hidden='true' type='text' name='controller' value='adminCourseDetail' class='form-control'>
                                            <input hidden='true' type='text' name='course_id' value='" . $course->getCourseId() . "' class='form-control'>
                                            <a href='' onclick='document.getElementById(\"viewForm" . $course->getCourseId() . "\").submit(); return false'><img src='" . $course->getCourseImage() . "' width='100px' height='130px'></a>
                                        </form>
                                    </td>
                                    <td>" . $course->getCourseName() . "</td>
                                    <td>" . $course->getTeacherName() . "</td>
                                    <td style='max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>" . $course->getCourseDes() . "</td>
                                    <td>" . $course->getSubjectName() . "</td>
                                    <td>" . $course->getCousesGrade() . "</td>
                                    <td>
                                        <div class='d-flex flex-column'>
                                        <form action='/index.php?' method='get'>
                                        <input hidden='true' type='text' name='controller' value='adminCourseDetail' class='form-control'>
                                        <input hidden='true' type='text' name='course_id' value='" . $course->getCourseId() . "' class='form-control'>
                                            <button class='btn btn-primary' type='submit' style='height:40px'>View</button>
                                        </form>
                                        <form action='/index.php?' method='get'>
                                            <input hidden='true' type='text' name='controller' value='adminCourseList' class='form-control'>
                                            <input hidden='true' type='text' name='action' value='delete' class='form-control'>
                                            <input hidden='true' type='text' name='course_id' value='" . $course->getCourseId() . "' class='form-control'>
                                            <button class='btn btn-danger' type='submit' style='height:40px' onclick=\"return confirm('Are you sure you want to delete this course?');\">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                    <!-- button on/off -->
                                    <td>
                                        <div class='form-check form-switch'>
                                        <form action='/index.php?controller=adminCourseList' method='POST'>
                                            <input hidden='true' type='text' name='method' value='update_course_status' class='form-control'>
                                            <input hidden='true' type='text' name='course_id' value='" . $course->getCourseId() . "' class='form-control'>
                                            <input class='form-check-input' onchange='this.form.submit()' name='course_status' type='checkbox' role='switch' id='flexSwitchCheckChecked' " . ($course->getCousesStatus() ? ' checked' : '') . ">
                                        </form>
                                        </div>
                                    </td>
                                </tr>";
                        }
                    }
                    ?>
                </table>
            </div>


            <!-- Add course -->
            <div class="movalAdd">
                <!-- Modal content-->
                <div class="modal" id="myModal">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Thêm khóa học mới</h4>
                            <span class="close">&times;</span> <!-- &times;biểu thị ký tự "×" -->
                        </div>

                        <div class="modal-body">
                            <form action="/index.php?controller=adminCourseList" method="POST" enctype="multipart/form-data">
                                <input hidden="true" type="text" name="method" value="create_new_course" class="form-control" id="grade">
                                <div class="form-group">
                                    <label for="name">Tên khóa học:</label>
                                    <input type="text" class="form-control" id="c_name" name="c_name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Mã giáo viên:</label>
                                    <input type="number" class="form-control" id="c_teacher" name="c_teacher" required>
                                    <!-- required Nếu giá trị không được nhập vào, trình duyệt sẽ hiển thị một thông báo lỗi và không cho phép form được gửi đi -->
                                </div>
                                <div class="form-group">
                                    <label for="price">Mức giá:</label>
                                    <input type="number" class="form-control" id="c_price" name="c_price" required>
                                    <!-- required Nếu giá trị không được nhập vào, trình duyệt sẽ hiển thị một thông báo lỗi và không cho phép form được gửi đi -->
                                </div>
                                <div class="form-group">
                                    <label for="qty">Mô tả:</label>
                                    <input type="text" class="form-control" id="c_desc" name="c_desc" required>
                                </div>
                                <div class="form-group">
                                    <label>Bộ môn:</label>
                                    <select class="form-control" id="subject" name="c_subject">
                                        <option value="">-- chọn bộ môn --</option>
                                        <?php
                                        foreach ($data["subject_list"] as $subject) {
                                            if ($subject instanceof SubjectModel) { //use this line so that can use method of the SubjectModel conviniently
                                                echo '<option value="' . $subject->getSubjectId() . '"> ' . $subject->getSubjectName() . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- hết lựa chọn cho subject -->
                                <div class="form-group">
                                    <label>Khối:</label>
                                    <!-- <select id="grade" name="grade">
                                            <option disabled selected>Select grade</option>
                                        </select> -->
                                    <div class="input-group">
                                        <!-- <input type="number" name="grade_filter" class="form-control" id="grade"> -->
                                        <select name="c_grade" class="form-control" id="subject">
                                            <option value="">-- chọn khối --</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- hết lựa chọn cho grade -->
                                <div class="form-group">
                                    <label for="file">Chọn ảnh:</label>
                                    <input type="file" class="form-control-file" id="c_image" name="c_image">
                                    <!-- <input type="text" class="form-control" id="c_image" name="c_image" required> -->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="upload" value="upload" name="upload" style="height:40px">Add Course</button>
                                </div>
                            </form>

                        </div>

                        <div class="modal-footer">
                            <button id="close" type="button" class="btn btn-primary" data-dismiss="modal" style="height:40px">Close</button>
                        </div>

                    </div>

                    <!-- het Modal content-->

                </div> <!-- Modal content-->
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="/Views/main.js"></script>
    <!-- script cho moval  -->
    <script>
        // lấy phần Modal
        var modal = document.getElementById('myModal');

        // Lấy phần button mở Modal
        var btn = document.getElementById("modalBtn");

        // Lấy phần span đóng Modal
        var span = document.getElementsByClassName("close")[0];
        // Lấy button close
        var btnClose = document.getElementById('close');
        // Khi button được click thi mở Modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Khi span được click thì đong
        span.onclick = function() {
            modal.style.display = "none";
        }
        btnClose.onclick = function() {
            modal.style.display = "none";
        }
        // Khi click ngoài Modal thì đóng Modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <!-- improve -->

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>