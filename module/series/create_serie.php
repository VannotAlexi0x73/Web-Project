<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Créer une série</title>
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
                <h1><u>Série</u></h1>
                <table>
                    <tr>
                        <td class="form_label">
                            <label for="name">Nom<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="text" id="name" name="name" placeholder="ex: LA CASA DE PAPEL" onkeyup="upperWord('name')" required="True"/>
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
                            <label for="season">Nombre de saisons<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="number" id="season" name="season" placeholder="3" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="episode">Nombre d'épisodes<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="number" id="episode" name="episode" placeholder="24" required="True"/>
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

                </table>
                <!-- Submit bouton -->
                <div>
                    <button type="submit" id="create_serie" name="create_serie">Créer</button>
                </div>

            </form>
        </section>

        <?php
            if (isset($_POST['create_serie']))
            {
                extract($_POST);
                if ($name && $image && $description && $season && $episode)
                {
                    $query = $db->prepare("INSERT INTO `serie`(name, image, description, season, episode) VALUES (:name, :image, :description, :season,  :episode)");
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
