<?php
//inport used classes
require_once "./Repositories/CourseRepository.php";
require_once "./Repositories/SubjectRepository.php";
class AdminController extends BaseController
{
  private $courseRepository;
  private $subjectRepository;

  private $courseNameFilter = NULL;
  private $teacherNameFilter = NULL;
  private $subjectFilter = NULL;
  private $gradeFilter = NULL;

  public function __construct()
  {
    $this->courseRepository = new CourseRepository;
    $this->subjectRepository = new SubjectRepository;
    return $this;
  }

  public function index()
  {
    if (isset($_GET["action"])) {
      $action = $_GET["action"];
    } else {
      $action = ""; // or some default value
    }
    $this->doGet($action);

    //get data of courses
    $data["course_list"] = $this->courseRepository->getAllCourses($this->courseNameFilter, $this->teacherNameFilter, $this->subjectFilter, $this->gradeFilter);

    //get data of subject
    $data["subject_list"] = $this->subjectRepository->getAllSubject();

    //go to view, pass data to view
    $this->view("admin_courselist", $data);
  }

  public function doGet($action)
  {
    switch ($action) {
      case "delete":
        $this->delete($_GET["course_id"]);
        break;
      default:
        return;
    }
  }

  //handle post request
  public function doPost($method)
  {
    switch ($method) {
      case "course_name_filter":
        $this->filter($_POST["course_filter"], $this->teacherNameFilter, $this->subjectFilter, $this->gradeFilter);
        break;
      case "teacher_name_filter":
        $this->filter($this->courseNameFilter, $_POST["teacher_filter"], $this->subjectFilter, $this->gradeFilter);
        break;
      case "subject_filter":
        $this->filter($this->courseNameFilter, $this->teacherNameFilter, $_POST["subject_filter"], $this->gradeFilter);
        break;
      case "grade_filter":
        $this->filter($this->courseNameFilter, $this->teacherNameFilter, $this->subjectFilter, $_POST["grade_filter"]);
        break;
      case "create_new_course":
        $this->createNewCourse($_POST["c_name"], $_POST["c_teacher"], $_POST["c_price"], $_POST["c_desc"], $_POST["c_subject"], $_POST["c_grade"]);
        break;
      case "update_course_status":
        $this->updateCourseStatus($_POST["course_id"], $_POST["course_status"]);
        break;
      default:
        return;
    }
  }

  public function createNewCourse($course_name, $teacher_id, $course_price, $course_des, $subject_id, $course_grade)
  {
    // Get the temporary file name of the uploaded file
    $temp_file = $_FILES["c_image"]["tmp_name"];
    // Get the original file name of the uploaded file
    $original_file = $_FILES["c_image"]["name"];
    // Set the destination file name where you want to save the image
    $destination_file = "./Views/assets/img/product/" . $original_file;
    // Move the uploaded file to the destination folder using the move_uploaded_file function

    $course_image = $destination_file; //image url to save on db
    $this->courseRepository->create($course_name, $teacher_id, $course_price, $course_des, $subject_id, $course_grade, $course_image);
    return $this->index();
  }

  public function updateCourseStatus($course_id, $course_status)
  {
    $status = $course_status == 'on' ? true : false;
    $this->courseRepository->updateCourseStatusById($course_id, $status);
    return $this->index();
  }

  public function filter($courseNameFilter, $teacherNameFilter, $subjectFilter, $gradeFilter)
  {
    $this->courseNameFilter = $courseNameFilter;
    $this->teacherNameFilter = $teacherNameFilter;
    $this->subjectFilter = $subjectFilter;
    $this->gradeFilter = $gradeFilter;
    return $this->index();
  }

  public function delete($course_id)
  {
    $this->courseRepository->delete($course_id);
  }
}

$adminController = new AdminController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $method = $_POST["method"];
  $adminController->doPost($method);
} else {
  $adminController->index();
}
