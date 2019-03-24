<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CISitemaps {

  private $base_url;

  function __construct($params) {
    if (isset($params["base_url"])) $this->base_url = $params["base_url"];
    if ($base_url != null) $this->base_url = trim($this->base_url, "/") . "/";
  }
  /**
   * [submit_sitemap description]
   * @param  [type] $path [description]
   * @return [type]       [description]
   */
  function submit_sitemap($path=null) {
    if ($path == null) {
      $sitemap_path = $this->base_url . "sitemap.xml";
    } else {
      $sitemap_path = $this->base_url == null ? $sitemap_path = $path : $this->base_url . $path;
    }
    $url = "http://www.google.com/webmasters/sitemaps/ping?sitemap=" . htmlentities($sitemap_path);
    $response = file_get_contents($url);
    return $response ? true : false;
  }
}
?>
