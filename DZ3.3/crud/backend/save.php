<?php
include 'database.php';

if(count($_POST)>0){
	if($_POST['type']==1){
		$officeCode=$_POST['officeCode'];
		$city=$_POST['city'];
		$phone=$_POST['phone'];
		$addressLine1=$_POST['addressLine1'];
		$country=$_POST['country'];
		$postalCode=$_POST['postalCode'];
		$territory=$_POST['territory'];
		$sql = "INSERT INTO `offices` (`officeCode`, `city`, `phone`,`addressLine1`,`country`, `postalCode`, `territory`) 
		VALUES ('$officeCode','$city','$phone','$addressLine1','$country', '$postalCode', '$territory')";
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
		$officeCode=$_POST['officeCode'];
		$city=$_POST['city'];
		$phone=$_POST['phone'];
		$addressLine1=$_POST['addressLine1'];
		$country=$_POST['country'];
		$postalCode=$_POST['postalCode'];
		$territory=$_POST['territory'];
		$sql = "UPDATE `offices` SET `city`='$city',`phone`='$phone',`addressLine1`='$addressLine1',`country`='$country', `postalCode`='$postalCode', `territory`='$territory' WHERE officeCode=$officeCode";
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
		$officeCode=$_GET['officeCode'];
		$sql = "DELETE FROM `offices` WHERE officeCode=$officeCode ";
		if (mysqli_query($conn, $sql)) {
			echo $officeCode;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_GET)>0){
	if($_GET['type']==4){
		$officeCode=$_GET['officeCode'];
		$sql = "DELETE FROM offices WHERE officeCode in ($officeCode)";
		if (mysqli_query($conn, $sql)) {
			echo $officeCode;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>