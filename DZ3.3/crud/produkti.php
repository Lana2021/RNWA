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
						<h2><b>Produkti</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Dodaj novi produkt</span></a>
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
                        <th>IME</th>
                        <th>LINIJA</th>
						<th>SKALA</th>
						<th>VENDOR</th>
						<th>NA STANJU</th>
						<th>CIJENA</th>
						<th>MSRP</th>
						<th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				<?php
				$result = mysqli_query($conn,"SELECT * FROM products");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr productCode="<?php echo $row["productCode"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-productCode="<?php echo $row["productCode"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["productName"]; ?></td>
					<td><?php echo $row["productLine"]; ?></td>
					<td><?php echo $row["productScale"]; ?></td>
					<td><?php echo $row["productVendor"]; ?></td>
					<td><?php echo $row["quantityInStock"]; ?></td>
					<td><?php echo $row["buyPrice"]; ?></td>
					<td><?php echo $row["MSRP"]; ?></td>
					<td>
						<a href="#editProductModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-productCode="<?php echo $row["productCode"]; ?>"
							data-productName="<?php echo $row["productName"]; ?>"
							data-productLine="<?php echo $row["productLine"]; ?>"
							data-productScale="<?php echo $row["productScale"]; ?>"
							data-productVendor="<?php echo $row["productVendor"]; ?>"
							data-quantityInStock="<?php echo $row["quantityInStock"]; ?>"
							data-buyPrice="<?php echo $row["buyPrice"]; ?>"
							data-MSRP="<?php echo $row["MSRP"]; ?>"
							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteProductModal" class="delete" data-productCode="<?php echo $row["productCode"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
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
	<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="product_form">
					<div class="modal-header">						
						<h4 class="modal-title">Dodaj produkt</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
							<label>ID</label>
							<input type="productCode" id="productCode" name="productCode" class="form-control" required>
						</div>					
						<div class="form-group">
							<label>Naziv</label>
							<input type="productName" id="productName" name="productName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Linija</label>
							<input type="productLine" id="productLine" name="productLine" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Skala</label>
							<input type="productScale" id="productScale" name="productScale" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Vendor</label>
							<input type="productVendor" id="productVendor" name="productVendor" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Na stanju</label>
							<input type="quantityInStock" id="quantityInStock" name="quantityInStock" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cijena</label>
							<input type="buyPrice" id="buyPrice" name="buyPrice" class="form-control" required>
						</div>
						<div class="form-group">
							<label>MSRP</label>
							<input type="MSRP" id="MSRP" name="MSRP" class="form-control" required>
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
	<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Ažuriraj produkt</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="productCode_u" name="productCode" class="form-control" required>					
						<div class="form-group">
							<label>Naziv</label>
							<input type="text" id="productName_u" name="productName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Linija</label>
							<input type="text" id="productLine_u" name="productLine" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Skala</label>
							<input type="productScale" id="productScale_u" name="productScale" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Vendor</label>
							<input type="productVendor" id="productVendor_u" name="productVendor" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Na stanju</label>
							<input type="quantityInStock" id="quantityInStock_u" name="quantityInStock" class="form-control" required>
						</div>	
						<div class="form-group">
							<label>Cijena</label>
							<input type="buyPrice" id="buyPrice_u" name="buyPrice" class="form-control" required>
						</div>
						<div class="form-group">
							<label>MSRP</label>
							<input type="MSRP" id="MSRP_u" name="MSRP" class="form-control" required>
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
	<div id="deleteProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Izbriši produkt</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="productCode_d" name="productCode" class="form-control">					
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