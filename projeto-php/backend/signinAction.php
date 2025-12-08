<?php
    include_once("../db/connection.php");
    include_once("../db/userDAO.php");

    $email = $_POST['email'];
    $password = $_POST['senha'];

    if (empty($email) || empty($password)) {
        setcookie("error", "Por favor, preencha todos os campos.", time() + 2, "/");
        header(header: "Location: ../signin.php");
        exit();
    }

    $conn = getConnection();

    if ($conn === null) {
        echo "oi";
        // header("Location: ../signin.php");
        // exit();
    } else {
        $user = loginUser($conn, $email, $password);
        echo $user["id"];

        if ($user) {
            echo "passei aqui1";
            session_start();
            $_SESSION["user"] = $user["id"];
            header("Location: ../garden.php");
        } else {
            setcookie("error", "Email ou senha inválidos.", time() + 2, "/");
            header("Location: ../signin.php");
        }
    }
?>