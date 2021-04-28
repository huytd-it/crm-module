<?php 
namespace Interfaces;

interface Excel {
  public function exportExcel($data);
  public function importExcel();
}