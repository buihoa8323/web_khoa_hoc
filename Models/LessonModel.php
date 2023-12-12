<?php
// LessonModel.php
class LessonModel {
  // Declare the properties
  private $lesson_id;
  private $lesson_name;
  private $lesson_des;
  private $lesson_video;
  private $lesson_status;
  private $created_at;
  private $updated_at;

  

  // Define the constructor
  public function __construct() {
    return $this;
  }

    // Define the constructor
    public function LessonModel($lesson_id, $lesson_name, $lesson_des, $lesson_video, $lesson_status, $created_at, $updated_at) {
      $this->lesson_id = $lesson_id;
      $this->lesson_name = $lesson_name;
      $this->lesson_des = $lesson_des;
      $this->lesson_video = $lesson_video;
      $this->lesson_status = $lesson_status;
      $this->created_at = $created_at;
      $this->updated_at = $updated_at;
      return $this;
    }

  // Define the getters and setters
  public function getLessonId() {
    return $this->lesson_id;
  }

  public function setLessonId($lesson_id) {
    $this->lesson_id = $lesson_id;
  }

  public function getLessonName() {
    return $this->lesson_name;
  }

  public function setLessonName($lesson_name) {
    $this->lesson_name = $lesson_name;
  }

  public function getLessonDes() {
    return $this->lesson_des;
  }

  public function setLessonDes($lesson_des) {
    $this->lesson_des = $lesson_des;
  }

  public function getLessonVideo() {
    return $this->lesson_video;
  }

  public function setLessonVideo($lesson_video) {
    $this->lesson_video = $lesson_video;
  }

  public function getLessonStatus() {
    return $this->lesson_status;
  }

  public function setLessonStatus($lesson_status) {
    $this->lesson_status = $lesson_status;
  }

  public function getCreatedAt() {
    return $this->created_at;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }
}
?>