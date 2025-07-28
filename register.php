<?php
$conn=require_once 'connect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    //check if repeat
    $check="SELECT * FROM users WHERE username='".$username."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO users (id,username, password)
            VALUES(NULL,'".$username."','".$password."')";
        
        if(mysqli_query($conn, $sql)){
            echo "register success!go back after 3sec<br>";
            echo "<a href='index.php'>manual</a>";
            header("refresh:32;url=index.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "Repeat account!<br>go back after 3sec <br>";
        echo "<a href='register.html'>manual</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}


mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    
    return false;
} 
?>