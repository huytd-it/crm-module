<?php

namespace Controllers;

use Controllers\BaseController;
use Exception;
use Models\Excel;

class DuTuyenController extends BaseController
{

  private $tb_name  = "nguoi_ung_tuyen";
  private  $subject = 'TRƯỜNG THCS VÀ THPT ĐINH THIỆN LÝ';

  public function index()
  {
    return $this->router->view("View/du-tuyen/du-tuyen-admin.php");
  }
  public function form()
  {
    return $this->router->view("/du-tuyen/du-tuyen-form");
  }
  public function get()
  {
    

    $where = "id = {$this->router->id}";

    $result = $this->db->fetchAll($this->tb_name, "*", $where)[0];
    $myJson = json_encode(["msg" => "Signed Successful", "status" => 200, "data" => $result]);

    echo $myJson;
  }
  public function export()
  {

    $data = $this->db->fetchAll($this->tb_name, '*', 'delete_at IS NULL');
    $unset_key = ['id', 'avatar', 'type', 'file_1', 'file_2', 'file_3', 'file_4', 
    'file_5', 'ma_du_tuyen', 'now_ngay', 'now_thang', 'now_nam',
    'trung_cap_1',	'cao_dang_1',	'cu_nhan_1',	'thac_si_1',	'trung_cap_2',	'cao_dang_2',	'cu_nhan_2',	'thac_si_2',	'delete_at',
  ];
    $data = parent::unsetKeyFromArray($data, $unset_key);
    $col_names = [
      'Full Name', 'Full-time teachers - Subject', 'DOB', 'Weight', 'Height', 'Sexual',
      'Marital Status', 'ID Number', 'Ethnic', 'Religion', 'Temporary Address', 'Phone Number',
      'Email', 'Permanent Address', 'Temporary Working Place', 'Recruitment Source', 'Name of the University 1',
      'Faculty 1', 'Major 1', 'Starting Month', 'Starting Year',
      'Ending Month', 'Ending Year', 
      'Name of the University 2',
      'Faculty 2', 'Major 2', 'Starting Month', 'Starting Year',
      'Ending Month', 'Ending Year', 
      'Language Skills', 'Computer Skills',
      'Working Places 1', 'Positions',  'Starting Month', 'Starting Year','Ending Month', 'Ending Year', 
      'Working Places 2', 'Positions',  'Starting Month', 'Starting Year','Ending Month', 'Ending Year', 
      'Working Places 3', 'Positions',  'Starting Month', 'Starting Year','Ending Month', 'Ending Year', 
      'Working Places 4', 'Positions',  'Starting Month', 'Starting Year','Ending Month', 'Ending Year', 
      'Interests', 'Talents', 'Rewards', 'Achievements ', 
      'Name of Classes/Courses 1', 'Time', 'Places',
      'Name of Classes/Courses 2', 'Time', 'Places',
      'Name of Classes/Courses 3', 'Time', 'Places',
      'Name of Classes/Courses 4', 'Time', 'Places',
      'Name of Classes/Courses 5', 'Time', 'Places',
      'Reference Check Name 1', 'Position', 'Phone ',
      'Reference Check Name 2', 'Position', 'Phone ', 
      'Created At',
      

      
    ];
    $excel = new Excel();
    $excel->export($data, $col_names);
  }

