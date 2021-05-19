<?php

namespace Controllers;

use DB\DBConnect;
use Models\Route;
use Config\WebConfig;
use PHPExcel;
use Email\Email;
use PHPExcel_IOFactory;
use PHPExcel_Style_Fill;
use ZipArchive;

include_once "Models/Email.php";

class BaseController
{

  public $db;
  public $action;
  public $request_post;
  public $router;
  public $config;
  public $table = "thong_tin_hoc_sinh";
  public $requestMethod;



  public function __construct()
  {
    $this->request_post = $_POST;
    $this->db = new DBConnect();
    $this->router = new Route();
    $this->config  = new WebConfig('pages/internal/quan_li_file');
  }
  /**
   * Tạo file Excel từ array
   * 
   * @param $col_names array tùy chỉnh tên cột, lưu ý: Thứ tự cột theo đúng values
   * @param $data array dữ liệu đầu vào gồm $key-tên cột và $value-giá trị 
   * @return Excel File
   */
  public function exportExcel($data, $col_names = null)
  {

    require_once dirname(__DIR__) . "../PHPExcel/Classes/PHPExcel.php";


    $excel = new PHPExcel();

    $excel->setActiveSheetIndex(0);

    $excel->getActiveSheet()->setTitle('data');
    $col_last = "AA1";

    $array = $data[0];
    $i = 0;
    $j = 0;
    $k = 0;

    if ($col_names == null) {
      foreach ($array as $key => $value) {
        if (!is_numeric($key)) {
          if ($i < 26) {
            $excel->getActiveSheet()->getColumnDimension(chr(321 + $i))->setWidth(20);
            $excel->getActiveSheet()->setCellValue(chr(321 + $i) . "1", $key);
          } else {
            $colName = chr(321 + $k) . chr(321 + $j);
            $excel->getActiveSheet()->getColumnDimension($colName)->setWidth(20);
            $excel->getActiveSheet()->setCellValue($colName . "1", $key);
            if ($j < 25) {
              $j++;
            } else {
              $j = 0;
              $k++;
            }
            $col_last = $colName . "1";
          }
          $i++;
        }
      }
    } else {
      foreach ($col_names as $key) {
        if (!is_numeric($key)) {
          if ($i < 26) {
            $excel->getActiveSheet()->getColumnDimension(chr(321 + $i))->setWidth(20);
            $excel->getActiveSheet()->setCellValue(chr(321 + $i) . "1", $key);
          } else {
            $colName = chr(321 + $k) . chr(321 + $j);
            $excel->getActiveSheet()->getColumnDimension($colName)->setWidth(20);
            $excel->getActiveSheet()->setCellValue($colName . "1", $key);
            if ($j < 25) {
              $j++;
            } else {
              $j = 0;
              $k++;
            }
            $col_last = $colName . "1";
          }
          $i++;
        }
      }
    }

    //Set style
    $excel->getActiveSheet()->getStyle('A1:DD1')->getFont()->setBold(true);
    $excel->getActiveSheet()->getStyle("A1:$col_last")->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()
      ->setARGB('FF808080');

    $numRow = 2;

    foreach ($data as $rows) {
      $j = 0;
      $k = 0;
      $i = 0;
      foreach ($rows as $key => $row) {
        if (!is_numeric($key)) {
          if ($i < 26) {
            $colName = 321 + $i;
            $excel->getActiveSheet()->setCellValue(chr($colName) . $numRow, $rows[$key], 'UTF-8');
          } else {
            $colName = chr(321 + $k) . chr(321 + $j);
            $excel->getActiveSheet()->setCellValue($colName . $numRow, $rows[$key], 'UTF-8');
            if ($j < 25) {
              $j++;
            } else {
              $j = 0;
              $k++;
            }
          }
          $i++;
        }
      }
      $numRow++;
    }

    ob_end_clean();
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="data.xls"');
    header('Cache-Control: max-age=0');
    PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
  }
  public function unsetKeyFromArray($data = [], $unset_keys = [])
  {
    if (is_array($data) || is_object($data))
    foreach ($data as $index => $array) {
      foreach ($array as $key) {
        foreach ($unset_keys as $key_delete) {
          if ($key == $key_delete) {
            unset($data[$index][$key]);
          }
        }
      }
    }
    return $data;
  }
  public function importExcel()
  {
    return ['adf'];
  }
  public function index()
  {

    return  $this->router->view("view/hoc-bong/admin_list.php");
  }
  public function getConfig()
  {
    echo json_encode($this->router);
  }
  public function get()
  {

    // $this->db->fetchAll($this->table);
    // echo $this->db->fetchAll($this->table, "*", "where id=$id");
  }
  public function getAlls()
  {

    $this->db->fetchAll($this->table);
    var_dump($this->db->fetchAll($this->table));
  }
  protected static function validate_text($errors, $indispensable)
  {

    $array = [];
    if (is_array($errors) > 0) {
      for ($i = 0; $i < count($errors); $i++) {
        for ($j = 0; $j < count($indispensable); $j++) {
          if ($errors[$i] == $indispensable[$j]) {
            $array[] = $indispensable[$j];
          }
        }
      }
    }



    return $array;
  }
  protected static function validate_number($errors, $indispensable_number)
  {
    $array = [];

    for ($i = 0; $i < count($indispensable_number); $i++) {
      if (!is_numeric($errors[$indispensable_number[$i]]) && !empty($errors[$indispensable_number[$i]])) {
        $array[] = $indispensable_number[$i];
      }
    }


    return $array;
  }
  protected static function validateEmpty($indispensables, $request, $string = ' bị bỏ trống')
  {
    $errors = [];
    foreach ($request as $key => $value) {
      if (empty($value)) {
        $errors[] = $key;
      }
    }

    $array = [];

    foreach ($errors as $error) {

      foreach ($indispensables as $key_indis => $item) {

        if ($error == $key_indis) {

          $array[$key_indis] = $item . $string;
        }
      }
    }

    return $array;
  }
 
