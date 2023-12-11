<?php
class AdminController extends BaseController
{
    public function __construct()
    {
      return $this;
    }

    public function index()
    {

      //go to view
      $this->view("admin_mainpage");
    }
}

$adminController = new AdminController();
$adminController-> index();