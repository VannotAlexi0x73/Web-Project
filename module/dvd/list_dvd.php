<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Séries</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <?php include "../../module/base/link.php"; ?>

    </head>

    <body>
        <!-- Include header -->
        <?php
            include "../../module/base/header.php";
            include '../../includes/database.php';
            global $db;
        ?>

        <?php
            $query = $db->query("SELECT name, image, description, release_date, movie_time from `movie`");
            while ($movie = $query->fetch())
            { ?>
                <div>
                    <div><?php echo $movie['name']; ?></div>
                    <img src="data:image/png;base64,<?php echo base64_encode($movie["image"]); ?>">
                    <div><?php echo $movie['description']; ?></div>
                    <div><?php echo $movie['release_date']; ?></div>
                    <div><?php echo $movie['movie_time']; ?></div>
                    <div><i class="fas fa-edit"></i></div>
                    <div><i class="fas fa-trash-alt"></i></div>
                </div>
            <?php }
        ?>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


