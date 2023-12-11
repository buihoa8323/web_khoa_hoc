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
    <a href="admin_home.html">QUẢN LÝ KHÓA HỌC </a>
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
              <p><strong>Mô tả:</strong><?php echo $course->getCourseDes(); ?>
              </p>
              <p><strong>Giá:</strong> 1.200.000<sup>đồng</sup>.</p>
            </div>
            <div class="nut">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Sửa khóa học</button>
              <!-- Modal -->
              <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="/index.php?controller=adminCourseDetail" method="POST" enctype="multipart/form-data">
                      <input hidden="true" type="text" name="method" value="update_course" class="form-control" id="method">
                      <input hidden="true" type="text" name="c_id" value="<?php echo $course->getCourseId(); ?>" class="form-control" id="grade">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Tên khóa học:</label>
                              <input type="text" class="form-control" value="<?php echo $course->getCourseName(); ?>" id="c_name" name="c_name">
                            </div>
                            <div class='form-check form-switch'>
                              <label for="name">Trạng thái</label>
                              <input class='form-check-input' name="c_status" type='checkbox' role='switch' id='flexSwitchCheckChecked' <?php echo $course->getCousesStatus() ? ' checked' : '' ;?> >
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
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="qty">Mô tả:</label>
                              <!-- Include stylesheet -->
                              <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

                              <!-- Create the editor container -->
                              <div id="editor" style="height: 500px;">
                                <p>Hello World!</p>
                                <p>Some initial <strong>bold</strong> text</p>
                                <p><br></p>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $course->getCourseDes(); ?>" id="c_desc" name="c_desc">


                              <!-- Include the Quill library -->
                              <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                              <!-- Initialize Quill editor -->
                              <script>
                                var input = document.querySelector("c_desc");
                                var input = document.querySelector("#text-content");

                                function quillPutValue() {
                                  input.value = quill.getText();
                                };

                                const quill = new Quill("#editor", {
                                  modules: {
                                    toolbar: {
                                      container: [
                                        ["bold", "italic", "underline", "strike", "color"],
                                        ["link", "image", "video"],
                                      ]
                                    },
                                  },
                                  theme: "snow",
                                });
                              </script>
                              <!-- <input type="text" class="form-control" id="c_desc" name="c_desc" required> -->
                            </div>
                          </div>
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
          <button class="btn btn-outline-primary show-modal">Thêm bài học</button>
          <div class="modal hidden">
            <button class="close-modal">&times;</button>
            <h1> Thêm bài học</h1>
            <form>
              <div class="form-detail">
                <div class="form-info col-md-6 col-xs-12">
                  <div class="group">
                    <input class="control-custom" type="text" required="required" />
                    <span class="bar"></span>
                    <label>Tên bài học</label>
                  </div>
                  <div class="group">
                    <span class="bar"></span>
                    <label>Mô tả bài hoc</label>
                    <br><br>
                  </div>

                  <div class="group">
                    <input id="description-field" class="control-custom" type="text" required="required" />
                    <span class="bar"></span>
                    <label for="description-field-add"></label> <br> <br>
                  </div>
                  <div class="group">
                    <input class="control-custom" type="url" required="required" />
                    <span class="bar"></span>
                    <label>Video bài học</label>
                  </div>
                  <div class="group">
                    <label>Trạng thái bài học </label><br><br>
                    <button class="toggle-btn">Active</button>
                    <span class="bar"></span>
                  </div>

                  <div class="form-button text-center">
                    <button class="btn btn-info" type="submit">Thêm</button>
                    <button class="btn btn-cancel" type="button">Hủy</button>
                  </div>
                </div>
              </div>
            </form>

          </div>
          <div class="overlay hidden"></div>

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
        <div class="noidungkhoahoc">
          <div class="chi-tiet-bai-hoc">
            <div class="header">
              <h2><a href="admin_detail_lesson.html">Tên Bài Học</a></h2>
              <button class="sua-bai-hoc">Sửa Bài Học</button>
              <div class="xep-xuong"></div>
              <div><label class="container1">
                  <input type="checkbox">
                  <span class="background"></span>
                  <span class="mask"></span>
                </label>
              </div>
            </div>
            <div class="thong-tin-chi-tiet">
              <!-- Các thông tin cơ bản ở đây -->
              <p><strong>Giáo viên:</strong> Nguyễn Văn A</p>
              <p><strong>Ngày bắt đầu:</strong> 01/01/2023</p>
              <p><strong>Thời lượng:</strong> 4 tuần</p>
              <p><strong>Mô tả:</strong> Đây là một bài học rất thú vị với nhiều nội dung hấp dẫn.</p>
            </div>
          </div>

          <div class="chi-tiet-bai-hoc">
            <div class="header">
              <h2><a href="admin_detail_lesson.html">Tên Bài Học</a></h2>
              <button class="sua-bai-hoc">Sửa Bài Học</button>
              <div class="xep-xuong"></div>
              <div><label class="container1">
                  <input type="checkbox">
                  <span class="background"></span>
                  <span class="mask"></span>
                </label>
              </div>
            </div>
            <div class="thong-tin-chi-tiet">
              <!-- Các thông tin cơ bản ở đây -->
              <p><strong>Giáo viên:</strong> Nguyễn Văn A</p>
              <p><strong>Ngày bắt đầu:</strong> 01/01/2023</p>
              <p><strong>Thời lượng:</strong> 4 tuần</p>
              <p><strong>Mô tả:</strong> Đây là một bài học rất thú vị với nhiều nội dung hấp dẫn.</p>
            </div>
          </div>

          <div class="chi-tiet-bai-hoc">
            <div class="header">
              <h2><a href="admin_detail_lesson.html">Tên Bài Học</a></h2>
              <button class="sua-bai-hoc">Sửa Bài Học</button>
              <div class="xep-xuong"></div>
              <div><label class="container1">
                  <input type="checkbox">
                  <span class="background"></span>
                  <span class="mask"></span>
                </label>
              </div>
            </div>
            <div class="thong-tin-chi-tiet">
              <!-- Các thông tin cơ bản ở đây -->
              <p><strong>Giáo viên:</strong> Nguyễn Văn A</p>
              <p><strong>Ngày bắt đầu:</strong> 01/01/2023</p>
              <p><strong>Thời lượng:</strong> 4 tuần</p>
              <p><strong>Mô tả:</strong> Đây là một bài học rất thú vị với nhiều nội dung hấp dẫn.</p>
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