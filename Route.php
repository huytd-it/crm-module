<?php

namespace Models;

use Config\WebConfig;
use Controllers\BaseController;
use Controllers\DuTuyenController;
use Controllers\HocBongController;
use Controllers\UniformController;
use \Exception;

class Route
{


  public $controller;
  public $page;
  public $root;
  public $action;
  public $id;
  public $origin;
  public $url;
  private $urls = [
    'form_hoc_bong',
    'du-tuyen-form'
  ];
  public function __construct()
  {
   
    $this->root = $_SERVER['DOCUMENT_ROOT'] . '/';
    $this->origin = (new WebConfig('pages/internal/quan_li_file'))->getOrigin();
    $this->setParam();
  }
  public function redirect()
  {
  }

  public function setParam()
  {



    $this->controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : null;
    $this->page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    $this->action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    $this->id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
  }
  public function checkGET($param)
  {
    return isset($param) ? $param : null;
  }
  public function view($link_file = null)
  {
    try {



      if (file_exists($link_file) == 1) {
        if (!in_array($this->page, $this->urls)) {
          include_once "View/header.php";
          // echo file_get_contents("{$this->origin}/View/header.php", false, $context);

        } else {
          include "./View/javascript.php";
        }

        include_once "$link_file";
        if (!in_array($this->page, $this->urls)) {
          include_once "View/footer.php";
      

        }
      } else {
        echo file_get_contents("404.html");
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
  public function assets($url)
  {
    return $this->origin . "View/publish" . $url;
  }
}


define('PATH_ROOT', __DIR__);
  

spl_autoload_register(function ($class_name) {
  include_once PATH_ROOT . '/' . $class_name . '.php';
});

$route = new Route();

$link = "View/{$route->controller}/{$route->page}.php";
$con = new BaseController();

switch ($route->page) {
  case 'hoc-bong': {
      $con = new HocBongController();
      if ($route->action) {
       
        return $con->{$route->action}();
      } else if ($route->page) {
        return $route->view($link);
      } else {
        return $con->index();
      }
    }
  case 'du-tuyen': {
   
      $con = new DuTuyenController();
      if ($route->action) {
        return $con->{$route->action}();
      } else if ($route->page) {
        return $route->view($link);
      } else {
        return $con->index();
      }
    }
  case 'uniform': {
   
      $con = new UniformController();
      if ($route->action) {
        return $con->{$route->action}();
      } else if ($route->page) {
        return $route->view($link);
      } else {
        return $con->index();
      }
    }
  case 'base': {
      if ($route->action) {
        return $con->{$route->action}();
      } else if ($route->page) {
        return $route->view($link);
      }
    }
 
  default: {
      return $route->view();
    }
}

