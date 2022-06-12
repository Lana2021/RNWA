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
        
	
  
	<div class="header">Detalji o zaposleniku</div>
  
  <table class="table" >
			
			<thead>
			  <th>ID</th>
			  <th>Prezime</th>
			  <th>Ime</th>
			  <th>Ekstenzija</th>
			  <th>Email</th>
			  <th>Broj ureda</th>
			  <th>Posao</th>
			</thead>
			<tbody> 
			<tbody>
			<tr>
			  <td data-label='employeeNumber'><?php echo $employee->employeeNumber ?></td>
			  <td data-label='Names'><?php echo $employee->lastName ?></td>
			  <td data-label='Names'><?php echo $employee->firstName ?></td>
			  <td data-label='Names'><?php echo $employee->extension ?></td>
			  <td data-label='Names'><?php echo $employee->email ?></td>
			  <td data-label='Number'><?php echo $employee->officeCode ?></td>
			  <td data-label='Names'><?php echo $employee->jobTitle ?></td>
			</tr>
			
			</tbody>
			
			  </table>
	</div>
	</div>
	</body>
</html>
