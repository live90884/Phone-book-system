<!DOCTYPE html>
<html>
<body>

<?php
include_once 'connect.php';

$sql = "SELECT ID, name, sex , email ,TEL FROM member";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> ID= ". $row["ID"]. " <br> Name= ". $row["name"]. " <br>Sex=" . $row["sex"]
		. "<br>Email=" . $row["email"] . "<br> TEL=" . $row["TEL"];
		echo "<hr>";
    }
} else {
    echo "0 results";
}

$connection->close();
?>

</body>
</html>
