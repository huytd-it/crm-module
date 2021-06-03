<?php

namespace Controllers;

use Controllers\BaseController;
use DateTime;
use Models\Excel;

class DepotController extends BaseController
{

  
  public function update()
  {
    
    $id = $_POST['id'];
    $result = $this->db->updateDB('uniform_depot', array_diff_key($_POST,array('id' => $id)), "id={$id}");
    if ($result > 0) {
      $this->response('Cập nhật thành công');
    } else {
      $this->response('Cập nhật thất bại', 400);
    }
  }



  public function import()
  {
    var_dump($_POST);
  }

  public function getAll()
  {
    $query = "SELECT uniform_depot.*, uniform_types.name as type_name , uniform_types.price, uniform_size.name as size_name ";
    $query .= " FROM uniform_depot INNER JOIN uniform_types ON uniform_depot.uniform_type_id=uniform_types.id";
    $query .= " INNER JOIN uniform_size ON uniform_depot.uniform_size_id = uniform_size.id";
    $query .= " WHERE uniform_depot.deleted_at is NULL ORDER BY uniform_depot.created_at DESC";
    $this->response("data", 200, [], $this->db->getDataFromQuery($query));
  }


  public function create()
  {
    $col = '';
    $val = '';
    foreach($_POST as $key => $value){
      $col .= $key . ',';
      $val .= "'$value'" . ',';

    }
    $val = trim($val, ',');
    $col = trim($col, ' , ');

   
   
    $result = $this->db->insertDB('uniform_depot', "{$col}", $val);
    if ($result > 0) {
      $this->response('Tạo thành công');
    } else {
      $this->response('Tạo thất bại', 400);
    }
  }
  public function export()
  {
    $query = "SELECT  lsts_hr_student.student_fullname, lsts_hr_student.student_sex, student_bills.*";
    $query .= "FROM student_bills INNER JOIN lsts_hr_student ON student_bills.student_id=lsts_hr_student.student_id";
    $excel = new Excel();
    $excel->export($this->db->getDataFromQuery($query));
    die();
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