  public function response($msg, $status = 200, $error = [], $data = [])
  {
    $response = ['msg' => $msg, 'status' => $status];
    if (count($error) > 0)
      $response['error'] = $error;
    if (count($data) > 0)
      $response['data'] = $data;
    echo json_encode($response);
    exit();
  }
  
  protected static function validateFileEmpty($indispensables)
  {
    foreach ($_FILES as $key => $value) {
      if (empty($value['name'])) {
        $errors[] = $key;
      }
    }

    $array = [];

    foreach ($errors as $error) {

      foreach ($indispensables as $key_indis => $item) {

        if ($error == $key_indis) {

          $array[$key_indis] = $item . " bị bỏ trống";
        }
      }
    }

    return $array;
  }
  public function generateRandomString($length = 10)
  {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  public function create()
  {
  }
  protected function store()
  {
  }
  public function update()
  {
  }

  public function notFoundResponse()
  {
  }
  public function processRequest()
  {
    switch ($this->requestMethod) {
      case 'GET':
        if ($this->Id) {
          $response = $this->get($this->Id);
        } else {
          $response = $this->getAlls();
        };
        break;
      case 'POST':
        $response = $this->create();
        break;
      case 'PUT':
        $response = $this->update($this->Id);
        break;
      case 'DELETE':

        break;
      default:
        $response = $this->notFoundResponse();
        break;
    }
    header($response['status_code_header']);
    if ($response['body']) {
      echo $response['body'];
    }
  }

  public function sendMail($content, $subject, $to_mail)
  {

    $_REQUEST['content'] = $content;
    $_REQUEST['subject'] = $subject;
    $_REQUEST['to_mail'] = $to_mail;
    $mail = new Email();
    return  $mail->sendMail();
  }
  public function archiveFiles($archive_file_name, $archive_path, $file_names, $path_name)
  {


    $path = $this->config->getRoot() . "/";

    $zip_path = $path . $archive_path . $archive_file_name;

    if (!file_exists($path . $archive_path)) {
      mkdir($path . $archive_path, 0700, true);
    }
    $zip = new ZipArchive();
    if ($zip->open($zip_path, ZIPARCHIVE::CREATE) !== TRUE) {
      exit("Cannot open <$archive_file_name>\n");
    }

    foreach ($file_names as $files) {
      $zip->addFile($path . $path_name . $files, $files);
    }

    ob_end_clean();
    $zip->close();
    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=$archive_file_name");
    header("Content-length: " . filesize($zip_path));
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile("$zip_path");
    unlink("$zip_path");
    exit();
  }
}
