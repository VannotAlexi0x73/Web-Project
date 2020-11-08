<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Acteurs</title>
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
                <table>
                    <tr>
                        <td class="form_label">
                            <label for="lastname">Nom<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="text" id="lastname" name="lastname" placeholder="ex: SPLIELBERG" onkeyup="upperWord('lastname')" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="firstname">Prénom<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="text" id="firstname" name="firstname" placeholder="ex: Steven" required="True"/>
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
                            <label for="birthday_date">Date de naissance<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="date" id="birthday_date" name="birthday_date" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="biography">Biographie<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <textarea id="biography" name="biography" rows="10" placeholder="ex: Biographie" required="True"></textarea>
                        </td>
                    </tr>

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
                </table>
                <!-- Submit bouton -->
                <div>
                    <button type="submit" id="create_actor" name="create_actor">Créer</button>
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
            if (isset($_POST['create_actor']))
            {
                extract($_POST);
                if ($lastname && $firstname && $image && $birthday_date && $biography)
                {
                    $query = $db->prepare("INSERT INTO `res.actor`(lastname, firstname, image, birthday_date, biography) VALUES (:lastname, :firstname, :image, :birthday_date, :biography)");
                    $query->execute([
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'image' => $image,
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
