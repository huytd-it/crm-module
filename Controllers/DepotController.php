<?php

namespace Controllers;

use Controllers\BaseController;
use Models\Excel;

class DepotController extends BaseController
{


  public function update()
  {

    $id = $_POST['id'];
    $result = $this->db->updateDB('uniform_depot', array_diff_key($_POST, array('id' => $id)), "id={$id}");
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
    $month = $_GET['month'];
    $before_month = $month - 1;
    $year = $_GET['year'];

    //nhap kho
    $query = "SELECT T.*, D.*, S.name as size_name, MONTH(D.created_at) as month FROM uniform_depot D";
    $query .= " INNER JOIN uniform_types T ON T.id = D.uniform_type_id";
    $query .= " INNER JOIN uniform_size S ON D.uniform_size_id = S.id";
    $query .= " WHERE year(D.created_at) = $year and month(D.created_at) = $month";
    $depots = $this->db->getDataFromQuery($query);
    // giao thanh cong (xuat kho)
    $query = "SELECT B.uniform_type_id, B.size , sum(B.quantity) as total FROM uniform_bills B ";
    $query .= " INNER JOIN student_bills SB ON B.student_id = SB.student_id Where SB.status = 2 and year(SB.created_at) = $year and month(SB.created_at) = $month";
    $query .= " Group by  B.uniform_type_id, B.size";
    $bills = $this->db->getDataFromQuery($query);
    $i = 0;
 
    foreach ($depots as $depot) {
    
      $depots[$i]['xuat_kho'] = 0;
     
      foreach ($bills as $bill) {
        if ($bill['uniform_type_id'] == $depot['uniform_type_id'] && $bill['size'] == $depot['uniform_size_id']) {
          $depots[$i]['xuat_kho'] = $bill['total'];
        } 
       
      }
     
      $i++;
    }

    return $this->response("data", 200, [], $depots);
  }


  public function create()
  {
    $col = '';
    $val = '';
    foreach ($_POST as $key => $value) {
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
