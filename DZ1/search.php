<style>
<?php include 'css/mystyle.css'; ?>
</style>

<?php
$mysqli = new mysqli("localhost", "root", "", "birt");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$q=$_GET["q"];  
$sql = "SELECT employeeNumber, lastName, firstName, jobTitle
FROM employees WHERE firstName LIKE '%$q%' OR lastName LIKE '%$q%'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<div class='wrapper'>
	        <table class='table'>
			  <tr>
                <th width='5%'>ID</th>
                <th width='25%'>Prezime</th>
                <th width='20%'>Ime</th>
                <th width='10%'>Posao</th>
                <th width='10%'>Details</th>
                <th width='10%'>Update</th>
                <th width='10%'>Delete</th>
			  </tr>";
  while($row = mysqli_fetch_row($result)) {
    echo "<tr> ";
    echo "<td  width='5%'>" . $row[0].  "</td>";
    echo "<td  width='25%'>" . $row[1]. "</td>";
    echo "<td  width='20%'>" . $row[2]. "</td>";
    echo "<td  width='10%'>" . $row[3]. "</td>";
    echo "<td><a href='#'".$row[1]."'>Details</a></td>";
    echo "<td><a href='#'".$row[2]."'>Update</a></td>";
    echo "<td><a href='#'".$row[3]."'>Delete</a></td>";
    echo "</tr> "; 
    echo "</div>";
} 
} else {
  echo "Nema podudarnih rezultata...";
}
$mysqli->close();
?>
