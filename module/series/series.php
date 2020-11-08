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

        <!-- Script modification/suppression element -->
        <script>
            function deleteItem(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "../../model.php?model=serie&action=delete&id=" + str, true);
                xmlhttp.send();
            }

            function updateItem(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "../../model.php?model=serie&action=update&id=" + str, true);
                xmlhttp.send();
            }
        </script>

        <section>
            <?php if (isset($_SESSION['auth'])): ?>
            <a href="/module/series/create_serie.php" class="create_line_link">
                <div class="create_line">
                    <h2>Ajouter une série</h2>
                </div>
            </a>
            <?php endif; ?>
        </section>

        <section>
            <div class="list_items">
                <?php
                    $query = $db->query("SELECT id, name, image, description, season, episode from `serie`");
                    while ($serie = $query->fetch())
                    { ?>
                    <div class="item">
                        <div class="item_image">
                            <?php echo '<img src="data:image/jpg;base64,' . base64_encode($serie['image']) . '"  alt="' . $serie['name'] . '" title="' . $serie['name'] . '"/>'; ?>
                        </div>
                        <div class="item_description">
                            <div><span class="item_label">Titre :</span><?php echo $serie['name']; ?></div>
                            <div><span class="item_label">Saisons :</span><?php echo $serie['season']; ?></div>
                            <div><span class="item_label">Episodes :</span><?php echo $serie['episode']; ?></div>
                            <div><span class="item_label">Description :</span><?php echo $serie['description']; ?></div>
                            <?php if (isset($_SESSION['auth'])): ?>
                            <div class="item_buttons">
                                <a id="update" onclick="updateItem(<?php echo $serie['id']; ?>)">Modifier</a>
                                <a id="delete" onclick="deleteItem(<?php echo $serie['id']; ?>)">Supprimer</a>
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


