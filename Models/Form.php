<?php
namespace Models;
use DB\DBConnect;

/**
 * @Model
 */
class Form
{
  /**
   * @param data array
   * @param table array
   */
  public function insertData($data, $table)
  {
    $db = new DBConnect();
    $keys = "";
    $values = "";
   
    foreach ($data as $key => $value) {
      $keys .= "{$key},";
      $values.="{$value},";
    }
    $keys =  rtrim($keys, ",");
    $values =  rtrim($values, ",");
    $db->insertDB($table,$keys,$values);

  }
 
}
