<?php
require_once "./Models/LessonModel.php";
class LessonRepository
{
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

  public function getLessonById($lesson_id)
  {
    // Prepare the SQL statement with a parameter for the lesson_id
    $sql = "SELECT * FROM lessons WHERE lesson_id = :lesson_id";
    $stmt = $this->db->connnection->prepare($sql);

    // Bind the lesson_id parameter to the value passed to the function
    $stmt->bindParam(':lesson_id', $lesson_id);

    // Execute the SQL statement
    $stmt->execute();

    // Check if the result set has one row
    if ($stmt->rowCount() == 1) {
      // Fetch the row from the result set as an associative array
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // Create a lesson object from the row
      $lessonItem = $this->getLessonItemFromQuery($row);
    } else {
      // If the result set has 0 or more than 1 rows, print a message
      echo "Invalid lesson id";
    }

    //when retrieve lesson from database , save data to a lesson object 
    return $lessonItem;
    $this->db->connnection = null;
  }

  public function create($course_id, $lesson_name, $lesson_des, $lesson_video)
  {
    // Define the SQL statement for inserting data to the lessons table, omitting the lesson_id and created_at and updated_at columns
    $sql = "INSERT INTO lessons (lesson_name, lesson_des, lesson_video, lesson_status, created_at, updated_at) 
    VALUES (:lesson_name, :lesson_des, :lesson_video, :lesson_status, :created_at, :updated_at)";

    // Prepare the statement and get the PDOStatement object
    $stmt = $this->db->connnection->prepare($sql);
    $date = date('Y-m-d');

    $status = true;
    // Bind the parameters and values
    $stmt->bindParam(':lesson_name', $lesson_name, PDO::PARAM_STR);
    $stmt->bindParam(':lesson_des', $lesson_des, PDO::PARAM_STR);
    $stmt->bindParam(':lesson_video', $lesson_video, PDO::PARAM_STR);
    $stmt->bindParam(':lesson_status', $status, PDO::PARAM_BOOL);
    $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $date, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->rowCount() == 1) {
      // Print a message
      echo "New lesson inserted successfully";
      // Get the last inserted lesson_id
      $lesson_id = $this->db->connnection->lastInsertId();
      // Define the SQL statement for inserting data to the courses_lessons table, omitting the courses_lessons_id column
      $sql = "INSERT INTO courses_lessons (course_id, lesson_id) 
      VALUES (:course_id, :lesson_id)";

      // Prepare the statement and get the PDOStatement object
      $stmt = $this->db->connnection->prepare($sql);

      // Bind the parameters and values
      $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
      $stmt->bindParam(':lesson_id', $lesson_id, PDO::PARAM_INT);

      // Execute the statement
      $stmt->execute();
    }
  }

  public function update($lesson_id, $lesson_name, $lesson_des, $lesson_video, $lesson_status)
  {
    // Define the SQL statement for updating data, using the lesson_id as the condition
    $sql = "UPDATE lessons SET lesson_name = :lesson_name, lesson_des = :lesson_des, lesson_video = :lesson_video, lesson_status = :lesson_status, updated_at = :updated_at 
    WHERE lesson_id = :lesson_id";

    // Prepare the statement and get the PDOStatement object
    $stmt = $this->db->connnection->prepare($sql);
    $date = date('Y-m-d');

    // Bind the parameters and values
    $stmt->bindParam(':lesson_id', $lesson_id, PDO::PARAM_INT);
    $stmt->bindParam(':lesson_name', $lesson_name, PDO::PARAM_STR);
    $stmt->bindParam(':lesson_des', $lesson_des, PDO::PARAM_STR);
    $stmt->bindParam(':lesson_video', $lesson_video, PDO::PARAM_STR);
    $stmt->bindParam(':lesson_status', $lesson_status, PDO::PARAM_BOOL);
    $stmt->bindParam(':updated_at', $date, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() == 1) {
      // Print a message
      echo "Lesson updated successfully";
    } else {
      // Print a message
      echo "Update failed";
    }

  }

  public function delete($lesson_id)
  {
    // Define the SQL statement for deleting data from the courses_lessons table, using the lesson_id as the condition
    $sql = "DELETE FROM courses_lessons WHERE lesson_id = :lesson_id";

    // Prepare the statement and get the PDOStatement object
    $stmt = $this->db->connnection->prepare($sql);

    // Bind the lesson_id parameter to the value passed to the function
    $stmt->bindParam(':lesson_id', $lesson_id);

    // Execute the statement
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
      // Print a message
      // echo "Courses_lessons records deleted successfully";
      // Define the SQL statement for deleting data from the lessons table, using the lesson_id as the condition
      $sql = "DELETE FROM lessons WHERE lesson_id = :lesson_id";

      // Prepare the statement and get the PDOStatement object
      $stmt = $this->db->connnection->prepare($sql);

      // Bind the lesson_id parameter to the value passed to the function
      $stmt->bindParam(':lesson_id', $lesson_id);

      // Execute the statement
      $stmt->execute();
    }

    //   // Check if the deletion was successful
    //   if ($stmt->rowCount() == 1) {
    //     // Print a message
    //     echo "Lesson deleted successfully";
    //   } else {
    //     // Print a message
    //     echo "Deletion from lessons failed";
    //   }
    // } else {
    //   // Print a message
    //   echo "Deletion from courses_lessons failed";
    // }
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
