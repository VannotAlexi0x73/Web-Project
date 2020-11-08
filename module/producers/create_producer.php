<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Créer un réalisateur</title>
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
                <h1><u>Réalisateur</u></h1>
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
                            <label for="image">Photo<sup>*</sup></label>
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
                            <textarea id="biography" name="biography" rows="10" placeholder="ex: Biographie..." required="True"></textarea>
                        </td>
                    </tr>

                </table>
                <!-- Submit bouton -->
                <div>
                    <button type="submit" id="create_producer" name="create_producer">Créer</button>
                </div>

            </form>
        </section>

        <?php
            if (isset($_POST['create_producer']))
            {
                extract($_POST);
                if ($lastname && $firstname && $image && $birthday_date && $biography)
                {
                    $query = $db->prepare("INSERT INTO `res.producer`(lastname, firstname, image, birthday_date, biography) VALUES (:lastname, :firstname, :image, :birthday_date, :biography)");
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
