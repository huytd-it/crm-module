<?php

namespace Models;
include_once "Models/Email.php";
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Fill;


class Excel
{
  /**
   * Import Excel from $data to $table_name
   * 
   * $data array
   * $col array
   * $table_name
   */
  public function import($data, $col, $table_name)
  {
  }
  public function export($data, $col_names = null)
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
}
