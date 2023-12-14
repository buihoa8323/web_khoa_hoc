<?php
require_once "./Models/CourseModel.php";

//luu cac ham query database
class CourseRepository
{
  private $db;
  private $course_model;

  public function __construct()
  {
    $this->course_model = new CourseModel;
    $this->db = new DB();
    return $this;
  }

  //get all courses
  public function getAllCourses($courseNameFilter, $teacherNameFilter, $subjectFilter, $gradeFilter)
  {
    //$sql = "SELECT courses.*, subjects.subject_name AS subject_name, teachers.teacher_name AS teacher_name FROM courses JOIN subjects ON courses.subject_id = subjects.subject_id JOIN teachers ON courses.teacher_id = teachers.teacher_id;";
    //$sql = "SELECT courses.*, subjects.subject_name AS subject_name, teachers.teacher_name AS teacher_name FROM courses JOIN subjects ON courses.subject_id = subjects.subject_id JOIN teachers ON courses.teacher_id = teachers.teacher_id WHERE (courses.course_name LIKE '%$courseNameFilter%' OR '$courseNameFilter' IS NULL) AND (teachers.teacher_name LIKE '%$teacherNameFilter%' OR '$teacherNameFilter' IS NULL) AND (subjects.subject_name = '$subjectFilter' OR '$subjectFilter' IS NULL) AND (courses.couses_grade = '$gradeFilter' OR '$gradeFilter' IS NULL);";
    //$sql = "SELECT courses.*, subjects.subject_name AS subject_name, teachers.teacher_name AS teacher_name FROM courses JOIN subjects ON courses.subject_id = subjects.subject_id JOIN teachers ON courses.teacher_id = teachers.teacher_id WHERE (courses.course_name LIKE '%$courseNameFilter%' OR ". ($courseNameFilter == NULL? 'NULL' : "'".$courseNameFilter."'"). " IS NULL)";
    $sql = "SELECT courses.*, subjects.subject_name AS subject_name, teachers.teacher_name AS teacher_name FROM courses JOIN subjects ON courses.subject_id = subjects.subject_id JOIN teachers ON courses.teacher_id = teachers.teacher_id 
    WHERE 
    (courses.course_name LIKE '%$courseNameFilter%' OR " . ($courseNameFilter == NULL ? 'NULL' : "'" . $courseNameFilter . "'") . " IS NULL) 
    AND (teachers.teacher_name LIKE '%$teacherNameFilter%' OR " . ($teacherNameFilter == NULL ? 'NULL' : "'" . $teacherNameFilter . "'") . " IS NULL) 
    AND (subjects.subject_id = '$subjectFilter' OR " . ($subjectFilter == NULL ? 'NULL' : "'" . $subjectFilter . "'") . " IS NULL) 
    AND (courses.couses_grade = '$gradeFilter' OR " . ($gradeFilter == NULL ? 'NULL' : "'" . $gradeFilter . "'") . " IS NULL)
    ORDER BY courses.course_id DESC;";

    $result = $this->db->connnection->query($sql);

    // Check if the result set has more than 0 rows
    if ($result->rowCount() > 0) {
      // Use a loop to fetch each row from the result set as an associative array
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Append each row to the courses array
        $courses[] = $row;
      }
    }

    foreach ($courses as $c) {
      $course_list[] = clone $this->getCourseItemFromQuery($c);
    }

