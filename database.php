<?php
	include_once 'connect.php';
	$name=$_POST['name'];
	$sex=$_POST['Options'];
	$email=$_POST['email'];
	$TEL=$_POST['tel'];

	$sql = "INSERT INTO member (name, sex, email ,TEL)
	VALUES ('$name', '$sex', '$email','$TEL')";

	if ($connection ->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $connection ->error;
	}

	$connection ->close();
	header("Location: club.php");

?>
