<?php 
if (isset($_POST["plantId"])) {
    // variáveis do formulário
    $plantId = $_POST["plantId"];
    $newNickname = $_POST["nickname"];
    $newSpecie = $_POST["specie"];
    $newPlantedDate = $_POST["planted-date"];

    // execução da função no banco de dados
    include_once("../db/plantaDAO.php");
    
    if (editGardenPlant($plantId, $newNickname, $newPlantedDate, $newSpecie)) {
        setcookie("success", "Dados da planta alterados com sucesso!", time() + 2, "/");
        header("Location: ../plant.php?id=".$plantId);
    } else {
        setcookie("error", "Não foi possível alterar os dados da planta!", time() + 2, "/");
    }

} else {
    // tentou acessar a url sem uma requisição POST
    header("Location: ../home.php");
}
?>