<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CISitemaps {

  private $base_url;

  private $ci;

  function __construct($params) {
    if (isset($params["base_url"])) $this->base_url = $params["base_url"];
    if ($base_url != null) $this->base_url = trim($this->base_url, "/") . "/";
    $this->ci =& get_instance();
  }
  /**
   * [submit_sitemap description]
   * @param  string $sitemap [description]
   * @return [type]          [description]
   */
  function submit_sitemap($sitemap="sitemap.xml") {
    if ($this->base_url == null) {
      $this->ci->load->helper("url");
    }
    $sitemap_path = $this->base_url == null ? base_url($sitemap) : $this->base_url . $sitemap;
    $url = "http://www.google.com/webmasters/sitemaps/ping?sitemap=" . htmlentities($sitemap_path);
    $response = file_get_contents($url);
    return $response ? true : false;
  }
}
?>
