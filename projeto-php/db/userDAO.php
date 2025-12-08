<?php 
    include_once("connection.php");

    function registerUser($conn, $email, $password) {
        $stmt = $conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        return $stmt->execute(); 
    }

    function loginUser($conn, $email, $password) {
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }
?>