<?php
session_start();
require_once "./Repositories/CourseRepository.php";
class HomeController extends BaseController
{
    private $courseRepository;
    public function __construct()
    {
        $this-> courseRepository = new CourseRepository;
        return $this;
    }

    public function index()
    {

        $data["new_courses"] = $this->courseRepository->getNumberOfCourseUser(NULL,NULL,NULL,NULL,12);

        $data["spotlight_courses"] = $this->courseRepository->getNumberOfCourseUser(NULL,NULL,NULL,NULL,10);
        //get data
        $data["course_list"] = $this->courseRepository->getAllCoursesUser(NULL,NULL,NULL,NULL);
        //go to view
        $this->view("user_homepage", $data);
    }

   
}

$homeController = new HomeController();
$homeController->index();
