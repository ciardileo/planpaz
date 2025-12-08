<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/globals.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=add,groups,home,notifications,person,potted_plant,search" />

    <script src="assets/js/addPlant.js" defer></script>
    <script defer src="assets/js/main.js"></script>
    <title>Meu Jardim</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["user"])) { ?>
        <header class="main-header">
            <h1 class="title">Meu Jardim</h1>
            <button class="notification-btn">
                <span class="material-symbols-rounded">
                    notifications
                </span>
            </button>
        </header>

        <main>
            <!-- COOKIES -->
            <?php if (isset($_COOKIE["success"])) { ?>
                <div class="cookie success">
                    <p><?= $_COOKIE["success"] ?></p>
                </div>   
            <?php } else if (isset($_COOKIE["error"])) { ?>
                <div class="cookie error">
                    <p><?= $_COOKIE["error"] ?></p>
                </div>   
            <?php } ?>

            <div class="searchbar">
                <input type="text" name="query" id="query" placeholder="Nome da planta (não implementado)">
                <button class="search-button">
                    <span class="material-symbols-rounded">
                        search
                    </span>
                </button>
            </div>

            <section id="plants-container">
                <?php
                include_once("db/plantaDAO.php");
                $plants = getAllGardenPlants($_SESSION["user"]);

                if ($plants) 
                     foreach ($plants as $plant): ?>
                        <a href="plant.php?id=<?= $plant["id"]?>">
                            <div class="plant-card">
                                <img src="<?= $plant["image"] ?>" alt="Planta" class="plant-image">
                                <div class="image-filter"></div>
                                <div class="plant-description">
                                    <div class="container">
                                        <h3><?= $plant["nickname"] ?></h3>
                                        <p><?= daysAlive($plant["plantedAt"]) ?>d</p>
                                    </div>
                                    <p>
                                        <span class="green"><?= $plant["specie"] ?></span> - Estágio <?= $plant["stage"] ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                <?php endforeach; 
                 else {
                    echo "<h1 class='subtitle'>Não há nenhuma planta adicionada!";
                }
                ?>
            </section>

            <!-- MODAL DE CRIAR PLANTA -->
            <div id="modal">
                <div id="new-plant-modal">
                    <h1 class="subtitle">Adicionar nova planta</h1>
                    <form action="backend/plantCreation.php" method="POST">
                        <div class="form-item">
                            <label for="nickname">Apelido:</label>
                            <input required type="text" name="nickname" id="nickname" maxlength="15">
                        </div>
                        <div class="form-item">
                            <label for="specie">Espécie:</label>
                            <input required type="text" name="specie" id="specie" maxlength="15">
                        </div>

                        <div class="form-item">
                            <label for="plantedAt">Data de semeadura:</label>
                            <input required type="date" name="plantedAt" id="plantedAt">
                        </div>

                        <div class="form-item">
                            <label for="image">Link da imagem:</label>
                            <input type="text" name="image" id="image" maxlength="300">
                        </div>

                        <input type="submit" value="Adicionar">
                    </form>
                    <button id="cancel-new-plant-btn">Cancelar</button>
                </div>
            </div>

            <div class="empty-container">

            </div>
        </main>

        <footer>
            <button id="add-plant-btn">
                <span class="material-symbols-rounded">
                    add
                </span>
            </button>

            <nav>
                <div class="nav-item">
                    <a href="./community.php" class="nav-icon">
                        <span class="material-symbols-rounded">
                            groups
                        </span>
                    </a>
                    <p>Comunidade</p>
                </div>
                <div class="nav-item">
                    <a href="./home.php" class="nav-icon">
                        <span class="material-symbols-rounded">
                            home
                        </span>
                    </a>
                    <p>
                        Início
                    </p>
                </div>
                <div class="nav-item">
                    <a href="./garden.php" class="nav-icon selected">
                        <span class="material-symbols-rounded">
                            potted_plant
                        </span>
                    </a>
                    <p>Meu Jardim</p>
                </div>
                <div class="nav-item">
                    <a href="./profile.php" class="nav-icon">
                        <span class="material-symbols-rounded">
                            person
                        </span>
                    </a>
                    <p>Perfil</p>
                </div>

            </nav>
        </footer>



    <?php } else {
        header("Location: signin.php");
    }
    ?>


</body>

</html>

