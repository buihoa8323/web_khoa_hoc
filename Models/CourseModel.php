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

    public function getCourseId() {
        return $this->course_id;
    }

    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

    public function getTeacherId() {
        return $this->teacher_id;
    }

    public function setTeacherId($teacher_id) {
        $this->teacher_id = $teacher_id;
    }

    public function getTeacherName() {
        return $this->teacher_name;
    }

    public function setTeacherName($teacher_name) {
        $this->teacher_name = $teacher_name;
    }

    public function getSubjectName() {
        return $this->subject_name;
    }

    public function setSubjectName($subject_name) {
        $this->subject_name = $subject_name;
    }

    public function getSubjectId() {
        return $this->subject_id;
    }

    public function setSubjectId($subject_id) {
        $this->subject_id = $subject_id;
    }

    public function getCourseName() {
        return $this->course_name;
    }

    public function setCourseName($course_name) {
        $this->course_name = $course_name;
    }

    public function getCourseImage() {
        return $this->course_image;
    }

    public function setCourseImage($course_image) {
        $this->course_image = $course_image;
    }

    public function getCoursePrice() {
        return $this->course_price;
    }

    public function setCoursePrice($course_price) {
        $this->course_price = $course_price;
    }

    public function getCourseDes() {
        return $this->course_des;
    }

    public function setCourseDes($course_des) {
        $this->course_des = $course_des;
    }

    public function getCousesStatus() {
        return $this->couses_status;
    }

    public function setCousesStatus($couses_status) {
        $this->couses_status = $couses_status;
    }

    public function getCousesGrade() {
        return $this->couses_grade;
    }

    public function setCousesGrade($couses_grade) {
        $this->couses_grade = $couses_grade;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdateAt() {
        return $this->update_at;
    }

    public function setUpdateAt($update_at) {
        $this->update_at = $update_at;
    }
}

?>