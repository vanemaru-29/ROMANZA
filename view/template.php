<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- normalize css -->
    <link rel="stylesheet" href="view/../public/css/normalize.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="view/../bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <!-- estilos css -->
    <link rel="stylesheet" href="view/../public/css/styles.css">

    <!-- icono -->
    <link rel="shortcut icon" href="view/../public/assets/icons/icon-page.svg" type="image/x-icon">

    <title> ROMANZA 
        <?php
            require ('view/../controller/title-page.php');
            require ('view/../model/title-page.php');
            $title = new TitleController();
            $title -> titlePage();
        ?>
    </title>
</head>
<body>
    <!-- navbar -->
    <header>
        <?php
            include ('view/partials/navbar.html');
        ?>
    </header>

    <main>
        <?php
            $mvc = new NavigationController();
            $mvc -> linksPagesC();
        ?>
    </main>

    <footer>

    </footer>

    <!-- Bootstrap JS -->
    <script src="view/../bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="view/../bootstrap/js/bootstrap.bundle.min.js"></script> -->
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/095148edc4.js" crossorigin="anonymous"></script>
    
    <!-- navbar -->
    <script src="view/../public/js/navbar.js"></script>
</body>
</html>