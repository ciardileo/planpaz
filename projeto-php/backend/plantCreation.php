<?php 
if (isset($_POST["nickname"])) {
    session_start();
    if (isset($_SESSION["user"])) {
        include_once("../db/plantaDAO.php");
        // VERIFICAR SESSÃO DO USUÁRIO

        $userId = $_SESSION["user"];
        $plant = array();
        $plant["nickname"] = $_POST["nickname"];
        $plant["specie"] = $_POST["specie"];
        $plant["plantedAt"] = $_POST["plantedAt"];
        $plant["image"] = $_POST["image"];

        if (createGardenPlant($userId, $plant)) {
            setcookie("success", "Planta adicionada com sucesso no seu jardim!", time() + 2, "/");
            header("Location: ../garden.php");
        } else {
            setcookie("error", "Algo deu errado ao tentar adicionar planta!", time() + 2, "/");
            header("Location: ../garden.php");
        }
    
    } else {
        header("Location: ../signin.php");
    }
} else {
    header("Location: ../home.php");
}

?>