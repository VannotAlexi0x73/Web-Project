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
        
        <h1>Actuellement au cinéma</h1>
        
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

        <!-- <div class="carousel">
            <i class="fas fa-angle-right" id="next_Button"></i>
            <i class="fas fa-angle-left" id="prev_Button"></i>
            <div class="images_carousel">
                <img src="https://i1.sndcdn.com/artworks-000064920701-xrez5z-t500x500.jpg" id="lastClone" alt="7">
                <img src="https://i1.sndcdn.com/artworks-000165384395-rhrjdn-t500x500.jpg" alt="1">
                <img src="https://i1.sndcdn.com/artworks-000185743981-tuesoj-t500x500.jpg" alt="2">
                <img src="https://i1.sndcdn.com/artworks-000158708482-k160g1-t500x500.jpg" alt="3">
                <img src="https://i1.sndcdn.com/artworks-000062423439-lf7ll2-t500x500.jpg" alt="4">
                <img src="https://i1.sndcdn.com/artworks-000028787381-1vad7y-t500x500.jpg" alt="5">
                <img src="https://i1.sndcdn.com/artworks-000108468163-dp0b6y-t500x500.jpg" alt="6">
                <img src="https://i1.sndcdn.com/artworks-000064920701-xrez5z-t500x500.jpg" alt="7">
                <img src="https://i1.sndcdn.com/artworks-000165384395-rhrjdn-t500x500.jpg" id="firstClone" alt="1">
            </div>
        </div> -->

        <script src="js/carousel.js"></script>
        
        <!-- Include footer -->
        <?php include "module/base/footer.php"; ?>
    </body>

</html>
