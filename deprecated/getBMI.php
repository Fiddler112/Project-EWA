<!DOCTYPE html>
<html>
<body>
<h1> TEST FILE</h1>
<?php
include_once 'db_connect.php';


$sql = "SELECT BMI FROM BMI";
$result = $conn->query($sql);
if($result == FALSE) {
	print(mysqli_error());
} else {
	while($row = $result->fetch_assoc()) {
		echo "<br> BMI: ". $row["BMI"];
	}
}

$conn->close();

?>
</body>
</html>