    //when retrieve course from database , save data to a course object 
    return $course_list;
    $this->db->connnection = null;
  }

  //get all courses for displaying course to user
  public function getAllCoursesUser($courseNameFilter, $teacherNameFilter, $subjectFilter, $gradeFilter)
{
  $sql = "SELECT courses.*, subjects.subject_name AS subject_name, teachers.teacher_name AS teacher_name FROM courses JOIN subjects ON courses.subject_id = subjects.subject_id JOIN teachers ON courses.teacher_id = teachers.teacher_id 
  WHERE 
  (courses.course_name LIKE '%$courseNameFilter%' OR " . ($courseNameFilter == NULL ? 'NULL' : "'" . $courseNameFilter . "'") . " IS NULL) 
  AND (teachers.teacher_name LIKE '%$teacherNameFilter%' OR " . ($teacherNameFilter == NULL ? 'NULL' : "'" . $teacherNameFilter . "'") . " IS NULL) 
  AND (subjects.subject_id = '$subjectFilter' OR " . ($subjectFilter == NULL ? 'NULL' : "'" . $subjectFilter . "'") . " IS NULL) 
  AND (courses.couses_grade = '$gradeFilter' OR " . ($gradeFilter == NULL ? 'NULL' : "'" . $gradeFilter . "'") . " IS NULL)
  AND (courses.couses_status = true)
  ORDER BY courses.course_id DESC;";

  $result = $this->db->connnection->query($sql);

  // Check if the result set has more than 0 rows
  if ($result->rowCount() > 0) {
    // Use a loop to fetch each row from the result set as an associative array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      // Append each row to the courses array
      $courses[] = $row;
    }
  }

  foreach ($courses as $c) {
    $course_list[] = clone $this->getCourseItemFromQuery($c);
  }

  //when retrieve course from database , save data to a course object 
  return $course_list;
  $this->db->connnection = null;
}

  //get a number of course
  public function getNumberOfCourseUser($courseNameFilter, $teacherNameFilter, $subjectFilter, $gradeFilter, $number)
{
  $sql = "SELECT courses.*, subjects.subject_name AS subject_name, teachers.teacher_name AS teacher_name FROM courses JOIN subjects ON courses.subject_id = subjects.subject_id JOIN teachers ON courses.teacher_id = teachers.teacher_id 
  WHERE 
  (courses.course_name LIKE '%$courseNameFilter%' OR " . ($courseNameFilter == NULL ? 'NULL' : "'" . $courseNameFilter . "'") . " IS NULL) 
  AND (teachers.teacher_name LIKE '%$teacherNameFilter%' OR " . ($teacherNameFilter == NULL ? 'NULL' : "'" . $teacherNameFilter . "'") . " IS NULL) 
  AND (subjects.subject_id = '$subjectFilter' OR " . ($subjectFilter == NULL ? 'NULL' : "'" . $subjectFilter . "'") . " IS NULL) 
  AND (courses.couses_grade = '$gradeFilter' OR " . ($gradeFilter == NULL ? 'NULL' : "'" . $gradeFilter . "'") . " IS NULL)
  AND (courses.couses_status = true)
  ORDER BY courses.course_id DESC
  LIMIT $number;";

  $result = $this->db->connnection->query($sql);

  // Check if the result set has more than 0 rows
  if ($result->rowCount() > 0) {
    // Use a loop to fetch each row from the result set as an associative array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      // Append each row to the courses array
      $courses[] = $row;
    }
  }

  foreach ($courses as $c) {
    $course_list[] = clone $this->getCourseItemFromQuery($c);
  }

  //when retrieve course from database , save data to a course object 
  return $course_list;
  $this->db->connnection = null;
}

  public function getCourseById($course_id)
  {
    $sql = "SELECT courses.*, subjects.subject_name AS subject_name, teachers.teacher_name AS teacher_name FROM courses JOIN subjects ON courses.subject_id = subjects.subject_id JOIN teachers ON courses.teacher_id = teachers.teacher_id 
    WHERE courses.course_id = $course_id";
    $result = $this->db->connnection->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $this->getCourseItemFromQuery($row);
  }

  public function updateCourseStatusById($course_id, $status){
    $sql = "UPDATE courses SET 
    couses_status= :course_status,
    update_at = :update_at WHERE course_id = :course_id";

    // Prepare the statement and get the PDOStatement object
    $stmt = $this->db->connnection->prepare($sql);
    $date = date('Y-m-d');

    // Bind the parameters and values
    $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
    $stmt->bindParam(':course_status', $status, PDO::PARAM_BOOL);
    $stmt->bindParam(':update_at', $date, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();
  }

  //insert new course to db
  public function create($course_name, $teacher_id, $course_price, $course_des, $subject_id, $course_grade, $course_image)
  {
    // Define the SQL statement for inserting data, omitting the course_id and course_status columns
    $sql = "INSERT INTO courses (subject_id, teacher_id, course_name, course_image, course_price, course_des, couses_status, couses_grade, created_at, update_at) 
    VALUES (:subject_id, :teacher_id, :course_name, :course_image, :course_price, :course_des, :course_status, :course_grade, :created_at, :update_at)";

    // Prepare the statement and get the PDOStatement object
    $stmt = $this->db->connnection->prepare($sql);
    $status = true;
    $date = date('Y-m-d');

    // Bind the parameters and values
    $stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_STR);
    $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
    $stmt->bindParam(':course_name', $course_name, PDO::PARAM_STR);
    $stmt->bindParam(':course_image', $course_image, PDO::PARAM_STR);
    $stmt->bindParam(':course_price', $course_price, PDO::PARAM_STR);
    $stmt->bindParam(':course_status', $status, PDO::PARAM_BOOL);
    $stmt->bindParam(':course_des', $course_des, PDO::PARAM_STR);
    $stmt->bindParam(':course_grade', $course_grade, PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
    $stmt->bindParam(':update_at', $date, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();
    // $this->db->connnection = null;
  }

  //update existed course to db
  public function update($course_id, $course_name, $teacher_id, $course_price,$course_status, $course_des, $subject_id, $course_grade, $course_image)
  {
    $updateImage = false;
    if(!$course_image == ''){
      $updateImage= true;
    }
    // Define the SQL statement for updating data
    $sql = "UPDATE courses SET 
    course_name = :course_name, 
    course_price = :course_price, 
    course_des = :course_des, 
    subject_id = :subject_id, 
    couses_grade = :course_grade, 
    teacher_id = :teacher_id,
    couses_status= :course_status,
    update_at = :update_at WHERE course_id = :course_id";

    if($updateImage){
      $sql = "UPDATE courses SET 
      course_name = :course_name, 
      course_price = :course_price, 
      course_des = :course_des, 
      subject_id = :subject_id, 
      couses_grade = :course_grade, 
      course_image = :course_image, 
      teacher_id = :teacher_id,
      couses_status= :course_status,
      update_at = :update_at WHERE course_id = :course_id";
    }

    // Prepare the statement and get the PDOStatement object
    $stmt = $this->db->connnection->prepare($sql);
    $date = date('Y-m-d');

    // Bind the parameters and values
    $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
    $stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_STR);
    $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
    $stmt->bindParam(':course_name', $course_name, PDO::PARAM_STR);
    if($updateImage){
      $stmt->bindParam(':course_image', $course_image, PDO::PARAM_STR);
    }
    $stmt->bindParam(':course_price', $course_price, PDO::PARAM_STR);
    $stmt->bindParam(':course_status', $course_status, PDO::PARAM_BOOL);
    $stmt->bindParam(':course_des', $course_des, PDO::PARAM_STR);
    $stmt->bindParam(':course_grade', $course_grade, PDO::PARAM_STR);
    $stmt->bindParam(':update_at', $date, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();
  }

  public function delete($coure_id)
  {
    $sql = "DELETE FROM courses WHERE course_id = $coure_id";
    $this->db->connnection->prepare($sql)->execute();
  }

  public function getCourseItemFromQuery($courseQuery)
  {
    //when retrieve course from database , save data to a course object 
    $courseItem = $this->course_model->CourseModel(
      $courseQuery["course_id"],
      $courseQuery["subject_id"],
      $courseQuery["course_name"],
      $courseQuery["course_image"],
      $courseQuery["course_price"],
      $courseQuery["course_des"],
      $courseQuery["couses_status"],
      $courseQuery["couses_grade"],
      $courseQuery["created_at"],
      $courseQuery["update_at"],
      $courseQuery["teacher_name"],
      $courseQuery["subject_name"],
      $courseQuery["teacher_id"]
    );
    return $courseItem;
  }
}
