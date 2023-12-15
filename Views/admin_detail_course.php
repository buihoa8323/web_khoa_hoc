<html>

<head>
  <link rel="stylesheet" href="/Views/admin.css/chitiet.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  $raw_data = $data["course"];
  if ($raw_data instanceof CourseModel) $course = $raw_data;
  ?>
  <header class="fixed-header">
    <a style="color: white; text-decoration: none;" href="/index?controller=adminCourseList">
      <h4>QUẢN LÝ KHÓA HỌC </h4>
    </a>
    <button class="logout-btn"><i class="fas fa-sign-out-alt"></i></button>
  </header>
  <div class="content">
    <div class="tong">
      <div class="tieude">
        <div class="tong">
          <div class="nut-quay-lai">
            <button id="quay-lai" onclick="goBack()">
              <img src="/Views/anh/png-transparent-computer-icons-button-back-angle-triangle-arrow-keys.png" alt="Quay lại">
            </button>
            <script>
              function goBack() {
                window.history.back();
              }
            </script>
          </div>
          <h1><u><?php echo $course->getCourseName(); ?></u></h1>
        </div>
        <div class="row muctren">
          <div class="col-md-4 anh">
            <img src="<?php echo $course->getCourseImage(); ?>">
          </div>
          <div class="col-md-7">
            <div class="thongtinkhoahoc">
              <p><strong>ID:</strong><?php echo $course->getCourseId(); ?></p>
              <p><strong>Giáo viên:</strong> <?php echo $course->getTeacherName(); ?></p>
              <p><strong>Lớp:</strong><?php echo $course->getCousesGrade(); ?></p>
              <p><strong>Bộ môn:</strong><?php echo $course->getSubjectName(); ?>
              <p><strong>Mô tả:</strong><?php echo $course->getCourseDes(); ?>
              </p>
              <p><strong>Giá: </strong><?php echo $course->getCoursePrice(); ?><sup>đồng</sup>.</p>
            </div>
            <div class="nut">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Sửa khóa học</button>
              <!-- Modal -->
              <div class="modal fade modal-md" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="/index.php?controller=adminCourseDetail" method="POST" enctype="multipart/form-data">
                      <input hidden="true" type="text" name="method" value="update_course" class="form-control" id="method">
                      <input hidden="true" type="text" name="c_id" value="<?php echo $course->getCourseId(); ?>" class="form-control" id="grade">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa khóa học</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="name">Tên khóa học:</label>
                          <input type="text" class="form-control" value="<?php echo $course->getCourseName(); ?>" id="c_name" name="c_name">
                        </div>
                        <div class='form-check form-switch'>
                          <label for="name">Trạng thái</label>
                          <input class='form-check-input' name="c_status" type='checkbox' role='switch' id='flexSwitchCheckChecked' <?php echo $course->getCousesStatus() ? ' checked' : ''; ?>>
                        </div>
                        <div class="form-group">
                          <label for="price">Mã giáo viên:</label>
                          <input type="number" class="form-control" value="<?php echo $course->getTeacherId(); ?>" id="c_teacher" name="c_teacher" required>
                          <!-- required Nếu giá trị không được nhập vào, trình duyệt sẽ hiển thị một thông báo lỗi và không cho phép form được gửi đi -->
                        </div>
                        <div class="form-group">
                          <label for="price">Mức giá:</label>
                          <input type="number" class="form-control" value="<?php echo $course->getCoursePrice(); ?>" id="c_price" name="c_price" required>
                          <!-- required Nếu giá trị không được nhập vào, trình duyệt sẽ hiển thị một thông báo lỗi và không cho phép form được gửi đi -->
                        </div>
                        <div class="form-group">
                          <label for="qty">Mô tả:</label>
                          <input type="text" class="form-control" value="<?php echo $course->getCourseDes(); ?>" id="c_desc" name="c_desc" required>
                        </div>
                        <div class="form-group">
                          <label>Bộ môn:</label>
                          <select class="form-control" id="subject" name="c_subject">
                            <?php
                            foreach ($data["subject_list"] as $subject) {
                              if ($subject instanceof SubjectModel) {
                                echo '<option value="' . $subject->getSubjectId() . '" ' . ($subject->getSubjectId() == $course->getSubjectId() ? 'selected' : '') . '> ' . $subject->getSubjectName() . '</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <!-- hết lựa chọn cho subject -->
                        <div class="form-group">
                          <label>Khối:</label>
                          <input type="number" value="<?php echo $course->getCousesGrade(); ?>" class="form-control" id="c_grade" name="c_grade" required>
                        </div>
                        <!-- hết lựa chọn cho grade -->
                        <div class="form-group">
                          <img style="max-height: 400px;" src="<?php echo $course->getCourseImage(); ?>">
                          <input type="file" class="form-control-file" id="c_image" name="c_image">
                          <!-- <input type="text" class="form-control" id="c_image" name="c_image" required> -->
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mucgiua">
          <h3>NỘI DUNG KHÓA HỌC</h3>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Thêm bài học</button>
          <div class="modal fade modal-md" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="/index.php?controller=adminCourseDetail" method="POST" enctype="multipart/form-data">
                  <input hidden="true" type="text" name="method" value="create_lesson" class="form-control" id="method">
                  <input hidden="true" type="text" name="course_id" value="<?php echo $course->getCourseId() ?>" class="form-control" id="grade">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm bài học</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group mt-3">
                      <label for="name">Tên bài học: </label>
                      <input type="text" class="form-control" id="l_name" name="l_name">
                    </div>

                    <!-- hết lựa chọn cho grade -->
                    <div class="form-group mt-3">
                      <label for="name">Video(embed link)</label>
                      <input type="text" class="form-control" id="l_video" name="l_video">
                      <!-- <input type="text" class="form-control" id="c_image" name="c_image" required> -->
                    </div>

                    <div class="form-group mt-3">
                      <label for="name">Mô tả: </label>
                      <input type="text" class="form-control" id="l_desc" name="l_desc">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <script src="script.js"></script>
          <script>
            var simplemde = new SimpleMDE({
              element: document.getElementById("description-field"),
              spellChecker: false
            });
          </script>
          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </div>
        <!-- Tab content -->
        <div class="tab-content ">
          <div class="tab-pane active ">
            <div class="productDes ">
              <table class="table table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên bài học</th>
                    <th scope="col">Mô tả bài học</th>
                    <th scope="col">Video bài học</th>
                    <th scope="col">Hành động</th>
                    <th scope="col">Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($data["lesson_list"])) {
                    foreach ($data["lesson_list"] as $lesson) {
                      if ($lesson instanceof LessonModel) {
                        echo
                        '<tr>
                        <td>1</td>  
                        <td><h3 class="productDes__title">' . $lesson->getLessonName() . '</h3></td>
                        <td>
                          <p id="description-course1">&nbsp' . $lesson->getLessonDes() . '</p>
                        </td>
                        <td>
                          <div>
                              <!-- Embed YouTube video or other video source here -->
                              <iframe width="400" height="250" src="' . $lesson->getLessonVideo() . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                          </div>
                        </td>
                        <td>
                          <a href="/index?controller=adminLessonDetail&lesson_id=' . $lesson->getLessonId() . '" class="btn btn-primary">View<a/>
                          <form action="/index.php?" method="get">
                          <input hidden="true" type="text" name="controller" value="adminCourseDetail" class="form-control">
                          <input hidden="true" type="text" name="action" value="delete" class="form-control">
                          <input hidden="true" type="text" name="lesson_id" value="' . $lesson->getLessonId() . '" class="form-control">
                          <button class="btn btn-danger" type="submit" style="height:40px" onclick="return confirm(\'Are you sure you want to delete this lesson?\');">Delete</button>
                          </form>
                          </td>

                          <td>
                            <div class="form-check form-switch">
                              <form action="/index.php?controller=adminCourseDetail" method="POST">
                                <input hidden="true" type="text" name="lesson_id" value="' . $lesson->getLessonId() . '" class="form-control">
                                <input hidden="true" type="text" name="course_id" value="' . $course->getCourseId() . '" class="form-control">
                                <input hidden="true" type="text" name="method" value="update_lesson_status" class="form-control">
                                <input class="form-check-input" onchange="this.form.submit()" name="lesson_status" type="checkbox" role="switch" id="flexSwitchCheckChecked" ' . ($lesson->getLessonStatus() ? "checked" : "") . ">
                              </form>
                            </div>
                          </td>
                      </tr>";
                      }
                    }
                  } else {
                    echo '<h1 style="font-size: large;">Không tìm nấy kết quả nào</h1>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
    <script>
      const toggleBtn = document.querySelector('.toggle-btn');

      toggleBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        if (this.classList.contains('active')) {
          this.textContent = 'Inactive';
        } else {
          this.textContent = 'Active';
        }
      });
    </script>
    <!-- <script>
      var simplemde = new SimpleMDE({
        element: document.getElementById("description-field"),
        spellChecker: false
      });
    </script> -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>