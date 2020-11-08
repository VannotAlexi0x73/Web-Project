<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Créer un film à l'affiche</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <?php include "../../module/base/link.php"; ?>
        <script type="text/javascript" src="../../js/form.js"></script>

    </head>

    <body>
        <!-- Include header -->
        <?php
            include "../../module/base/header.php";
            include '../../includes/database.php';
            global $db;
        ?>

        <section>
            <form method="post" class="form_create">
                <h1><u>Film à l'affiche</u></h1>
                <table>
                    <tr>
                        <td class="form_label">
                            <label for="name">Nom<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="text" id="name" name="name" placeholder="ex: SPLIELBERG" onkeyup="upperWord('name')" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="image">Affiche<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="file" id="image" name="image" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="description">Description<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <textarea id="description" name="description" rows="10" placeholder="ex: Description..." required="True"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="season">Nombre de saisons<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="number" id="season" name="season" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="episode">Nombre d'épisodes<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="number" id="episode" name="episode" required="True"/>
                        </td>
                    </tr>

                </table>
                <!-- Submit bouton -->
                <div>
                    <button type="submit" id="create_cinema" name="create_cinema">Créer</button>
                </div>

            </form>
        </section>

    <script>
function multipleSelect() {
    console.log("function multipleSelect()");
    select = document.getElementById("selectMultiple");
}
        </script>

        <?php
            if (isset($_POST['create_cinema']))
            {
                extract($_POST);
                if ($name && $image && $description && $season && $episode)
                {
                    $query = $db->prepare("INSERT INTO `res.actor`(name, image, description, season, episode) VALUES (:name, :image, :description, :season,  :episode)");
                    $query->execute([
                        'name' => $name,
                        'image' => $image,
                        'description' => $description,
                        'season' => $season,
                        'episode' => $episode,
                    ]);
                    unset($_POST);
                }
            }
        ?>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


<!-- <div>
    <div class="form_label">
        <label for="movie_ids">Films<sup>*</sup></label>
    </div>
    <div class="form_input">
        <select id="selectMultiple" name="movie_ids" required="True" onchange="multipleSelect()">
            <option value="">-- Sélectionner --</option>
            <?php
                $query = $db->query("SELECT name, id from `movie`");
                while ($tagType = $query->fetch())
                { ?>
                <option value="<?php echo $tagType['id']; ?>"><?php echo $tagType['name']; ?></option>
            <?php } ?>
        </select>
    </div>
</div> -->