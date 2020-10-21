<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - DVD</title>
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

        <form method="post" class="form_create">

            <div>
                <div class="form_label">
                    <label for="name">Titre<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="text" placeholder="ex: Avengers endgame" id="name" name="name" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="image">Affiche<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="file" id="image" name="image" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="description">Description<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="text" placeholder="ex: Description" id="description" name="description" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="release_date">Date de sortie<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="date" id="release_date" name="release_date" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="movie_time">Durée du film<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="time" id="movie_time" name="movie_time" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="tag_ids">Tags<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <select id="selectMultiple" name="tag_ids" required="True" onchange="multipleSelect()">
                        <option value="">-- Sélectionner --</option>
                        <?php
                            $query = $db->query("SELECT name, id from `res.tag`");
                            while ($tagType = $query->fetch())
                            { ?>
                                <option value="<?php echo $tagType['id']; ?>"><?php echo $tagType['name']; ?></option>
                            <?php }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Submit bouton -->
            <div>
                <button type="submit" id="create_dvd" name="create_dvd">Créer</button>
            </div>

        </form>

        <script>
function multipleSelect() {
    console.log("function multipleSelect()");

    select = document.getElementById("selectMultiple");

    

}
        </script>

        <?php
            if (isset($_POST['create_dvd']))
            {
                extract($_POST);
                if (!empty($name) && !empty($description) && !empty($release_date) && !empty($movie_time) && !empty($image))
                {
                    $query = $db->prepare("INSERT INTO `movie`(name, image, description, release_date, movie_time) VALUES (:name, :image, :description, :release_date, :movie_time)");
                    $query->execute([
                        'name' => $name,
                        'image' => $image,
                        'description' => $description,
                        'release_date' => $release_date,
                        'movie_time' => $movie_time,
                        ]);
                    unset($_POST);
                }
            }
        ?>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


