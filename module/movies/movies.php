<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Films</title>
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

        <!-- Script modification/suppression element -->
        <script>
            function deleteItem(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "../../model.php?model=movie&action=delete&id=" + str, true);
                xmlhttp.send();
            }

            function updateItem(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "../../model.php?model=movie&action=update&id=" + str, true);
                xmlhttp.send();
            }
        </script>

        <section>
            <?php if (isset($_SESSION['auth'])): ?>
            <a href="/module/movies/create_movie.php" class="create_line_link">
                <div class="create_line">
                    <h2>Ajouter un film</h2>
                </div>
            </a>
            <?php endif; ?>
        </section>

        <section>
            <div class="list_items">
                <?php
                    $query = $db->query("SELECT id, name, image, description, movie_time, release_date from `movie`");
                    while ($dvd = $query->fetch())
                    { ?>
                    <div class="item">
                        <div class="item_image">
                            <?php echo '<img src="data:image/jpg;base64,' . base64_encode($dvd['image']) . '" height="" width="" alt="mon image" title="image"/>';?>
                        </div>
                        <div class="item_description">
                            <div><span class="item_label">Titre :</span><?php echo $dvd['name']; ?></div>
                            <div><span class="item_label">Durée du film :</span><?php echo $dvd['movie_time']; ?></div>
                            <div><span class="item_label">Date de sortie :</span><?php echo $dvd['release_date']; ?></div>
                            <div><span class="item_label">Description :</span><?php echo $dvd['description']; ?></div>
                            <?php if (isset($_SESSION['auth'])): ?>
                            <div class="item_buttons">
                                <a id="update" onclick="updateItem(<?php echo $dvd['id']; ?>)">Modifier</a>
                                <a id="delete" onclick="deleteItem(<?php echo $dvd['id']; ?>)">Supprimer</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        
        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


