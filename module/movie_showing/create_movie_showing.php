<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Ajouter un film à l'affiche</title>
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
            <form method="post" class="form_create" enctype="multipart/form-data">
                <h1><u>Film à l'affiche</u></h1>
                <table>
                    <tr>
                        <td class="form_label">
                            <label for="name">Titre<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="text" id="name" name="name" placeholder="ex: 30 jours max" onkeyup="upperWord('name')" required="True"/>
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

                </table>
                <!-- Submit bouton -->
                <div>
                    <button type="submit" id="create_movie_showing" name="create_movie_showing">Créer</button>
                </div>

            </form>
        </section>

        <?php
            if (isset($_POST['create_movie_showing']))
            {
                extract($_POST);
                if ($name && $_FILES["image"] && $description)
                {
                    $query = $db->prepare("INSERT INTO `movie.showing`(name, image, description) VALUES (:name, :image, :description)");
                    $query->execute([
                        'name' => $name,
                        'image' => file_get_contents($_FILES["image"]["tmp_name"]),
                        'description' => $description,
                    ]);
                    unset($_POST);
                }
            }
        ?>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>
