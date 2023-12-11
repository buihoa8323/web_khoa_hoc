<?php
require_once "./Repositories/CourseRepository.php";
class CourseController extends BaseController
{
    private $courseRepository;
    public function __construct()
    {
        $this-> courseRepository = new CourseRepository;
        return $this;
    }

    public function index()
    {
        //get data
        $data["course_list"] = $this->courseRepository->getAllCourses(NULL,NULL,NULL,NULL);

        //go to view
        $this->view("user_listProduct", $data);
    }

   
}

$courseController = new CourseController();
$courseController->index();
