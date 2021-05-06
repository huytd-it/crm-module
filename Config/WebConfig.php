<?php

namespace Config;

class WebConfig
{

  public $request_url;
  public $method_url;
  protected $origin;
  function siteURL()
  {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'] . '/';
    return $protocol . $domainName;
  }
  private $root;

  public function __construct($path)
  {
   
   
    $uri_array = explode("/", "$_SERVER[REQUEST_URI]");
    $this->origin = "{$this->siteURL()}{$uri_array[1]}/".trim($path);
    $this->root = $_SERVER['DOCUMENT_ROOT']."/"."{$uri_array[1]}/".trim($path);
    $this->method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
  }
  public function getOrigin()
  {
    return $this->origin;
  }
  public function getRoot()
  {
    return $this->root;
  }
}
