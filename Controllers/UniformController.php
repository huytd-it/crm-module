<?php

namespace Controllers;

use Controllers\BaseController;
use DateTime;
use Exception;
use Models\Excel;
use PDO;

class UniformController extends BaseController
{
  private  $subject = 'ĐĂNG KÝ ĐỒNG PHỤC ';
  public function createSize()
  {
    $result = $this->db->insertDB('uniform_size', 'name, type', "{$_POST['name']}, {$_POST['type']}");

    if ($result > 0) {
      $this->response('Cập nhật thành công');
    } else {
      $this->response('Cập nhật thất bại', 400);
    }
  }
  public function updateSize()
  {

    $id = $_POST['id'];
    $result = $this->db->updateDB('uniform_size', array_diff_key($this->request_post, array('id' => $id)), "id={$id}");
    if ($result > 0) {
      $this->response('Cập nhật thành công');
    } else {
      $this->response('Cập nhật thất bại', 400);
    }
  }
  public function updateType()
  {

    $id = $_POST['id'];
    $result = $this->db->updateDB('uniform_types', array_diff_key($_POST, array('id' => $id)), "id={$id}");
    if ($result > 0) {
      $this->response('Cập nhật thành công');
    } else {
      $this->response('Cập nhật thất bại', 400);
    }
  }
  public function createTypeUniform()
  {
    $col = '';
    $val = '';
    foreach ($_POST as $key => $value) {
      $col .= $key . ',';
      $val .= "'$value'" . ',';
    }
    $val = trim($val, ',');
    $col = trim($col, ' , ');


    $result = $this->db->insertDB('uniform_types', "{$col}", $val);

    if ($result > 0) {
      $this->response('Tạo thành công');
    } else {
      $this->response('Tạo thất bại', 400);
    }
  }
  public function getUniformType()
  {
    $result = $this->db->fetchAll('uniform_types', '*', 'deleted_at is NULL');
    $this->response("data", 200, [], $result);
  }
  public function updateStudentBill()
  {

    $id = $_POST['id'];
    $result = $this->db->updateDB('student_bills', array_diff($this->request_post, array($this->request_post['id'])), "id={$id}");

    if ($result > 0) {
      $this->response('Cập nhật thành công');
    } else {
      $this->response('Cập nhật thất bại', 400);
    }
  }
  public function getSize()
  {
    $result = $this->db->fetchAll('uniform_size', '*', 'deleted_at is NULL');
    $this->response("data", 200, [], $result);
  }
  public function import()
  {
    var_dump($_POST);
  }
  public function studentInformation()
  {
    $query = "SELECT S.student_fullname, S.student_id, S.student_email, B.* from lsts_hr_student S INNER JOIN student_bills B ON S.student_id = B.student_id WHERE S.student_id = {$_GET['student_id']} ";
    $result = $this->db->getDataFromQuery($query);
    $myJson = json_encode(["msg" => "Signed Successful", "status" => 200, "data" => $result[0]]);
    echo $myJson;
  }
  public function updateUniform()
  {
    try {
      $id = $_POST['id'];

      $result = $this->db->updateDB('uniform_bills', array_diff($this->request_post, array($this->request_post['id'])), "id={$id}");

      if ($result > 0) {
        $this->response('Cập nhật thành công');
      } else {
        $this->response('Cập nhật thất bại', 400);
      }
    } catch (Exception $e) {
      parent::response('Server không sử lý được', 400, ['error' => $e]);
    }
  }
  static function limit($request)
  {
    $limit = '';

    if (isset($request['start']) && $request['length'] != -1) {
      $limit = "LIMIT " . intval($request['start']) . ", " . intval($request['length']);
    }

    return $limit;
  }
  static function order($request, $columns)
  {
    $order = '';

    if (isset($request['order']) && count($request['order'])) {
      $orderBy = array();
      $dtColumns = self::pluck($columns, 'dt');

      for ($i = 0, $ien = count($request['order']); $i < $ien; $i++) {
        // Convert the column index into the column data property
        $columnIdx = intval($request['order'][$i]['column']);
        $requestColumn = $request['columns'][$columnIdx];

        $columnIdx = array_search($requestColumn['data'], $dtColumns);
        $column = $columns[$columnIdx];

        if ($requestColumn['orderable'] == 'true') {
          $dir = $request['order'][$i]['dir'] === 'asc' ?
            'ASC' :
            'DESC';

          $orderBy[] = "{$column['db']} " . $dir;
        }
      }

      if (count($orderBy)) {
        $order = 'ORDER BY ' . implode(', ', $orderBy);
      }
    }

    return $order;
  }
  static function pluck($a, $prop)
  {
    $out = array();

    for ($i = 0, $len = count($a); $i < $len; $i++) {
      if (empty($a[$i][$prop])) {
        continue;
      }
      //removing the $out array index confuses the filter method in doing proper binding,
      //adding it ensures that the array data are mapped correctly
      $out[$i] = $a[$i][$prop];
    }

    return $out;
  }
  static function bind(&$a, $val, $type)
  {
    $key = ':binding_' . count($a);

    $a[] = array(
      'key' => $key,
      'val' => $val,
      'type' => $type
    );

    return $key;
  }
  static function filter($request, $columns, &$bindings)
  {
    $globalSearch = array();
    $columnSearch = array();
    $dtColumns = self::pluck($columns, 'dt');

    if (isset($request['search']) && $request['search']['value'] != '') {
      $str = $request['search']['value'];

      for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
        $requestColumn = $request['columns'][$i];
        $columnIdx = array_search($requestColumn['data'], $dtColumns);
        $column = $columns[$columnIdx];

        if ($requestColumn['searchable'] == 'true') {
          if (!empty($column['db'])) {
            $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
            $globalSearch[] = " {$column['db']} LIKE '%{$str}%'";
          }
        }
      }
    }

