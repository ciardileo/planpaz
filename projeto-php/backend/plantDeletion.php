<?php 
if (isset($_POST["plantId"])) {
    session_start();
    if (isset($_SESSION["user"])) {
        include_once("../db/plantaDAO.php");
        $plantId = $_POST["plantId"];

        if (!getGardenPlant($_SESSION["user"], $plantId)){
            // a planta tentando ser deletada não é do usuário logado
            setcookie("error", "Você tentou deletar uma planta que não é sua", time() + 2, "/");
            header("Location: ../home.php");
        };

        // VERIFICAR SE O USUÁRIO ESTÁ LOGADO NA SESSÃO E SE CORRESPONDE AO USUÁRIO DA PLANTA

        if (removeGardenPlant($plantId)) {
            setcookie("success", "Planta removida com sucesso!", time() + 2, "/");
            header("Location: ../garden.php");
        } else {
            setcookie("error", "Não foi possível deletar a planta!", time() + 2, "/");
            header("Location: ../plant.php?id=".$plantId);
        }
    } else {
        // usuário não está logado na cessão
        setcookie("error", "Logue para utilizar o aplicativo", time() + 2, "/");
        header("Location: ../signin.php");
    }

} else {
    // tentou acessar a URL sem uma requisição post
    header("Location: ../home.php");
}

?>