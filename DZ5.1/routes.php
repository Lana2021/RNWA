<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
	  
	   case 'employees':
        require_once('models/employee.php');
		$controller = new EmployeesController();
      break;
	   case 'offices':
        require_once('models/office.php');
		$controller = new OfficesController();
      break;
      case 'productlines':
        require_once('models/productline.php');
		$controller = new ProductLinesController();
      break;
      
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' 		=> ['home', 'error'],
					   'employees' 	=> ['index', 'show','deleteemployee','verifyupdate','updateemployee','verifyinsert','insertemployee'],
					   'offices' 	=> ['index', 'show','verifyinsert','insertoffice','verifyupdate','updateoffice','deleteoffice'],
             'productlines' => ['index', 'show', 'verifyinsert', 'insertproductline', 'verifyupdate', 'updateproductline', 'deleteproductline']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