    // Individual column filtering
    if (isset($request['columns'])) {
      for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
        $requestColumn = $request['columns'][$i];
        $columnIdx = array_search($requestColumn['data'], $dtColumns);
        $column = $columns[$columnIdx];

        $str = trim($requestColumn['search']['value'], '$');
        $str = trim($str, '^');

        if (
          $requestColumn['searchable'] == 'true' &&
          $str != ''
        ) {
          if (!empty($column['db'])) {
            $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
            $columnSearch[] = " {$column['db']} LIKE '%{$str}%'";
          }
        }
      }
    }

    // Combine the filters into a single string
    $where = '';

    if (count($globalSearch)) {
      $where = '(' . implode(' OR ', $globalSearch) . ')';
    }

    if (count($columnSearch)) {
      $where = $where === '' ?
        implode(' AND ', $columnSearch) :
        $where . ' AND ' . implode(' AND ', $columnSearch);
    }

    if ($where !== '') {
      $where = 'WHERE ' . $where;
    }

    return $where;
  }
  public function formatStatus($status)
  {
    if ($status == 0) {
      return 'Đã đăng ký';
    } else if ($status == 1) {
      return 'Đã thanh toán';
    } else if ($status == 2) {
      return 'Đã giao đồng phục';
    }
  }
  public function formatStatusSpan($status)
  {
    if ($status == 0) {
      return 'secondary';
    } else if ($status == 1) {
      return 'info';
    } else if ($status == 2) {
      return 'success';
    }
  }
  public function getAll()
  {

    $bindings = array();
    $localWhereResult = array();
    $localWhereAll = array();
    $whereAllSql = '';

    $columns = array(
      array('db' => 'S.student_fullname', 'dt' => 'student_fullname'),
      array('db' => 'B.number_phone',  'dt' => 'number_phone'),
      array('db' => 'S.student_sex',   'dt' => 'student_sex'),
      array('db' => 'B.class_id',     'dt' => 'class_id'),
      array('db' => 'B.payment',  'dt' => 'payment'),
      array('db' => 'B.student_id', 'dt' => 'student_id'),
      array('db' => 'B.status', 'dt' => 'status')
    );

    // Build the SQL query string from the request
    $limit = self::limit($_REQUEST);
    $order = self::order($_REQUEST, $columns);
    $where = self::filter($_REQUEST, $columns, $bindings);


    $query = "SELECT B.*, S.student_fullname, S.student_sex ";
    $query .= " FROM student_bills B INNER JOIN lsts_hr_student S ON B.student_id=S.student_id ";
    $query .= " {$where} {$order} {$limit}";


    $d = $query;
    $data = $this->db->getDataFromQuery($query);
    $i = 0;
    foreach ($data as $item) {
      $data[$i]['button'] = "<button class='btn btn-warning' data-toggle='modal' data-target='#hoa_don' data-student_id='" . $item['student_id'] . "' data-payment='" . $item['payment'] . "'  data-receiver='" . $item['receiver'] . "' ";
      $data[$i]['button'] .= "' data-from-deliver='" . $item['from_deliver'] . "' data-deliver='" . $item['deliver'];
      $data[$i]['button'] .= "' data-id='" . $item['id'] . "'>Edit</button>";
      $data[$i]['button'] .= "<button class='btn btn-primary btn-print' data-id='" . $item['id'] . "'>Print</button>";
      $data[$i]['button'] .= "<button class='btn btn-danger btn-delete' >Delete</button>";
      $data[$i]['select'] = '<select class="btn-status" data-id="' . $item['id'] . '"  data-status="' . $item['status'] . '"><option value="-1"> -- Chọn --</option><option value="0">Đăng ký</option><option value="1">Thanh toán</option><option value="2">Giao đồng phục</option></select>';
      $i++;
    }

    $query = "SELECT count(id) as count from student_bills B where B.deleted_at is NULL";
    $recordsTotal = $this->db->getDataFromQuery($query)[0]['count'];
    if (isset($where)) {
      $where = ' WHERE ';
    }
    $query = "SELECT count(id) as count from student_bills B {$where} B.deleted_at is NULL";
    $recordsFiltered = $this->db->getDataFromQuery($query)[0]['count'];

    echo json_encode([
      'draw' => $_REQUEST['draw'],
      "recordsTotal"    => intval($recordsTotal),
      "recordsFiltered" => intval($recordsFiltered),
      "data"            => $data,
    ]);
  }
  public function get()
  {
    $query = "SELECT student_bills.*, lsts_hr_student.student_fullname, lsts_hr_student.student_sex";
    $query .= "FROM student_bills INNER JOIN lsts_hr_student ON student_bills.student_id=lsts_hr_student.student_id WHERE id={$this->router->id}";
    $this->response("data", 200, [], $this->db->getDataFromQuery($query)[0]);
  }
  public function getBill()
  {

    $query = "SELECT uniform_bills.*, uniform_types.name, uniform_types.en_name, uniform_types.price,uniform_types.size_type_id, uniform_size.name as size_name ";
    $query .= "FROM uniform_bills INNER JOIN uniform_types ON uniform_bills.uniform_type_id=uniform_types.id INNER JOIN uniform_size ON uniform_bills.size=uniform_size.id  WHERE uniform_bills.student_id={$this->router->id} ORDER BY uniform_bills.id";
    $this->response("data", 200, [], $this->db->getDataFromQuery($query));
  }
  public function create()
  {

    try {
      $create_at = (new DateTime())->format('Y-m-d H:i:s');
      $create_info = ",{$_POST['student_id']}, '{$create_at}'";

      $values = [
        "1, {$_POST['fitness_number']},0,'',{$_POST['student_id']}" . $create_info,
        "2, {$_POST['fitness_pants_number']},0,'',{$_POST['student_id']}" . $create_info,
        "3, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
        "4, {$_POST['uniform_pants_number']},0,'',{$_POST['student_id']}" . $create_info,
        "5, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
        "6, {$_POST['uniform_pants_number']},0,'',{$_POST['student_id']}" . $create_info,
        "7, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
        "8, {$_POST['uniform_pants_number']},0,'',{$_POST['student_id']}" . $create_info,
        "9, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
        "10, {$_POST['uniform_pants_number']},0,'',{$_POST['student_id']}" . $create_info,
        "11,1,{$_POST['blouse_size']},'',{$_POST['student_id']}" . $create_info,
        "12,{$_POST['notebooks_52_page']},0,'',{$_POST['student_id']}" . $create_info,
        "13,{$_POST['notebooks_80_page']},0,'',{$_POST['student_id']}" . $create_info,

      ];
      if (!isset($_POST['gender'])) {
        $values[2] = "3, 0,0,'',{$_POST['student_id']}" . $create_info;
        $values[3] = "4, 0,0,'',{$_POST['student_id']}" . $create_info;
        $values[6] = "7, 0,0,'',{$_POST['student_id']}" . $create_info;
        $values[7] = "8, 0,0,'',{$_POST['student_id']}" . $create_info;
      }
      if (isset($_POST['gender'])) {
        $values[4] = "5, 0,0,'',{$_POST['student_id']}" . $create_info;
        $values[5] = "6, 0,0,'',{$_POST['student_id']}" . $create_info;
        $values[8] = "9, 0,0,'',{$_POST['student_id']}" . $create_info;
        $values[9] = "10, 0,0,'',{$_POST['student_id']}" . $create_info;
      }
      preg_match_all('!\d+!', $_POST['class'], $grade); //get grade form class_id
      if (isset($grade[0][0])) {
        if ((int)$grade[0][0] < 9) {
          $values[6] = "7, 0,0,'',{$_POST['student_id']}" . $create_info;
          $values[7] = "8, 0,0,'',{$_POST['student_id']}" . $create_info;
          $values[8] = "9,0,0,'',{$_POST['student_id']}" . $create_info;
          $values[9] = "10, 0,0,'',{$_POST['student_id']}" . $create_info;
        } else {

          $values[2] = "3, 0,0,'',{$_POST['student_id']}" . $create_info;
          $values[3] = "4, 0,0,'',{$_POST['student_id']}" . $create_info;
          $values[4] = "5,0,0,'',{$_POST['student_id']}" . $create_info;
          $values[5] = "6, 0,0,'',{$_POST['student_id']}" . $create_info;
        }
      }

      $error = $this->validateEmpty(['number_phone' => 'Số điện thoại'], $_POST);
      if (count($error) > 0)
        $this->response('Thiếu thông tin', 400, $error);


      $kq = 0;
      $search = $this->db->fetchAll('student_bills', 'student_id', "student_id = '{$_POST['student_id']}' ");
      if (count($search) == 0) {
        $student = $this->db->insertDB(
          'student_bills',
          'school_year,student_id, number_phone,class_id,create_by, created_at',
          "'{$_POST['school_year']}','{$_POST['student_id']}', '{$_POST['number_phone']}','{$_POST['class']}'" . $create_info
        );
        if ($student > 0) {
          $delete_query = "DELETE FROM uniform_bills WHERE student_id = '{$_POST['student_id']}'";
          $this->db->excuteSql($delete_query);
          $kq = $this->db->insertMultipleDB('uniform_bills', "uniform_type_id,quantity,size,note, student_id , create_by, created_at", $values);
        }
      } else {
        $array = ['deleted_at' => 'NULL', 'school_year' => $_POST['school_year'], 'class_id' => $_POST['class']];
        $kq = $this->db->updateDB('student_bills', $array, " student_id = '{$_POST['student_id']}'");
        $this->sendMail('Đăng ký thành công', $this->subject, $_POST['email']);
        return parent::response('Cập nhật thông tin thành công', 200, ['error' => 'Thông tin học sinh đã được cập nhật']);
      }

      if ($kq > 0) {
        $this->sendMail('Đăng ký thành công', $this->subject, $_POST['email']);
        return  parent::response('Đăng ký thành công');
      } else {
        return parent::response('Đăng ký thất bại', 400, ['error' => 'Học sinh đã tồn tại']);
      }
    } catch (Exception $e) {
      return parent::response('Lỗi', 400, ['server' => 'Server không sử lý được']);
    }
  }
  public function export()
  {
    try {
      $query = "SELECT  lsts_hr_student.student_fullname, lsts_hr_student.student_sex, student_bills.*";
      $query .= "FROM student_bills INNER JOIN lsts_hr_student ON student_bills.student_id=lsts_hr_student.student_id ORDER BY student_bills.created_at DESC";
      $excel = new Excel();
      $excel->export($this->db->getDataFromQuery($query));
      die();
    } catch (\Throwable $th) {
      parent::response('Server không sử lý được');
    }
  }
  public function delete()
  {
    $id = $_POST['id'];
    $result = $this->db->updateDB('student_bills', array_diff($this->request_post, array($this->request_post['id'])), "id={$id}");

    if ($result > 0) {
      $this->response('Xóa thành công');
    } else {
      $this->response('Xóa thất bại', 400);
    }
  }
}
