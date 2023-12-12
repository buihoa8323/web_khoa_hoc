<?php 
require_once "./Models/LessonModel.php";
class LessonRepository {
  private $db;
  private $lesson_model;
  public function __construct()
  {
    $this->lesson_model = new LessonModel;
    $this->db = new DB();
    return $this;
  }

  public function getLessonByCourseId($course_id)
  {
    // Prepare the SQL statement with a parameter for the course_id
    // Use a join query to get the lessons from the courses_lessons table
    $sql = "SELECT lessons.* FROM lessons 
            JOIN courses_lessons ON lessons.lesson_id = courses_lessons.lesson_id
            WHERE courses_lessons.course_id = :course_id";
    $stmt = $this->db->connnection->prepare($sql);

    // Bind the course_id parameter to the value passed to the function
    $stmt->bindParam(':course_id', $course_id);

    // Execute the SQL statement
    $stmt->execute();

    // Check if the result set has more than 0 rows
    if ($stmt->rowCount() > 0) {
      // Use a loop to fetch each row from the result set as an associative array
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Append each row to the lessons array
        $lessons[] = $row;
      }
    } else {
      // If the result set has 0 rows, print a message
      echo "0 results";
    }

    foreach ($lessons as $l) {
      $lesson_list[] = clone $this->getLessonItemFromQuery($l);
    }

    //when retrieve lesson from database , save data to a lesson object 
    return $lesson_list;
    $this->db->connnection = null;
  }

  public function getLessonItemFromQuery($lessonQuery)
  {
    //when retrieve lesson from database , save data to a lesson object 
    $lessonItem = $this->lesson_model->LessonModel(
      $lessonQuery["lesson_id"],
      $lessonQuery["lesson_name"],
      $lessonQuery["lesson_des"],
      $lessonQuery["lesson_video"],
      $lessonQuery["lesson_status"],
      $lessonQuery["created_at"],
      $lessonQuery["updated_at"]
    );
    return $lessonItem;
  }
}

?>