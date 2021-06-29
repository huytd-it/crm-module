<?php
namespace Models;

use PDO;

class DataTable {
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

          $orderBy[] = "{$column['db']} ". $dir;
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

        $str = trim($requestColumn['search']['value'],'$');
        $str = trim($str,'^');

        if (
          $requestColumn['searchable'] == 'true' &&
          $str != ''
        ) {
          if (!empty($column['db'])) {
            $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
            $columnSearch[] = " {$column['db']} LIKE '%{$str}%'" ;
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
}