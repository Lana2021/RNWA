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
        
	
  
<div class="header">Produktne linije</div>
    <div class="container">
    <form action="?controller=productlines&action=updateproductline" method="POST">
    <div class="form-group">
        <label for="productLine">Naziv linije</label>
        <input type="text" class="form-control" name="productLine" value=<?php echo $productline->productLine?>>
        </div>
    <div class="form-group">
        <label for="textDescription">Opis</label>
        <input type="text" class="form-control" name="textDescription" value=<?php echo $productline->textDescription?>>
    </div>
        <button type="submit" class="btn btn-default">Confirm</button>
    </form> 
    </div>
</div>
</div>
	</body>
</html>
 
