<?php
  class PagesController {
    public function home() {
     
      require_once('index.html');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>