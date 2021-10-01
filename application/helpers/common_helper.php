<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('dd')) {

  function dd($data = null, $cont = true)
  {
    echo "<pre class='offset-3 mt-5'>";
    print_r($data);
    echo "</pre>";
    if (!$cont) {
      die();
    }
  }
}
