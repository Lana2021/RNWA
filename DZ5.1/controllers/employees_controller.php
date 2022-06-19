<?php
  class EmployeesController {
    public function index() {
      // we store all the posts in a variable
      $employees = Employee::all();
      require_once('views/employees/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $employee = Employee::find($_GET['id']);
      require_once('views/employees/show.php');
    }
	public function deleteemployee() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $employee = Employee::deleteemployee($_GET['id']);
      require_once('views/employees/delete.php');
    }
	
	
	  public function verifyupdate()
  {
    if (!isset($_GET['id']))
          return call('pages', 'error');
    $employee = Employee::find($_GET['id']);
    require_once('views/employees/update.php');
  }

  public function updateemployee()
  {
    if (!isset($_POST['officeCode']))
      return call('pages', 'error');
      Employee::updateemployee($_POST['employeeNumber'], $_POST['lastName'], $_POST['firstName'],$_POST['extension'],$_POST['email'], $_POST['officeCode'], $_POST['jobTitle']);
   return call('employees', 'index');
  } 
  public function verifyinsert(){
      require_once('views/employees/insert.php');
    }

    public function insertemployee()
    {
      Employee::insertemployee($_POST['employeeNumber'], $_POST['lastName'], $_POST['firstName'],$_POST['extension'],$_POST['email'], $_POST['officeCode'], $_POST['jobTitle']);
     return call('employees', 'index');
    }
	
  }
?>