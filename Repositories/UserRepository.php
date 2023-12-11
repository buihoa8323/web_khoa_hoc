<?php
require_once "./Models/UserModel.php";

//luu cac ham query database
class UserRepository
{
  private $db;
  private $user_model;

  public function __construct()
  {
    $this->user_model = new UserModel;
    $this->db = new DB();
    return $this;
  }

  public function getUser($username, $password)
  {

    // Prepare a SQL statement to select the password and id from the user table where the username matches the input
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $this->db->connnection->prepare($sql);
    // Bind the username parameter to the statement
    $stmt->bindValue(1, $username);
    // Execute the statement
    $stmt->execute();
    // Fetch the result as an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the result is not empty and the password matches the hashed password stored in the database
    if ($row && $password == $row['user_pass']) {
      // Return the user id
      return $this->getUserFromQuery($row);
    } else {
      // Return false if the login failed
      return false;
    }
  }

  public function create($user_name, $user_pass, $user_dob, $user_address, $user_mail, $user_role)
  {
    // Define the SQL statement for inserting data, omitting the user_id, created_at and updated_at columns
    $sql = "INSERT INTO users (user_name, user_pass, user_dob, user_address, user_mail, user_role, created_at, updated_at) 
  VALUES (:user_name, :user_pass, :user_dob, :user_address, :user_mail, :user_role, :created_at, :updated_at)";

    // Prepare the statement and get the PDOStatement object
    $stmt = $this->db->connnection->prepare($sql);
    $date = date('Y-m-d');

    // Bind the parameters and values
    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindParam(':user_pass', $user_pass, PDO::PARAM_STR);
    $stmt->bindParam(':user_dob', $user_dob, PDO::PARAM_STR);
    $stmt->bindParam(':user_address', $user_address, PDO::PARAM_STR);
    $stmt->bindParam(':user_mail', $user_mail, PDO::PARAM_STR);
    $stmt->bindParam(':user_role', $user_role, PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $date, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();
    // $this->db->connnection = null;
  }

  //turn user from query record to a user model
  public function getUserFromQuery($userQuery)
  {
    $userItem = $this->user_model->UserModel(
      $userQuery["user_id"],
      $userQuery["user_name"],
      $userQuery["user_pass"],
      $userQuery["user_dob"],
      $userQuery["user_address"],
      $userQuery["user_mail"],
      $userQuery["user_role"],
      $userQuery["created_at"],
      $userQuery["updated_at"]
    );
    return $userItem;
  }
}
