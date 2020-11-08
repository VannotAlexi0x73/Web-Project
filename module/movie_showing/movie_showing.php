<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Films à l'affiche</title>
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
                xmlhttp.open("GET", "../../model.php?model=movie.showing&action=delete&id=" + str, true);
                xmlhttp.send();
            }

            function updateItem(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "../../model.php?model=movie.showing&action=update&id=" + str, true);
                xmlhttp.send();
            }
        </script>

        <section>
            <?php if (isset($_SESSION['auth'])): ?>
            <a href="/module/movie_showing/create_movie_showing.php" class="create_line_link">
                <div class="create_line">
                    <h2>Ajouter un film à l'affiche</h2>
                </div>
            </a>
            <?php endif; ?>
        </section>

        <section>
            <div class="list_items">
                <?php
                    $query = $db->query("SELECT id, name, image, description from `movie.showing`");
                    while ($movieShowing = $query->fetch())
                    { ?>
                    <div class="item">
                        <div class="item_image">
                            <?php echo '<img src="data:image/jpg;base64,' . base64_encode($movieShowing['image']) . '" height="" width="" alt="mon image" title="image"/>';?>
                        </div>
                        <div class="item_description">
                            <div><span class="item_label">Nom :</span><?php echo $movieShowing['name']; ?></div>
                            <div><span class="item_label">Description :</span><?php echo $movieShowing['description']; ?></div>
                            <?php if (isset($_SESSION['auth'])): ?>
                            <div class="item_buttons">
                                <a onclick="updateItem(<?php echo $movieShowing['id']; ?>)">Modifier</a>
                                <a onclick="deleteItem(<?php echo $movieShowing['id']; ?>)">Supprimer</a>
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


