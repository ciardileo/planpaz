<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>PlanPaz</title>
</head>

<body>
    <main>
        <section class="main-container">
            <div class="logo-container">
                logo PlanPaz reduzida
            </div>
            <div class="alert-container">
                <?php if(isset($_COOKIE['success'])): ?>
                    <div class="alert-box alert-success">
                        <?= $_COOKIE['success']; ?>
                    </div>
                    <?php setcookie('success', '', time() - 3600, '/');?>
                <?php elseif(isset($_COOKIE['error'])): ?>
                    <div class="alert-box alert-error">
                        <?= $_COOKIE['error']; ?>
                    </div>
                    <?php setcookie('error', '', time() - 3600, '/');?>
                <?php endif; ?>
            </div>
            <div class="text-container">
                <h1>Vamos <br> começar</h1>
                <h2>Bem-vindo denovo!</h2>
            </div>
            <form action="backend/signinAction.php" method="post">
                <div class="input-container">
                    <label for="email">Email</label>
                    <input required type="email" name="email" placeholder="exemplo@gmail.com" class="input-field" />
                    <label for="senha">Senha</label>
                    <input required type="password" name="senha" placeholder="sua senha" class="input-field" />
                    <p>Você não possui uma conta? <a href="signup.php">Cadastre-se</a></p>
                </div>
                <input type="submit" class="input-field" value="Entrar"/>
            </form>
        </section>
    </main>
</body>
</html>