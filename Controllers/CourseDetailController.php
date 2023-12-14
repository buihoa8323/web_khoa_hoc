<?php
//inport used classes
require_once "./Repositories/CourseRepository.php";
require_once "./Repositories/LessonRepository.php";
class CourseDetailController extends BaseController
{
  private $courseRepository;
  private $lessonRepository;
  public function __construct()
  {
    $this->courseRepository = new CourseRepository;
    $this->lessonRepository = new LessonRepository;
    return $this;
  }

  public function index($course_id)
  {
    if (isset($_GET["action"])) {
      $action = $_GET["action"];
    } else {
      $action = ""; // or some default value
    }
    $this->doGet($action);

    $courseId = $_GET["course_id"];
    if ($course_id != '') {
      $courseId = $course_id;
    }

    //getDataOfCourse
    $data["course"] = $this->courseRepository->getCourseById($courseId);
    $data["lesson_list"] = $this->lessonRepository->getLessonByCourseIdAndStatus($courseId, true);

    //go to view
    $this->view("user_product", $data);
  }

  public function doGet($action)
  {
  }

  public function doPost($method)
  {
  }
}

$CourseDetailController = new CourseDetailController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $method = $_POST["method"];
  $CourseDetailController->doPost($method);
} else {
  $CourseDetailController->index('');
}
