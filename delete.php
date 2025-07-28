<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Pcdm3401", "club");
$id = $_GET['ID'];
echo $_GET["ID"] . "<br>";
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt delete query execution
$sql = "DELETE FROM member WHERE ID='$id'";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
#http://127.0.0.1/club.php
#header("refresh:3;url=http://www.XXXXX.com");
#header("refresh:2;Location: club.php");
header("refresh:3;url=http://134.208.2.176/club.php");
?>