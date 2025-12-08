<?php
    include_once("../db/connection.php");
    include_once("../db/userDAO.php");

    $email = $_POST['email'];
    $password = $_POST['senha'];
    $verifyPassword = $_POST['confirmaSenha'];

    if (empty($email) || empty($password) || empty($verifyPassword)) {
        setcookie("error", "Por favor, preencha todos os campos.", time() + 2, "/");
        header("Location: ../signup.php");
        exit();
    }

    if ($password !== $verifyPassword) {
        setcookie("error", "As senhas não coincidem.", time() + 2, "/");
        header("Location: ../signup.php");
        exit();
    }

    $conn = getConnection();

    if ($conn === null) {
        header("Location: ../signup.php");
        exit();
    }else {
        $registered = registerUser($conn, $email, $password);

        if ($registered) {
            setcookie("success", "Cadastro realizado com sucesso! Faça login para continuar.", time() + 2, "/");
            header("Location: ../signin.php");
            exit();
        } else {
            setcookie("error", "Erro ao cadastrar usuário. Tente novamente.", time() + 2, "/");
            header("Location: ../signup.php");
            exit();
        }
    }

?>