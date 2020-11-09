<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <link rel="icon" type="image/png" href="img/favicon.png">
        <?php include "module/base/link.php"; ?>

    </head>

    <body>

        <!-- Include header -->
        <?php
            include "module/base/header.php";
            include 'includes/database.php';
            global $db;
            ?>

        <!-- script -->
        
        <h1><u>Actuellement au cinéma</u></h1>
        
        <div class="carousel">
            <i class="fas fa-angle-right" id="next_Button"></i>
            <i class="fas fa-angle-left" id="prev_Button"></i>
            <div class="images_carousel">
                <?php $query = $db->query("SELECT name, image from `movie.showing`");
                    while ($movieShowing = $query->fetch()) {
                        echo '<img src="data:image/jpg;base64,' . base64_encode($movieShowing['image']) . '"  alt="' . $movieShowing['name'] . '" title="' . $movieShowing['name'] . '"/>';
                } ?>
            </div>
        </div>

        <script src="js/carousel.js"></script>

        <!-- Include footer -->
        <?php include "module/base/footer.php"; ?>
    </body>

</html>
