<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BIRT</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <input type="checkbox" id="menu">
<div class="wrapper">
    <div class="menu-min">
            
        <label for="menu" class="menu-bar">
            <i class="fa fa-bars" aria-hidden="true" ></i>
        </label>
    
    </div>
  
    <div class="sidebar">
        <h2>BIRT</h2>
        <ul>
            <li><a href="index.html"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            <li><a href='index.php?controller=employees&action=index'><i class="fas fa-tasks"></i><span>Zaposlenici</span></a></li>
            <li><a href='index.php?controller=offices&action=index'><i class="fas fa-tasks"></i><span>Uredi</span></a></li>
            <li><a href='index.php?controller=productlines&action=index'><i class="fas fa-tasks"></i><span>Produktne linije</span></a></li>
            <li><a href="http://fsre.sum.ba/"><i class="fas fa-building"></i><span>FSRE</span></a></li>
        </ul> 
      
    </div>
    <div class="main_content">
        
	
  
	<div class="header">Zaposlenici</div>
<div class="container">
<form action="?controller=employees&action=updateemployee" method="POST">
  <div class="form-group">
    <label for="employeeNumber">ID</label>
    <input type="text" class="form-control" name="employeeNumber" value=<?php echo $employee->employeeNumber?>>
	</div>
  <div class="form-group">
    <label for="lastName">Prezime</label>
    <input type="text" class="form-control" name="lastName" value=<?php echo $employee->lastName?>>
  </div>
  <div class="form-group">
    <label for="firstName">Ime</label>
    <input type="text" class="form-control" name="firstName" value=<?php echo $employee->firstName?>>
  </div>
  <div class="form-group">
    <label for="extension">Ekstenzija</label>
    <input type="text" class="form-control" name="extension" value=<?php echo $employee->extension?>>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" value=<?php echo $employee->email?>>
  </div>
  <div class="form-group">
    <label for="officeCode">Office code</label>
    <input type="text"  class="form-control" name="officeCode" value=<?php echo $employee->officeCode?>>
  </div>
  <div class="form-group">
    <label for="jobTitle">Posao</label>
    <input type="text" class="form-control" name="jobTitle" value=<?php echo $employee->jobTitle?>>
  </div>
    <button type="submit" class="btn btn-default">Confirm</button>
</form> 
</div>
</div>
	</div>
	</body>
</html>
 