  public function delete()
  {

    try {
     
      if (isset($this->router->id)) {
        $id = $this->router->id;
        $date = date("Y-m-d H:i:s");
        $sql = "UPDATE  {$this->tb_name} SET delete_at ='{$date}' ";

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
    } catch (Exception $e) {
      $myJson = json_encode(["msg" => "HỆ THỐNG KHÔNG XỬ LÝ ĐƯỢC!", "status" => 400, "errors" => [$e->getMessage()]]);
      echo $myJson;
      die();
    }
  }
  public function getAll()
  {

    $result = $this->db->fetchAll($this->tb_name, "*", 'delete_at IS NULL');
    $myJson = json_encode(["msg" => "Signed Successful", "status" => 200, "data" => $result, "config" => $this->router]);

    echo $myJson;
  }

  public function store()
  {
    // $validates = $this->validate();
    // if (count($validates) > 0) {
    //   $myJson = json_encode(["msg" => "ĐĂNG KÍ THẤT BẠI", "status" => 400, "errors" => $validates]);
    //   echo $myJson;
    //   die();
    // }
    $sql_values = "";
    $sql_cols = "";

    $id_next = 0;
    $id_sql = $this->db->fetchAll($this->tb_name, 'id', 'delete_at IS NULL Order by  id desc');
    $id_next = !empty($id_sql) ? $id_sql[0]['id'] : 0;
    $id_next = $id_next + 1;

    $files = $_FILES;
    $uploads_dir = "view/publish/images/nguoi_ung_tuyen/{$id_next}/";
    foreach ($files as $key => $file) {
      if ($file['error'] == 0) {
        if (!file_exists($uploads_dir)) {
          mkdir($uploads_dir, 0700, true);
        }
        
        $filename = iconv("utf-8","cp1258",$file['name']);
    
        move_uploaded_file($file['tmp_name'], $uploads_dir .$filename);
        $this->request_post[$key] = $uploads_dir . $filename;
      } else {
        $this->request_post[$key] = '';
      }
    }

    $validates = $this->validate();
    if (count($validates) > 0) {
      $myJson = json_encode(["msg" => "ĐĂNG KÍ THẤT BẠI", "status" => 400, "errors" => $validates]);
      echo $myJson;
      die();
    }
    $this->request_post['created_at'] = date("Y-m-d h:i:sa");
    foreach ($this->request_post as $key => $value) {
      if (!empty($value)) {
        $sql_cols .= "{$key},";
        $sql_values .= "'{$value}',";
      }
    }

    $sql_cols .= "";
    $sql_values = rtrim($sql_values, ",");
    $sql_cols = rtrim($sql_cols, ",");
    $result = $this->db->insertDB($this->tb_name, $sql_cols, $sql_values);
    $content = $this->writeContentMail($id_next, 'ĐĂNG KÍ THÀNH CÔNG');
    $data = $this->db->fetchAll('setting', 'email', 'form_type_id = 1')[0];
    if ($result) {
  
      echo json_encode(["msg" => "ĐĂNG KÍ THÀNH CÔNG", "status" => 200]);
      $this->sendMail($content, $this->subject, $_POST['email']);
      $this->sendMail($content, $this->subject, $data['email']);
      die();
    } else {
      $myJson = json_encode(["msg" => "ĐĂNG KÍ THẤT BẠI", "status" => 400]);
      echo $myJson;
      die();
    }
  }

  public function validate()
  {
    $indispensables = [
      'ho_ten' => 'Họ tên',
      'bo_mon' => 'Bộ môn',
      'ngay_sinh' => 'Ngày sinh',
      'can_nang' => 'Cân nặng',
      'chieu_cao' => 'Chiều cao',
      'dan_toc' => 'Dân tộc',
      'so_cm' => 'Số chứng minh nhân dân',
      'hon_nhan' => 'Hôn nhân',
      'noi_o_hien_tai' => 'Nơi ở hiện tại',
      'sdt' => 'Số điện thoại',
      'noi_cong_tac' => 'Nơi công tác hiện tại',
      'email' => 'Email', 'gioi_tinh' => 'Giới tính',
      'dan_toc' => 'Dân tộc',
      'dia_chi_lien_lac' => 'Địa chỉ liên lạc',
      'ton_giao' => 'Tôn giáo',
      'nguon_thong_tin' => 'Nguồn thông tin',
      'file_1' => 'File đính kèm ',
      'ten_truong_1' => 'Tên trường',
      // 'khoa_1' => 'Khoa',
      // 'nganh_1' => 'Ngành',
      // 'thang_1' => 'Tháng bắt đầu',
      // 'nam_1' => 'Năm bắt đầu',
      // 'thang_2' => 'Tháng kết thúc',
      // 'nam_2' => 'Năm kết thúc', 
      'ngoai_ngu' => 'Ngoại ngữ',
      'tin_hoc' => 'Tin học',
      'don_vi_cong_tac_1' => 'Kinh nghiệm làm việc',
      'ten_nguoi_lien_he_1' => 'Người liên hệ tham chiếu'
    ];

    return self::validateEmpty($indispensables, $this->request_post);
  }
  public function updateValidate()
  {
    $indispensables = [
      'ho_ten' => 'Họ tên',
      'bo_mon' => 'Bộ môn',
      'ngay_sinh' => 'Ngày sinh',
      'can_nang' => 'Cân nặng',
      'chieu_cao' => 'Chiều cao',
      'dan_toc' => 'Dân tộc',
      'so_cm' => 'Số chứng minh nhân dân',
      'hon_nhan' => 'Hôn nhân',
      'noi_o_hien_tai' => 'Nơi ở hiện tại',
      'sdt' => 'Số điện thoại',
      'noi_cong_tac' => 'Nơi công tác hiện tại',
      'email' => 'Email', 'gioi_tinh' => 'Giới tính',
      'dan_toc' => 'Dân tộc',
      'dia_chi_lien_lac' => 'Địa chỉ liên lạc',
      'ton_giao' => 'Tôn giáo',
      'nguon_thong_tin' => 'Nguồn thông tin'
    ];
    return self::validateEmpty($indispensables, $this->request_post);
  }
  public function writeContentMail($id, $message)
  {
    $content = '<div class="hoc-bong" style="border: 1px dashed black;padding: 15px;background-color: gainsboro;">
      <div class="header" style="border-bottom:1px solid black;padding: 5px;text-transform: uppercase;font-weight: bold;">
        THÔNG BÁO TỪ TRƯỜNG THCS VÀ THPT ĐINH THIỆN LÝ
      </div>
      <div class="body">
          <p>' . $message . '</p>
          <p>Vui lòng truy cập vào xác nhận thông tin và in :  <a href="' . $this->router->origin . '/du-tuyen/du-tuyen-form?mode=view&id=' . $id . '">Xem và in </a></p>
          <p>Vui lòng truy cập vào đây để chỉnh sữa thông tin:  <a href="' . $this->router->origin . '/du-tuyen/du-tuyen-form?mode=edit&id=' . $id . '">Chỉnh sửa </a></p>
      </div>
    </div>';
    return $content;
  }
  public function update()
  {
    $validates = $this->updateValidate();
    if (count($validates) > 0) {
      $myJson = json_encode(["msg" => "LỖI: THIẾU THÔNG TIN CẦN THIẾT", "status" => 400, "errors" => $validates]);
      echo $myJson;
      die();
    }
    $id_next = $this->router->id;

    $files = $_FILES;
    $uploads_dir = "view/publish/images/nguoi_ung_tuyen/{$id_next}/";
    foreach ($files as $key => $file) {

      if ($file['error'] == 0) {
        if (!file_exists($uploads_dir)) {
          mkdir($uploads_dir, 0700, true);
        }
        move_uploaded_file($file['tmp_name'], $uploads_dir . $file['name']);
        $this->request_post[$key] = $uploads_dir . $file['name'];
      }
    }

    $result = $this->db->updateDB($this->tb_name, $this->request_post, "id = {$this->router->id}");

    if ($result > 0) {
      $myJson = json_encode(["msg" => "CẬP NHẬT  THÀNH CÔNG", "status" => 200]);
      echo $myJson;
    } else {
      $myJson = json_encode(["msg" => "CHƯA CÓ GÌ THAY ĐỔI", "status" => 400, "errors" => []]);
      echo $myJson;
    }
  }
  public function archive()
  {
    
    $data = $this->db->fetchAll('nguoi_ung_tuyen', 'ho_ten, bo_mon, sdt, file_1, file_2, file_3, file_4, file_5', "id={$this->router->id}")[0];

    $file_names = [];
    foreach ($data as $key => $file) {
      if (!empty($file) && ($key != 'ho_ten' && $key != 'bo_mon' && $key != 'sdt')) {
        $file_names[] = end(explode("/", $file));
        $path = str_replace(end(explode("/", $file)), "", $file);
      }
    }

    $archive_file_name = "{$this->router->id}-{$data['ho_ten']}-{$data['bo_mon']}-{$data['sdt']}.zip";
    if (empty($file_names)) {
      echo ('<h1 >Không tồn tại file nào!!!</h1>');
      die();
    } else {
      $this->archiveFiles($archive_file_name, "archive/nguoi_ung_tuyen/", $file_names, $path);
      die();
    }
  }
  public function setMail()
  {

    $create = $this->db->fetchAll('setting', 'email', 'form_type_id = 1');

    if (count($create) > 0) {
      $result = $this->db->updateDB('setting', $_POST, "id = 1");
    } else {
      $email = $_POST['email'];
      $result = $this->db->insertDB('setting', 'email, form_type_id', "'$email', 1");
    }
    if ($result > 0) {
      $data = $this->db->fetchAll('setting', 'email', 'form_type_id = 1')[0];

      echo json_encode(['status' => 200, 'msg' => 'Cập nhật thành công', 'data' => $data['email']]);
    } else {
      echo json_encode(['status' => 400, 'msg' => 'Email chưa thay đổi']);
      die();
    }
  }
  public function getMail()
  {

    $data = $this->db->fetchAll('setting', 'email', 'form_type_id = 1')[0];
    echo json_encode(['status' => 200, 'msg' => 'Cập nhật thành công', 'data' => $data['email']]);
  }
}
