<?php
//inport used classes
require_once "./Repositories/CourseRepository.php";
require_once "./Repositories/SubjectRepository.php";
require_once "./Repositories/LessonRepository.php";

class AdminCourseDetailController extends BaseController
{
  private $courseRepository;
  private $subjectRepository;
  private $lessonRepository;

  public function __construct()
  {
    $this->courseRepository = new CourseRepository;
    $this->subjectRepository = new SubjectRepository;
    $this->lessonRepository = new LessonRepository;

    return $this;
  }

  public function index($course_id)
  {
    $action = $_GET["action"];
    $this->doGet($action);

    $courseId = $_GET["course_id"];
    if($course_id != ''){
      $courseId = $course_id;
    }

    //get data of subject
    $data["subject_list"] = $this->subjectRepository->getAllSubject();
    $data["lesson_list"] = $this->lessonRepository->getLessonByCourseId($courseId);

    //getDataOfCourse
    $data["course"] = $this->courseRepository->getCourseById($courseId);

    //go to view
    $this->view("admin_detail_course", $data);
  }

  public function doGet($action)
  {
    switch ($action) {
      case "delete":
        $this->delete($_GET["lesson_id"]);
        break;
      default:
        return;
      }
  }

  public function doPost($method)
  {
    switch ($method) {
      case "update_course":
        $this->update($_POST["c_id"],$_POST["c_name"], $_POST["c_teacher"], $_POST["c_price"],$_POST["c_status"], $_POST["c_desc"],  $_POST["c_subject"], $_POST["c_grade"]);
        break;
      case "create_lesson":
        $this->createLesson();
        break;
      default:
        return;
    }
  }

  public function delete($lesson_id){
    $this->lessonRepository->delete($lesson_id);
    header('Location: /index.php?controller=adminCourseList');
  }

  public function createLesson(){
    $this->lessonRepository->create($_POST["course_id"], $_POST["l_name"], $_POST["l_desc"], $_POST["l_video"]);
    $this->index($_POST["course_id"]);
  }

  public function update($course_id, $course_name, $teacher_id, $course_price, $course_status, $course_des, $subject_id, $course_grade)
  {
    $status = $course_status == 'on' ? true : false;
    
    // Get the temporary file name of the uploaded file
    $temp_file = $_FILES["c_image"]["tmp_name"];
    // Get the original file name of the uploaded file
    $original_file = $_FILES["c_image"]["name"];
    // Set the destination file name where you want to save the image
    $destination_file = "./Views/assets/img/product/" . $original_file;
    // Move the uploaded file to the destination folder using the move_uploaded_file function

    if($original_file == ''){
      $course_image='';
    } else{
      $course_image = $destination_file; //image url to save on db
    }
    $this->courseRepository->update($course_id, $course_name, $teacher_id, $course_price, $status, $course_des, $subject_id, $course_grade, $course_image);
    $this->index($course_id);
  }
}

$adminCourseDetailController = new AdminCourseDetailController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $method = $_POST["method"];
  $adminCourseDetailController->doPost($method);
} else {
  $adminCourseDetailController->index('');
}
