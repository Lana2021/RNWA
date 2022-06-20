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
        <div class="header">Uredi</div>
		<div class="container">
<form action="?controller=offices&action=updateoffice" method="POST">
  <div class="form-group">
    <label for="officeCode">Office code</label>
    <input type="text" readonly class="form-control" name="officeCode" value=<?php echo $office->officeCode?>>
  <div class="form-group">
    <label for="city">Grad</label>
    <input type="text" class="form-control" name="city" value=<?php echo $office->city?>>
  </div>
  <div class="form-group">
    <label for="phone">Broj telefona</label>
    <input type="text" class="form-control" name="phone" value=<?php echo $office->phone?>>
  </div>
  <div class="form-group">
    <label for="addressLine1">Adresa</label>
    <input type="text" class="form-control" name="addressLine1" value=<?php echo $office->addressLine1?>>
  </div>
  <div class="form-group">
    <label for="country">Država</label>
    <input type="text" class="form-control" name="country" value=<?php echo $office->country?>>
  </div>
  <div class="form-group">
    <label for="postalCode">Poštanski broj</label>
    <input type="text" class="form-control" name="postalCode" value=<?php echo $office->postalCode?>>
  </div>
  <div class="form-group">
    <label for="territory">Teritorij</label>
    <input type="text" class="form-control" name="territory" value=<?php echo $office->territory?>>
  </div>
  
    <button type="submit" class="btn btn-default">Confirm</button>
</form> 
</div>
</div>
	</div>
	</div>
	</body>
</html>
