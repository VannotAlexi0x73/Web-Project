<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Nous contacter</title>
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

        <section>
            <form method="post" class="form_create">
                <table>
                    <tr>
                        <td class="form_label">
                            <label for="name">Nom<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="text" placeholder="ex: SPLIELBERG" id="name" name="name" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="email">E-mail<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <input type="email" placeholder="ex: abc@example.fr" id="email" name="email" required="True"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="form_label">
                            <label for="message">Message<sup>*</sup></label>
                        </td>
                        <td class="form_input">
                            <textarea id="message" name="message" placeholder="ex: Votre message" rows="10" required="True"></textarea>
                        </td>
                    </tr>

                </table>
                <!-- Submit bouton -->
                <div>
                    <button type="submit" id="create_contact" name="create_contact">Envoyer votre demande</button>
                </div>

            </form>
        </section>

        <?php
            if (isset($_POST['create_contact']))
            {
                extract($_POST);
                if ($name && $email && $message)
                {
                    $query = $db->prepare("INSERT INTO `contact.us`(name, email, message) VALUES (:name, :email, :message)");
                    $query->execute([
                        'name' => $name,
                        'email' => $email,
                        'message' => $message,
                    ]);
                    unset($_POST);
                }
            }
        ?>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>
