<?php

namespace Controllers;

use Controllers\BaseController;
use Models\Excel;
use PDOException;




class HocBongController extends BaseController
{

  private $tb_name  = "thong_tin_hoc_sinh";
  private  $subject = 'HỌC BỔNG TRƯỜNG THCS VÀ THPT ĐINH THIỆN LÝ';

  public function index()
  {
    return $this->router->view("View/hoc-bong/admin_list.php");
  }
  public function export()
  {

    $data = $this->db->fetchAll($this->tb_name, "*", "delete_at IS NULL");
    $keys = [
      'dinh_kem_ho_ngheo', 'avatar', 'dinh_kem_giay_khen',
      'id', 'code', 'file_giay_to_khac_1',
      'file_giay_to_khac_1',
      'file_giay_to_khac_2', 'file_giay_to_khac_3',
      'file_giay_to_khac_4', 'dinh_kem_tieng_anh', 'dinh_kem_ho_so', 'dinh_kem_ho_so_cm_thu_nhap',
      'dinh_kem_thcs', 'dinh_kem_khuyet_tat', 'dinh_kem_ho_so_benh_an'
    ];
    $data = parent::unsetKeyFromArray($data, $keys);
    $excel = new Excel();
    $excel->export($data);
  }

  public function get()
  {

    $where = "code = '{$this->router->id}'";
    $result = $this->db->fetchAll($this->tb_name, "*", $where)[0];
    $myJson = json_encode(["msg" => "Signed Successful", "status" => 200, "data" => $result]);
    echo $myJson;
  }
  public function getAll()
  {

    $result = $this->db->fetchAll($this->tb_name, "*", "delete_at IS NULL");
    $myJson = json_encode(["msg" => "Signed Successful", "status" => 200, "data" => $result, "config" => $this->router]);

    echo $myJson;
  }
  public function delete()
  {

    try {

      if (isset($this->router->id)) {
        $id = $this->router->id;
        $date = date("Y-m-d H:i:s");
        $sql = "UPDATE  thong_tin_hoc_sinh SET delete_at ='{$date}' ";

        //remove the last ","
        $sql = rtrim($sql, ",");
        $sql .= " WHERE id = '$id'";
      } else {
        $myJson = json_encode(["msg" => "KHÔNG TỒN TẠI", "status" => 400, "errors" => []]);
        echo $myJson;
        die();
      }
   
      $result = $this->db->connectDB()->exec($sql);
      if ($result > 0) {
        $myJson = json_encode(["msg" => "XÓA THÀNH CÔNG", "status" => 200]);
        echo $myJson;
        die();
      } else {
        $myJson = json_encode(["msg" => "CHƯA CÓ GÌ THAY ĐỔI", "status" => 400, "errors" => []]);
        echo $myJson;
        die();
      }
    } catch (PDOException $e) {
      $myJson = json_encode(["msg" => "HỆ THỐNG KHÔNG XỬ LÝ ĐƯỢC!", "status" => 400, "errors" => [$e->getMessage()]]);
      echo $myJson;
      die();
    }
  }
  public function store()
  {


    try {



      $errors = [];
      $text = [];
      $number = [];



      $sql = "INSERT INTO thong_tin_hoc_sinh(";
      foreach ($_POST as $key => $value) {
        if ($key != 'avatar') {
          $sql .= "{$key},";
        }
      }

      foreach ($_FILES as $key => $file) {
        $sql .= "{$key},";
      }
      $sql .= "code,";
      $sql = rtrim($sql, ",");
      //Các trường bắt buột


      $sql .= ") VALUES (";
      foreach ($_POST as $key => $value) {
        if ($key != 'avatar') {
          $sql .= "'{$value}',";
        }
        if (empty($value)) {
          $errors[] = $key;
        }
      }

      $id_next = 1;
      //id of student next
      $sql_id = "SELECT id FROM thong_tin_hoc_sinh ORDER BY id DESC";
      $stmt = $this->db->connectString->prepare($sql_id);
      $stmt->execute();
      $id_next = $stmt->fetch()[0] + 1;

      $file_dir = "view/publish/images/thong_tin_hoc_sinh";
      $file_errors = [];
      foreach ($_FILES as $key => $file) {
        if ($file['error'] == 0) {
          $file_name = "{$key}" . "+" . $file['name'];


          $sql .= "'$file_dir/{$id_next}/{$file_name}',";

          if (!file_exists("$file_dir/{$id_next}")) {
            mkdir("{$file_dir}/{$id_next}", 0700, true);
          }

          move_uploaded_file($file['tmp_name'], "{$file_dir}/{$id_next}/" . $file_name);
        } else {
          $file_errors[] = $key;
          $sql .= $this->router->origin + "/404.html,";
        }
      }

      $number = $this->validate_number_hb();
      $text = $this->validate_text_hb($errors);
      $file = $this->validate_file_hb($file_errors);


      $this->responseText($text, $number, $file);
      //File
      $code = md5($id_next);
      $sql .= "'{$code}',";
      $sql = rtrim($sql, ",");
      $sql .= ")";


      $to_mail = $_POST['to_mail'];
      $message = 'Trường THCS và THPT Đinh Thiện Lý thông báo đã xác nhận đơn đăng ký  xin học bổng của bạn <b>' . $_POST['ho_ten_hs'] . '</b> ';
      $content = $this->writeContentMail($code, $message);
      if ($this->sendMail($content, $this->subject, $to_mail) == 1) {
        $myJson = json_encode(["msg" => "ĐĂNG KÍ THÀNH CÔNG", "status" => 200]);
        $result = $this->db->connectString->exec($sql);
        if ($result > 0) {
          echo $myJson;
          die();
        } else {
          $myJson = json_encode(["msg" => "ĐĂNG KÍ THẤT BẠI", "status" => 400, "errors" => []]);
        }
        echo $myJson;
        die();
      } else {
        $myJson = json_encode(["msg" => "GỬI MAIL THẤT BẠI, VUI LÒNG NHẬP MAIL", "status" => 400]);
        echo $myJson;
        die();
      }
    } catch (PDOException $e) {
      $myJson = json_encode(["msg" => "SERVER KHÔNG XỬ LÝ ĐƯỢC", "status" => 500, "errors" => $e->getMessage()]);
      echo $myJson;
      die();
    }
  }
  public function writeContentMail($id, $message)
  {
    $content = '<div class="hoc-bong" style="border: 1px dashed black;padding: 15px;background-color: gainsboro;">
      <div class="header" style="border-bottom:1px solid black;padding: 5px;text-transform: uppercase;font-weight: bold;">
        THÔNG BÁO TỪ TRƯỜNG THCS VÀ THPT ĐINH THIỆN LÝ
      </div>
      <div class="body">
          <p>' . $message . '</p>
          <p>Vui lòng truy cập vào xác nhận thông tin và in :  <a href="' . $this->router->origin . '/hoc-bong/form_hoc_bong?mode=view&id=' . $id . '">Xem và in </a></p>
          <p>Vui lòng truy cập vào đây để chỉnh sữa thông tin:  <a href="' . $this->router->origin . '/hoc-bong/form_hoc_bong?mode=edit&id=' . $id . '">Chỉnh sửa </a></p>
      </div>
    </div>';
    return $content;
  }
  public function updateCode()
  {
    $result = $this->db->fetchAll($this->tb_name);
    for ($i = 0; $i < count($result); $i++) {
      $id_not_md5 =  $result[$i]["id"];
      $result[$i]["id"] = md5($result[$i]["id"]);
      $update_code = "UPDATE thong_tin_hoc_sinh SET code = '" . $result[$i]["id"] . "' WHERE id = $id_not_md5";
      $stmt_code = $this->db->connectString->prepare($update_code);
      $stmt_code->execute();
    }
  }
  public function update()
  {


    try {

      if (isset($this->router->id)) {
        $id = $this->router->id;
        $errors = [];
        $number_validates = [];
        $sql = "UPDATE  thong_tin_hoc_sinh SET ";
        foreach ($this->request_post as $key => $value) {

          if ($key != 'avatar') {
            $sql .= "{$key} = '{$value}',";
          }

          if (empty($value)) {
            $errors[] = $key;
          }
          if (is_numeric($value)) {
            $number_validates[] = $key;
          }
        }

        //search id from db
        $sql_id = "SELECT id FROM thong_tin_hoc_sinh  WHERE code = '$id'";
        $stmt = $this->db->connectString->prepare($sql_id);
        $stmt->execute();
        $id_next = $stmt->fetch()[0];
        $randomString = $this->generateRandomString();
        $file_errors = [];
        $file_dir = "view/publish/images/thong_tin_hoc_sinh";
        foreach ($_FILES as $key => $file) {
        
          if ($file['error'] == 0 || $file['error'] == 1) {
            $file_name = "{$key}" . "+" . $file['name'];

            $sql .= "{$key} = '$file_dir/{$id_next}/$file_name',";

            if (!file_exists("$file_dir/{$id_next}/")) {
              mkdir("$file_dir/{$id_next}/", 0700, true);
            }
            move_uploaded_file($file['tmp_name'], "$file_dir/{$id_next}/" . $file_name);
          } else {
            $file_errors[] = $key;
          }
        }



        $text = $this->validate_text_hb($errors);
        $number = $this->validate_number_hb();


        if (count($number) > 0 || count($text) > 0) {
          $myJson = json_encode(
            [
              "msg" => "LỖI: THIẾU THÔNG TIN CẦN THIẾT ",

              "errors" => [
                'number' => $number,
                'text' => $text,
                'file' => $file
              ],
              "status" => 400
            ]
          );
          echo $myJson;
          die();
        }

        //remove the last ","
        $sql = rtrim($sql, ",");
        $sql .= " WHERE code = '$id'";

        $sql = rtrim($sql, ",");
      } else {
        $myJson = json_encode(["msg" => "KHÔNG TỒN TẠI", "status" => 400, "errors" => []]);
        echo $myJson;
        die();
      }
      $to_mail = $_POST['to_mail'];
      $result = $this->db->connectDB()->exec($sql);
      if ($result > 0) {
        if ($this->sendMail("<b>CẬP NHẬT THÀNH CÔNG</b>", $this->subject, $to_mail) == 1)
          $myJson = json_encode(["msg" => "CẬP NHẬT THÀNH CÔNG", "status" => 200]);
        else {
          $myJson = json_encode(["msg" => "GỬI MAIL THẤT BẠI, VUI LÒNG NHẬP MAIL", "status" => 200]);
        }
        echo $myJson;
        die();
      } else {
        $myJson = json_encode(["msg" => "CHƯA CÓ GÌ THAY ĐỔI", "status" => 400, "errors" => []]);
        echo $myJson;
        die();
      }
    } catch (PDOException $e) {
      $myJson = json_encode(["msg" => "HỆ THỐNG KHÔNG XỬ LÝ ĐƯỢC!", "status" => 400, "errors" => [$e->getMessage()]]);
      echo $myJson;
      die();
    }
  }
  public function responseText($text, $number, $file)
  {
    if (count($number) > 0 || count($text) > 0 || count($file) > 0) {
      $myJson = json_encode(
        [
          "msg" => "LỖI: THIẾU THÔNG TIN CẦN THIẾT ",

          "errors" => [
            'number' => $number,
            'text' => $text,
            'file' => $file
          ],
          "status" => 400
        ]
      );
      echo $myJson;
      die();
    }
  }
  public function validate_text_hb($errors)
  {
    $indispensable = [
      'ho_ten_hs', 'dan_toc', 'nam_sinh_hs', 'noi_sinh_hs',
      'dia_chi_thuong_tru_hs', 'dia_chi_cu_tru_hs', 'trinh_do_hoc_van_cha',
      'trinh_do_hoc_van_me', 'trinh_do_hoc_van_nguoi_giam_ho'
    ];

    return  parent::validate_text($errors, $indispensable);
  }
  public function validate_file_hb($errors)
  {
    $indispensable = [
      'dinh_kem_ho_ngheo'
    ];


    return  parent::validate_text($errors, $indispensable);
  }
  public function validate_number_hb()
  {
    $indispensable_number = ['nam_sinh_cha', 'nam_sinh_me'];
    return parent::validate_number($_POST, $indispensable_number);
  }
}
