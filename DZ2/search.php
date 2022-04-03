<style>
<?php include 'css/mystyle.css'; ?>
</style>

<?php


$s = $_REQUEST["s"];
$hint = "";

    $s = strtolower($s);
    $len=strlen($s);
   
$db = mysqli_connect("localhost","root","");

if($db) {

$result = mysqli_select_db($db, "birt") or die("Došlo je do problema prilikom odabira baze...");
if ($s == "") {
	$sql="SELECT employeeNumber,lastName,firstName,extension,email FROM employees";
}
else{
$sql="SELECT * FROM employees where firstName LIKE '%$s%' OR LastName LIKE '%$s%'";
}
//echo $sql;
$result2 = mysqli_query($db, $sql) or die("Došlo je do problema prilikom izvrsavanja upita...");
$n=mysqli_num_rows($result2);

if ($n > 0){
	
		echo "<table class=table>
			<thead>
			 <th>ID</th>
			 <th>Prezime</th>
			 <th>Ime</th>
			 <th>Ekstenzija</th>
			 <th>Email</th>
			 <th>Details</th>
			 <th>Update</th>
			 <th>Delete</th>
			</thead>";
	while ($myrow=mysqli_fetch_row($result2)){
		 
		echo " <tbody>
			  <tr>
			    <td data-label='ID'>$myrow[0]</td>
			    <td data-label='Prezime'>$myrow[1]</td>
			    <td data-label='Ime'>$myrow[2]</td>
			    <td data-label='Ekstenzija'>$myrow[3]</td>
		      	<td data-label='Email'>$myrow[4]</td>
				<td data-label='Details'><a href='#'".$myrow[1]."'>Details</a></td>
				<td data-label='Update'><a href='#'".$myrow[2]."'>Update</a></td>
				<td data-label='Delete'><a href='#'".$myrow[3]."'>Delete</a></td>
			 </tr>
		       </tbody>";
			
			

		}
		 echo "</table>";
	}
else {
echo "<span style=black:red>Nema rezultata za prikaz!<br></span>";
}	
}
else {
echo "<br>Nije proslo spajanje<br>";
}


?>
