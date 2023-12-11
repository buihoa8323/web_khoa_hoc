<?php

class BaseController{

    public function model($model){
        $model_url = "./Models/".ucfirst($model).".php";
        require_once $model_url;
        return new $model();
    }

    public function view($view, $data=[]){
        str_replace(".", "/", $view);  //chuyen tu format x.y.z sang x/y/z.php
        $view_url = './Views/' .$view. '.php';
        require ($view_url);
    }

}
?>