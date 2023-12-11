<?php
require_once "./Repositories/UserRepository.php";
class RegisterController extends BaseController
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
    $this->view("register");
  }

  //handle post request
  public function doPost($method)
  {
    switch ($method) {
      case "register":
        $this->register($_POST["username"], $_POST["password"], $_POST["birthday"], $_POST["address"], $_POST["gmail"]);
        break;
      default:
        return;
    }
  }

  public function register($username, $password, $birthday, $address, $gmail){
    $this->userRepository->create($username, $password, $birthday, $address, $gmail, 0);
    //return to login
    $this->view("login");
  }
}

$registerController = new RegisterController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $method = $_POST["method"];
  $registerController->doPost($method);
} else {
  $registerController->index();
}
