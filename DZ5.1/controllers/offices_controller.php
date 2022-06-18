<?php
  class OfficesController {
    public function index() {
      // we store all the posts in a variable
      $offices = office::all();
      require_once('views/offices/index.php');
    }
	  public function verifyinsert(){
      require_once('views/offices/insert.php');
    }

    public function insertoffice()
    {
      office::insertoffice( $_POST['officeCode'], $_POST['city'], $_POST['phone'], $_POST['addressLine1'], $_POST['country'], $_POST['postalCode'], $_POST['territory'] );
     return call('offices', 'index');
    }

	 public function verifyupdate()
  {
	
    if (!isset($_GET['id']))
          return call('pages', 'error');
    $office = office::find($_GET['id']);
    require_once('views/offices/update.php');
  }

  public function updateoffice()
  {
    if (!isset($_POST['officeCode']))
      return call('pages', 'error');
      office::updateoffice( $_POST['officeCode'], $_POST['city'], $_POST['phone'], $_POST['addressLine1'], $_POST['country'], $_POST['postalCode'], $_POST['territory'] );
   return call('offices', 'index');
  }
    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $office = office::find($_GET['id']);
      require_once('views/offices/show.php');
	  }
	public function deleteoffice() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $office = office::deleteoffice($_GET['id']);
      require_once('views/offices/delete.php');
    }
	 
	
  }
?>