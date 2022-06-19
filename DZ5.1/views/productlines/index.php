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
	</br>
  <div class="mb-2">
  <a class="btn btn-default" href="?controller=productlines&action=verifyinsert" role="button">Dodaj produktnu liniju</a>
  </div>
  </br>
  </br>
  <table class="table" >
			
			<thead>
			  <th>Naziv linije</th>
			  <th>Opis</th>
			  <th>Detalji</th>
			  <th>Edit</th>
              <th>Delete</th>
			</thead>
			<tbody> <?php foreach ($productlines as $row): ?>
			<tbody>
			<tr>
			  <td data-label='productLine'><?php echo $row->productLine ?></td>
			  <td data-label='Names'><?php echo $row->textDescription ?></td>
			  <td><a href="?controller=productlines&action=show&id=<?php echo $row->productLine?>" class="btn btn-default btn-xs"> Detalji</a></td>
			  <td><a href="?controller=productlines&action=verifyupdate&id=<?php echo $row->productLine?>" class="btn btn-default btn-xs"> Edit</a></td>
              <td><a href="?controller=productlines&action=deleteproductline&id=<?php echo $row->productLine?>" class="btn btn-default btn-xs"> Delete</a></td>
			 
			</tr>
			
			</tbody>
			<?php endforeach ?>
			  </table>
	</div>
	</div>
	</body>
</html>
 
