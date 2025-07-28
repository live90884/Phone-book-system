<?php
session_start();
$conn = require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 準備 SQL 語句，使用 ? 作為佔位符
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); // s = string
    $stmt->execute();
    $result = $stmt->get_result();

    // 如果找到使用者
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // 使用 password_verify 來比對密碼
        if (password_verify($password, $row["password"])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("location: club.php");
            exit;
        } else {
            function_alert("Password or Account incorrect");
        }
    } else {
        function_alert("Password or Account incorrect");
    }

    $stmt->close();
    $conn->close();
} else {
    function_alert("Something wrong");
}

function function_alert($message) {
    echo "<script>alert('$message'); window.location.href='index.php';</script>";
    return false;
}
?>
