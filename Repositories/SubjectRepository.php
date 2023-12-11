<?php
require_once "./Models/SubjectModel.php";
class SubjectRepository
{
  private $db;
  private $subject_model;

  public function __construct()
  {
    $this->subject_model = new SubjectModel;
    $this->db = new DB();
    return $this;
  }

  public function getAllSubject()
  {
    $sql = "SELECT * FROM subjects";
    $result = $this->db->connnection->query($sql);

    // Check if the result set has more than 0 rows
    if ($result->rowCount() > 0) {
      // Use a loop to fetch each row from the result set as an associative array
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Append each row to the courses array
        $courses[] = $row;
      }
    } else {
      // If the result set has 0 rows, print a message
      echo "0 results";
    }

    foreach ($courses as $c) {
      $subject_list[] = clone $this->getSubjectItemFromQuery($c);;
    }

    //when retrieve course from database , save data to a course object 
    return $subject_list;
    $this->db->connnection = null;
  }

  //turn result from query to an SubjectModel instance
  public function getSubjectItemFromQuery($subjectQuery)
  {
    //when retrieve course from database , save data to a course object 
    $courseItem = $this->subject_model->SubjectModel(
      $subjectQuery["subject_id"],
      $subjectQuery["subject_name"],
      $subjectQuery["subject_des"],
    );
    return $courseItem;
  }
}
