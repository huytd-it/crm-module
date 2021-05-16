<?php

namespace Controllers;

use Controllers\BaseController;
use DateTime;

class UniformController extends BaseController
{
  public function studentInformation()
  {

    $result = $this->db->fetchAll('lsts_hr_student', "*", "student_id = {$_GET['student_id']}")[0];
    $myJson = json_encode(["msg" => "Signed Successful", "status" => 200, "data" => $result]);
    echo $myJson;
  }
  public function getAll()
  {
    $query = "SELECT student_bills.*, lsts_hr_student.student_fullname, lsts_hr_student.student_sex ";
    $query .= "FROM student_bills INNER JOIN lsts_hr_student ON student_bills.student_id=lsts_hr_student.student_id";
    $this->response("data", 200,[],$this->db->getDataFromQuery($query));
  }
  public function get()
  {
    $query = "SELECT student_bills.*, lsts_hr_student.student_fullname, lsts_hr_student.student_sex ";
    $query .= "FROM student_bills INNER JOIN lsts_hr_student ON student_bills.student_id=lsts_hr_student.student_id WHERE id={$this->router->id}";
    $this->response("data", 200,[],$this->db->getDataFromQuery($query)[0]);
  }
  public function create()
  {
    // echo json_encode(["data" => $_POST]);
    $create_at = (new DateTime())->format('Y-m-d H:i:s');

    $create_info = ",{$_POST['student_id']}, '{$create_at}'";

    $values = [
      "1, {$_POST['fitness_number']},0,'',{$_POST['student_id']}" . $create_info,
      "2, {$_POST['fitness_pants_number']},0,'',{$_POST['student_id']}" . $create_info,
      "3, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      "4, {$_POST['uniform_pants_number']},0,'',{$_POST['student_id']}" . $create_info,
      "5, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      "6, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      "7, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      "8, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      "9, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      "10, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      "11,1,{$_POST['blouse_size']},'',{$_POST['student_id']}" . $create_info,
      "12,{$_POST['notebooks_52_page']},0,'',{$_POST['student_id']}" . $create_info,
      "13,{$_POST['notebooks_80_page']},0,'',{$_POST['student_id']}" . $create_info,

    ];

    preg_match_all('!\d+!', $_POST['class'], $grade); //get grade form class_id

    if ((int)$grade[0][0] < 9) {
      $delete = [
        "7, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
        "8, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
        "9, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
        "10, {$_POST['uniform_number']},0,'',{$_POST['student_id']}" . $create_info,
      ];
      $values  =  array_diff($values, $delete);
    }
    $error = $this->validateEmpty(['number_phone' => 'Số điện thoại'], $_POST);
    if (count($error) > 0)
      $this->response('Thiếu thông tin', 400, $error);


    // $this->db->insertMultipleDB('uniform_bills', "uniform_type_id,amount,size,note, student_id, create_by, created_at", $values);
    $search = $this->db->fetchAll('student_bills', 'student_id', "student_id = {$_POST['student_id']}");
    if (count($search) == 0){
      $this->db->insertMultipleDB('uniform_bills', "uniform_type_id,amount,size,note, student_id, create_by, created_at", $values);
      $this->db->insertDB('student_bills', 'student_id, number_phone,class_id ,create_by, created_at', "{$_POST['student_id']}, '{$_POST['number_phone']}','{$_POST['class']}'".$create_info);

    }


    $myJson = json_encode(["msg" => "Đăng ký thành công", "status" => 200]);
    echo $myJson;
  }
}
