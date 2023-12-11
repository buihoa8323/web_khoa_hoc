<?php
class CourseModel {
    private $course_id;
    private $subject_id;
    private $teacher_id;
    private $course_name;
    private $course_image;
    private $course_price;
    private $course_des;
    private $couses_status;
    private $couses_grade;
    private $teacher_name;
    private $subject_name;
    private $created_at;
    private $update_at;

    public function __construct() {
        return $this;
    }

    public function CourseModel($course_id, $subject_id, $course_name, $course_image, $course_price, $course_des, $couses_status, $couses_grade, $created_at, $update_at, $teacher_name, $subject_name, $teacher_id) {
        $this->course_id = $course_id;
        $this->subject_id = $subject_id;
        $this->course_name = $course_name;
        $this->course_image = $course_image;
        $this->course_price = $course_price;
        $this->course_des = $course_des;
        $this->couses_status = $couses_status;
        $this->couses_grade = $couses_grade;
        $this->teacher_name = $teacher_name;
        $this->subject_name = $subject_name;
        $this->created_at = $created_at;
        $this->update_at = $update_at;
        $this->teacher_id = $teacher_id;
        return $this;
    }

?>