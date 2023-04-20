<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://kit.fontawesome.com/d2f808818c.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./../public/css/default.css">
    <link rel="stylesheet" href="./../node_modules/bootstrap/scss/bootstrap.scss">
    <link rel="shortcut icon" href="./../public/asset/img/babouche.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="public/css/default.css">
    <link rel="stylesheet" href="vendor/node_modules/bootstrap/scss/bootstrap.scss">
    <link rel="shortcut icon" href="public/asset/img/babouche.ico" type="image/x-icon"> -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>La Couronne Téléthon 2023</title>
</head>

<body class="vh-100 d-flex flex-column">
    <?php if (isset($_SESSION['msg'])) : ?>
        <div class="bg-<?= $_SESSION['msg']['css'] ?> p-2 text-center">
            <?= $_SESSION['msg']['txt'] ?>
        </div>
    <?php unset($_SESSION['msg']);
    endif; ?>
    <header>
        <div class="container">
            <div class="haut p-4 row">
                <div class="d-flex justify-content-center col-12 col-md-4 order-2 order-md-1 d-none d-md-block">
                    <a href="index.php">
                        <img src="./../public/asset/img/logo-flunchy-fixed.png" alt="" height="60">    
                        <!-- <img src="public/asset/img/logo-flunchy-fixed.png" alt="" height="60"> -->
                    </a>
                </div>
                <div class="col-12 col-md-4 order-1 order-md-2 text-center">
                    <h1 class="display-6">Compteur de don</h1>
                </div>
                <!-- <div class="d-flex justify-content-center col-12 col-md-4 order-3 order-md-3"> -->
                    <img src="./../public/asset/img/compteur.png" alt="" height="60">
                    <img src="public/asset/img/compteur.png" alt="" height="60">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-sm bg-info d-none d-md-block">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?controller=collects">Collectes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?controller=stands">Stands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?controller=partners">Partenaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?controller=users">Utilisateurs</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item btn-group">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['profil']['name'] ?>
                            </a>
                            <ul class="dropdown-menu bg-info dropdown-menu-end">
                                <li><a class="dropdown-item text-white" href="#">Profil</a></li>
                                <li><a class="dropdown-item text-white" href="index.php?controller=profil&action=logout">Se déconnecter</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

    </header>
    <main class="flex-grow-1 p-4">
        <?= $content ?>
    </main>
    <footer class="bg-info p-4 text-white">
        <div class="row text-center">
            <a href="#" class="nav-link col-6 col-md-3">Correction</a>
            <a href="#" class="nav-link col-6 col-md-3">Le compteur</a>
            <a href="#" class="nav-link col-6 col-md-3">Le site web</a>
            <a href="https://www.facebook.com/lacouronne.actions.telethon/?locale=fr_FR" class="nav-link col-6 col-md-3"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/d2f808818c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>