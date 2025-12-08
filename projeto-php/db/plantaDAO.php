<?php 
    include_once("connection.php");

    /* 
    os dados foram simplificados para:
    tabela plant:
        plantNickname
        stage
        plantedAt
        specie
        ownerId
        image
    
    tabela user:
        firstName
        email
        username
        password
    */

    function daysAlive($plantedAt) {
        date_default_timezone_set('America/Sao_Paulo');
        $plantedAt = new DateTime($plantedAt);
        $now = new DateTime();
        $diff = $plantedAt->diff($now);
        return $diff->format('%a');
    }

    
    // retorna um array com o object de cada planta
    function getAllGardenPlants($idUser) {
        // connection
        $conn = getConnection();

        if (!$conn) {
            // echo "Erro na conexão";
            return;
        }

        // results
        $resultsArray = array();

        // stmt
        $sql = "SELECT * from garden_plant WHERE user_id = ?;";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("i", $idUser);

        if ($stmt -> execute()) {
            $results = $stmt -> get_result();

            if ($results -> num_rows > 0) {
                $count = 0;
                while ($row = $results -> fetch_assoc()) {
                    $resultsArray[$count]["id"] = $row["id"];
                    $resultsArray[$count]["nickname"] = $row["nickname"];
                    $resultsArray[$count]["stage"] = $row["stage"];
                    $resultsArray[$count]["plantedAt"] = $row["planted_at"];
                    $resultsArray[$count]["specie"] = $row["specie"];
                    $resultsArray[$count]["image"] = $row["image"];
                    $count ++;
                }

                return $resultsArray;
            } else {
                // echo "Sem resultados";
                return false;
            } 
        } else {
            // echo "Erro na execução";
            return false;
        }

        // return [
        //     ["nickname" => "Espinhozinho", "stage" => 1, "specie" => "Cacto", "plantedAt" => "2025-10-09", "image" => "https://images.unsplash.com/photo-1687106358396-20daadef9e36?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGl0dGxlJTIwcGxhbnR8ZW58MHx8MHx8fDA%3D"],
        //     ["nickname" => "Espinhozinho", "stage" => 1, "specie" => "Cacto", "plantedAt" => "2025-10-09", "image" => "https://images.unsplash.com/photo-1687106358396-20daadef9e36?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGl0dGxlJTIwcGxhbnR8ZW58MHx8MHx8fDA%3D"],
        //     ["nickname" => "Espinhozinho", "stage" => 1, "specie" => "Cacto", "plantedAt" => "2025-10-09", "image" => "https://images.unsplash.com/photo-1687106358396-20daadef9e36?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGl0dGxlJTIwcGxhbnR8ZW58MHx8MHx8fDA%3D"],
        // ]; 
    }

    // retorna um object de uma planta única
    function getGardenPlant($idUser, $idPlant) {
        // connection
        $conn = getConnection();

        if (!$conn) {
            echo "Erro na conexão";
            return;
        }

        // resultado da planta
        $plant = array();

        // stmt
        $sql = "SELECT * from garden_plant WHERE user_id = ? AND id = ?;";  // filtra pelo id de usuário para garantir que apenas o próprio usuário possa ver sua planta
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("ii", $idUser, $idPlant);

        if ($stmt -> execute()) {
            $results = $stmt -> get_result();

            if ($results -> num_rows > 0) {
                $row = $results -> fetch_assoc();
                $plant["id"] = $row["id"];
                $plant["nickname"] = $row["nickname"];
                $plant["stage"] = $row["stage"];
                $plant["plantedAt"] = $row["planted_at"];
                $plant["specie"] = $row["specie"];
                $plant["image"] = $row["image"];

                return $plant;
                
            } else {
                echo "Sem resultados";
                return false;
            } 
        } else {
            echo "Erro na execução";
            return false;
        }
    }

    // cria uma planta nova no jardim do usuário, passando o id do usuário e um object da planta
    function createGardenPlant($userId, $plant) {
        // conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        // stmt
        $sql = "INSERT INTO garden_plant (user_id, nickname, specie, stage, planted_at, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn -> prepare($sql);

        $stmt -> bind_param("isssss", $userId, $plant["nickname"], $plant["specie"], $plant["stage"], $plant["plantedAt"], $plant["image"]);

        // execution
        if ($stmt -> execute()) {
            return true;
        } else {
            return false;
        }
    }

    // remove uma planta do jardim do usuárioo
    function removeGardenPlant($idPlant) {
        // conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        // stmt
        $sql = "DELETE FROM garden_plant WHERE id = ?";
        $stmt = $conn -> prepare($sql);

        $stmt -> bind_param("i", $idPlant);

        // execution
        if ($stmt -> execute()) {
            return true;
        } else {
            return false;
        }

    }

    // edita o nome e data de semeadura de uma planta do usuário
    function editGardenPlant($idPlant, $newName, $newPlantedDate, $newSpecie) {
        // conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        // stmt
        $sql = "UPDATE garden_plant SET nickname = ?, planted_at = ?, specie = ? where id = ?";
        $stmt = $conn -> prepare($sql);

        $stmt -> bind_param("sssi", $newName, $newPlantedDate, $newSpecie, $idPlant);

        // execution
        if ($stmt -> execute()) {
            return true;
        } else {
            return false;
        }

    }

?>