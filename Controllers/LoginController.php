<?php
require_once "./Repositories/UserRepository.php";

class LoginController extends BaseController
{
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository;
    return $this;
  }

  public function index()
  {

    //go to view
    $this->view("login");
  }

  public function doPost($method)
  {
    switch ($method) {
      case "login":
        $this->login($_POST["username"], $_POST["password"]);
        break;
      case "logout":
        $this->logout($_POST["username"], $_POST["password"]);
      break; 
      default:
        return;
    }
  }

  public function login($username, $password)
  {
    $user = $this->userRepository->getUser($username, $password);
    if ($user instanceof UserModel) {
      // Start the session
      session_start();
      // Save the user id to the session
      global $a;
      $a = $user;
      $_SESSION["user"] = $user;
      if ($user->getUserRole() == 0) {
        require('HomeController.php');
      } else if ($user->getUserRole() == 1) {
        require('AdminController.php');
      }
    } else {
      $data["login_message"] = "Invalid username or password";
      $this->view("login", $data);
    }
  }

  public function logout(){
    session_destroy();
    $this->view("login");
  }
}

$loginController = new LoginController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $method = $_POST["method"];
  $loginController->doPost($method);
} else {
  $loginController->index();
}
