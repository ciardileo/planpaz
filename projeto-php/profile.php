<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/globals.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=add,groups,home,notifications,person,potted_plant,search" />

    <script defer src="assets/js/main.js"></script>
    <title>Meu perfil</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["user"])) { ?>
        <header class="main-header">
            <h1 class="title">Meu perfil</h1>
            <button class="notification-btn">
                <span class="material-symbols-outlined">
                    notifications
                </span>
            </button>
        </header>

        <main>
            
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
                    <a href="./profile.php" class="nav-icon selected">
                        <span class="material-symbols-outlined">
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