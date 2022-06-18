<?php
include 'database.php';

if(count($_POST)>0){
	if($_POST['type']==1){
		$productCode=$_POST['productCode'];
		$productName=$_POST['productName'];
		$productLine=$_POST['productLine'];
		$productScale=$_POST['productScale'];
		$productVendor=$_POST['productVendor'];
		$quantityInStock=$_POST['quantityInStock'];
		$buyPrice=$_POST['buyPrice'];
		$MSRP=$_POST['MSRP'];
		$sql = "INSERT INTO `products` (`productCode`, `productName`, `productLine`,`productScale`,`productVendor`, `quantityInStock`, `buyPrice`, `MSRP`) 
		VALUES ('$productCode','$productName','$productLine','$productScale','$productVendor', '$quantityInStock', '$buyPrice','$MSRP')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$productCode=$_POST['productCode'];
		$productName=$_POST['productName'];
		$productLine=$_POST['productLine'];
		$productScale=$_POST['productScale'];
		$productVendor=$_POST['productVendor'];
		$quantityInStock=$_POST['quantityInStock'];
		$buyPrice=$_POST['buyPrice'];
		$MSRP=$_POST['MSRP'];
		$sql = "UPDATE `products` SET `productName`='$productName',`productLine`='$productLine',`productScale`='$productScale',`productVendor`='$productVendor', `quantityInStock`='$quantityInStock', `buyPrice`='$buyPrice', `MSRP`='$MSRP' WHERE productCode=$productCode";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_GET)>0){
	if($_GET['type']==3){
		$productCode=$_GET['productCode'];
		$sql = "DELETE FROM `products` WHERE productCode=$productCode ";
		if (mysqli_query($conn, $sql)) {
			echo $productCode;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$productCode=$_POST['productCode'];
		$sql = "DELETE FROM products WHERE productCode in ($productCode)";
		if (mysqli_query($conn, $sql)) {
			echo $productCode;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>