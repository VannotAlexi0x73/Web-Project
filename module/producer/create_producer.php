<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Réalisateurs</title>
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
                    <label for="lastname">Nom<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="text" placeholder="ex: SPLIELBERG" id="firstname" name="firstname" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="firstname">Prénom<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="text" placeholder="ex: Steven" id="firstname" name="firstname" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="birthday_date">Date de naissance<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="date" id="birthday_date" name="birthday_date" required="True"/>
                </div>
            </div>

            <div>
                <div class="form_label">
                    <label for="biography">Biographie<sup>*</sup></label>
                </div>
                <div class="form_input">
                    <input type="text" placeholder="ex: Biographie" id="biography" name="biography" required="True"/>
                </div>
            </div>

            <div>
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
                            <?php }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Submit bouton -->
            <div>
                <button type="submit" id="create_producer" name="create_producer">Créer</button>
            </div>

        </form>

        <script>
function multipleSelect() {
    console.log("function multipleSelect()");

    select = document.getElementById("selectMultiple");

}
        </script>

        <?php
            if (isset($_POST['create_producer']))
            {
                extract($_POST);
                if (!empty($lastname) && !empty($firstname) && !empty($birthday_date) && !empty($biography))
                {
                    $query = $db->prepare("INSERT INTO `res.producer`(lastname, firstname, birthday_date, biography) VALUES (:lastname, :firstname, :birthday_date, :biography)");
                    $query->execute([
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'birthday_date' => $birthday_date,
                        'biography' => $biography,
                    ]);
                    unset($_POST);
                }
            }
        ?>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


