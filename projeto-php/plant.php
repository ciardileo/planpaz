<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/globals.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=add,arrow_back_ios,groups,home,notifications,person,potted_plant,search" />

    <script src="assets/js/deletePlant.js" defer></script>
    <script defer src="assets/js/main.js"></script>
    <title>Início</title>
</head>

<body>
    <?php
    // verifica se o usuário está logado e se há algum id de planta passado via GET
    if (isset($_GET["id"])) {
        session_start();
        if (isset($_SESSION["user"])) {
            include_once("db/plantaDAO.php");
            $plant = getGardenPlant($_SESSION["user"], $_GET["id"]);
    ?>
            <header class="main-header">
                <div>
                    <a class="back-link" href="garden.php">
                        <span class="material-symbols-outlined">
                            arrow_back_ios
                        </span>
                        <p>
                            Voltar
                        </p>
                    </a>

                    <?php
                        if ($plant) {
                        ?>

                        <h1 class="title"><?= $plant["nickname"] ?></h1>
                </div>
                <button class="notification-btn">
                    <span class="material-symbols-outlined">
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

                <!-- FORMULÁRIO DE EDIÇÃO E BOTÃO PARA REMOVER PLANTA -->
                <img id="plant-cover" src="<?= $plant["image"] ?>" alt="Plant image">
                <form action="backend/plantEdit.php" method="POST">
                    <div class="form-item">
                        <label for="nickname">Apelido:</label>
                        <input required type="text" name="nickname" id="nickname" value="<?= $plant["nickname"] ?>" maxlength="15">
                    </div>
                    <div class="form-item">
                        <label for="specie">Espécie:</label>
                        <input required type="text" name="specie" id="specie" value="<?= $plant["specie"] ?>" maxlength="15">
                    </div>

                    <div class="form-item">
                        <label for="planted-date">Data de semeadura:</label>
                        <input required type="date" name="planted-date" id="planted-date" value="<?= $plant["plantedAt"] ?>">
                    </div>

                    <input type="hidden" name="plantId" value="<?= $plant["id"] ?>">

                    <input type="submit" value="Confirmar">
                </form>
                
                <button id="delete-modal-btn">Apagar planta</button>

                <div id="modal">
                    <div id="confirm-delete-modal">
                        <form action="backend/plantDeletion.php" method="POST">
                            <h1 class="subtitle" style="text-align: center;">Você tem certeza que deseja excluir essa planta?</h1>
                            <input type="hidden" name="plantId" value="<?= $plant["id"] ?>">
                            <input type="submit" value="Confirmar" id="confirm-delete-btn">
                        </form>
                        <button id="cancel-new-plant-btn">Cancelar</button>
                    </div>
                </div>
            </main>

            <footer>
                <nav>
                    <div class="nav-item">
                        <a href="./community.php" class="nav-icon">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </a>
                        <p>Comunidade</p>
                    </div>
                    <div class="nav-item">
                        <a href="./home.php" class="nav-icon">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </a>
                        <p>
                            Início
                        </p>
                    </div>
                    <div class="nav-item">
                        <a href="./garden.php" class="nav-icon">
                            <span class="material-symbols-outlined">
                                potted_plant
                            </span>
                        </a>
                        <p>Meu Jardim</p>
                    </div>
                    <div class="nav-item">
                        <a href="./profile.php" class="nav-icon">
                            <span class="material-symbols-outlined">
                                person
                            </span>
                        </a>
                        <p>Perfil</p>
                    </div>

                </nav>
            </footer>
            <?php
                    } else {
                        echo "<h1 class='subtitle'>Essa planta não existe ou você não possui permissão para acessá-la!</h1>";
                    }
                } else {
                    header("Location: signin.php");
                }
            } else {
                header("Location: garden.php");
            }
            ?>
</body>
</html>