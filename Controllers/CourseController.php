<?php
session_start();
require_once "./Repositories/CourseRepository.php";
require_once "./Repositories/SubjectRepository.php";

class CourseController extends BaseController
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
        //get data
        $data["course_list"] = $this->courseRepository->getAllCoursesUser($this->courseNameFilter, $this->teacherNameFilter, $this->subjectFilter, $this->gradeFilter);

        //get data of subject
        $data["subject_list"] = $this->subjectRepository->getAllSubject();

        //go to view
        $this->view("user_listProduct", $data);
    }

    //handle post request
    public function doPost($method)
    {
        switch ($method) {
            case "course_name_filter":
                $this->filter($_POST["course_filter"], $this->teacherNameFilter, $this->subjectFilter, $this->gradeFilter);
                break;
            case "subject_filter":
                $this->filter($this->courseNameFilter, $this->teacherNameFilter, $_POST["subject_filter"], $this->gradeFilter);
                break;
            case "grade_filter":
                $this->filter($this->courseNameFilter, $this->teacherNameFilter, $this->subjectFilter, $_POST["grade_filter"]);
                break;
            default:
                return;
        }
    }

    public function filter($courseNameFilter, $teacherNameFilter, $subjectFilter, $gradeFilter)
    {
        $this->courseNameFilter = $courseNameFilter;
        $this->teacherNameFilter = $teacherNameFilter;
        $this->subjectFilter = $subjectFilter;
        $this->gradeFilter = $gradeFilter;

        //get data
        $data["course_list"] = $this->courseRepository->getAllCoursesUser($this->courseNameFilter, $this->teacherNameFilter, $this->subjectFilter, $this->gradeFilter);

        //get data of subject
        $data["subject_list"] = $this->subjectRepository->getAllSubject();

        $data["chosen_subject"] = $subjectFilter;

        $data["chosen_grade"] = $gradeFilter;

        $data["search_key"] = $courseNameFilter;

        //go to view
        $this->view("user_listProduct", $data);
    }
}

$courseController = new CourseController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST["method"];
    $courseController->doPost($method);
} else {
    $courseController->index();
}
