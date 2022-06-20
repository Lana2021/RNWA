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
        
	
  
	<div class="header">Detalji o uredu</div>



<table class="table" >
			
			<thead>
			<th>OfficeCode</th>
            <th>Grad</th>
            <th>Broj telefona</th>
            <th>Adresa</th>
            <th>Država</th>
            <th>Poštanski broj</th>
			<th>Teritorij</th>
			</thead>
			<tbody> 
			<tbody>
			<tr>
			  <td data-label='officeCode'><?php echo $office->officeCode ?></td>
			  <td data-label='Names'><?php echo $office->city ?></td>
			  <td data-label='Names'><?php echo $office->phone?></td>
			  <td data-label='Names'><?php echo $office->addressLine1 ?></td>
			  <td data-label='Names'><?php echo $office->country ?></td>
              <td data-label='Names'><?php echo $office->postalCode ?></td>
              <td data-label='Names'><?php echo $office->territory ?></td>
			</tr>
			
			</tbody>
			
			  </table>
	</div>
	</div>
	</body>
</html>