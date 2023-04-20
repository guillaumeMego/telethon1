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
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>La Couronne Téléthon 2023</title>
</head>

<body class="vh-100 d-flex flex-column">

    <header class="mt-3">
        <div class="container">
            <div class="haut p-4 row">
                <div class="d-flex justify-content-center col-12 col-md-4 order-2 order-md-1">
                    <a href="index.php">
                        <img src="./../public/asset/img/logo-flunchy-fixed.png" alt="" height="60">    
                        <!-- <img src="public/asset/img/logo-flunchy-fixed.png" alt="" height="60"> -->
                    </a>
                </div>
                <div class="col-12 col-md-4 order-1 order-md-2 text-center">
                    <h1 class="display-6 fw-bolder">Compteur de don</h1>
                </div>
                <div class="d-flex justify-content-center col-12 col-md-4 order-3 order-md-3 d-none d-md-block">
                    <img src="./../public/asset/img/compteur.png" alt="" height="60">
                    <!-- <img src="public/asset/img/compteur.png" alt="" height="60"> -->
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow-1 p-4">

<?= $content ?>


<script src="https://kit.fontawesome.com/d2f808818c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>