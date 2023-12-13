<?php
//inport used classes
require_once "./Repositories/LessonRepository.php";
class AdminLessonDetailController extends BaseController
{
  private $lessonRepository;
  public function __construct()
  {
    $this->lessonRepository = new LessonRepository;
    return $this;
  }

  public function index($lesson_id)
  {
    $action = $_GET["action"];
    $this->doGet($action);

    $lessonId = $_GET["lesson_id"];
    if($lesson_id != ''){
      $lessonId = $lesson_id;
    }

    //getDataOfCourse
    $data["lesson"] = $this->lessonRepository->getLessonById($lessonId);

    //go to view
    $this->view("admin_detail_lesson", $data);
  }

  public function doGet($action)
  {
  }

  public function doPost($method)
  {
    switch ($method) {
      case "update_lesson":
        $this->update();
        break;
      default:
        return;
      }
  }


  public function update(){
    $status = $_POST["l_status"] == 'on' ? true : false;
    $this->lessonRepository->update($_POST["l_id"], $_POST["l_name"], $_POST["l_desc"], $_POST["l_video"], $status);
    return $this->index($_POST["l_id"]);
  }

}

$adminLessonDetailController = new AdminLessonDetailController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $method = $_POST["method"];
  $adminLessonDetailController->doPost($method);
} else {
  $adminLessonDetailController->index('');
}

