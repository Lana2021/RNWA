<?php
include 'backend/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Birt</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>
	<script src="produkti.js"></script>
</head>
<body>
	<label>
		<input type="checkbox">
		<span class="menu"> <span class="hamburger"></span> </span>
		<ul>
			<li> <a href="index.php">HOME</a> </li>
			<li> <a href="uredi.php">UREDI</a> </li>
			<li> <a href="produkti.php">PRODUKTI</a> </li>
		</ul>
	</label>
	<div class="zaglavlje">
		<h1>PROJEKT BIRT</h1>
		<h2>Razvoj naprednih web aplikacija</h2>
	</div>

	<div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Uredi</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addOfficeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Dodaj novi ured</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>ID</th>
                        <th>GRAD</th>
						<th>BROJ TELEFONA</th>
                        <th>ADRESA</th>
						<th>DRŽAVA</th>
						<th>POSTAL CODE</th>
                        <th>TERITORIJ</th>
						<th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				<?php
				$result = mysqli_query($conn,"SELECT * FROM offices");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr officeCode="<?php echo $row["officeCode"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-officeCode="<?php echo $row["officeCode"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["city"]; ?></td>
					<td><?php echo $row["phone"]; ?></td>
					<td><?php echo $row["addressLine1"]; ?></td>
					<td><?php echo $row["country"]; ?></td>
					<td><?php echo $row["postalCode"]; ?></td>
					<td><?php echo $row["territory"]; ?></td>
					<td>
						<a href="#editOfficeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-officeCode="<?php echo $row["officeCode"]; ?>"
							data-city="<?php echo $row["city"]; ?>"
							data-phone="<?php echo $row["phone"]; ?>"
							data-addressLine1="<?php echo $row["addressLine1"]; ?>"
							data-country="<?php echo $row["country"]; ?>"
							data-postalCode="<?php echo $row["postalCode"]; ?>"
							data-territory="<?php echo $row["territory"]; ?>"
							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteOfficeModal" class="delete" data-officeCode="<?php echo $row["officeCode"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete">&#xE872;</i></a><!--iznad islo data-id-->
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
					<!-- Add Modal HTML -->
	<div id="addOfficeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="office_form">
					<div class="modal-header">						
						<h4 class="modal-title">Dodaj ured</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
							<label>ID Ureda</label>
							<input type="officeCode" id="officeCode" name="officeCode" class="form-control" required>
						</div>					
						<div class="form-group">
							<label>Grad</label>
							<input type="city" id="city" name="city" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Broj telefona</label>
							<input type="phone" id="phone" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Adresa</label>
							<input type="addressLine1" id="addressLine1" name="addressLine1" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Država</label>
							<input type="country" id="country" name="country" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Postal Code</label>
							<input type="postalCode" id="postalCode" name="postalCode" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Teritorij</label>
							<input type="territory" id="territory" name="territory" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Dodaj</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editOfficeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Ažuriraj ured</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="officeCode_u" name="officeCode" class="form-control" required>					
						<div class="form-group">
							<label>Grad</label>
							<input type="text" id="city_u" name="city" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Broj telefona</label>
							<input type="emaphoneil" id="phone_u" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Adresa</label>
							<input type="addressLine1" id="addressLine1_u" name="addressLine1" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Država</label>
							<input type="country" id="country_u" name="country" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Postal Code</label>
							<input type="postalCode" id="postalCode_u" name="postalCode" class="form-control" required>
						</div>	
						<div class="form-group">
							<label>Teritorij</label>
							<input type="territory" id="territory_u" name="territory" class="form-control" required>
						</div>						
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Ažuriraj</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteOfficeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Izbriši ured</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="officeCode_d" name="officeCode" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Izbriši</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="dno"> © copyright Matej i Lana</div>

</body>
</html>  