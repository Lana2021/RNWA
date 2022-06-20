<?php
  class ProductLinesController {
    public function index() {
      // we store all the posts in a variable
      $productlines = ProductLine::all();
      require_once('views/productlines/index.php');
    }
	  public function verifyinsert(){
      require_once('views/productlines/insert.php');
    }

    public function insertproductline()
    {
        ProductLine::insertproductline( $_POST['productLine'], $_POST['textDescription'] );
     return call('productlines', 'index');
    }

	 public function verifyupdate()
  {
	
    if (!isset($_GET['id']))
          return call('pages', 'error');
    $productline = ProductLine::find($_GET['id']);
    require_once('views/productlines/update.php');
  }

  public function updateproductline()
  {
    if (!isset($_POST['productLine']))
      return call('pages', 'error');
      ProductLine::updateproductline( $_POST['productLine'], $_POST['textDescription']);
   return call('productlines', 'index');
  }
    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $productline = ProductLine::find($_GET['id']);
      require_once('views/productlines/show.php');
	  }
	public function deleteproductline() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $productline = ProductLine::deleteproductline($_GET['id']);
      require_once('views/productlines/delete.php');
    }
	 
	
  }
?>