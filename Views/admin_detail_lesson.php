<html>

<head>
    <link rel="stylesheet" href="/Views/admin.css/chitietbaihoc.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplemde@1.11.2/dist/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/npm/simplemde@1.11.2/dist/simplemde.min.js"> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $raw_data_lesson = $data["lesson"];
    if ($raw_data_lesson instanceof LessonModel) $lesson = $raw_data_lesson;
    ?>
    <header class="fixed-header">
        <a href="/index?controller=adminCourseList"> QUẢN LÝ KHÓA HỌC </a>
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
                    <h1><?php echo $lesson->getLessonName() ?></h1>
                </div>
                <div class="muctren">
                    <div class="anh">
                        <iframe width="560" height="315" src="<?php echo $lesson->getLessonVideo(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div>
                        <div class="thongtinkhoahoc">
                            <p><strong>ID:</strong><?php echo $lesson->getLessonId() ?></p>
                            <p><strong>Mô tả:</strong> <?php echo $lesson->getLessonDes() ?></p>
                            <p><strong>Ngày tạo:</strong> <?php echo $lesson->getCreatedAt() ?></p>
                        </div>
                        <div class="nut">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Sửa bài học</button>
                            <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="/index.php?controller=adminLessonDetail" method="POST" enctype="multipart/form-data">
                                            <input hidden="true" type="text" name="method" value="update_lesson" class="form-control" id="method">
                                            <input hidden="true" type="text" name="l_id" value="<?php echo $lesson->getLessonId(); ?>" class="form-control" id="grade">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa bài học</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mt-3">
                                                    <label for="name">Tên bài học: </label>
                                                    <input type="text" class="form-control" value="<?php echo $lesson->getLessonName(); ?>" id="l_name" name="l_name" required>
                                                </div>
                                                <div class='form-check form-switch mt-3'>
                                                    <label for="name">Trạng thái</label>
                                                    <input class='form-check-input' name="l_status" type='checkbox' role='switch' id='flexSwitchCheckChecked' <?php echo $lesson->getLessonStatus() ? ' checked' : ''; ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label for="qty">Mô tả:</label>
                                                    <input type="text" class="form-control" value="<?php echo $lesson->getLessonDes(); ?>" id="l_desc" name="l_desc">
                                                </div>
                                                <!-- hết lựa chọn cho grade -->
                                                <div class="form-group mt-3">
                                                    <label for="name">Video(embed link)</label>
                                                    <iframe width="560" height="315" src="<?php echo $lesson->getLessonVideo(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <input type="text" class="form-control" value="<?php echo $lesson->getLessonVideo(); ?>" id="l_video" name="l_video">
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
</body>

</html>