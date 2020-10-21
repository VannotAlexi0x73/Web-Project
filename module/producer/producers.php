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

        <?php
            $query = $db->query("SELECT lastname, firstname, birthday_date, biography from `res.actor`");
            while ($producer = $query->fetch())
            { ?>
                <div>
                    <div><?php echo $producer['lastname']; ?></div>
                    <div><?php echo $producer['firstname']; ?></div>
                    <div><?php echo $producer['birthday_date']; ?></div>
                    <div><?php echo $producer['biography']; ?></div>
                    <div><i class="fas fa-edit"></i></div>
                    <div><i class="fas fa-trash-alt"></i></div>
                </div>
            <?php }
        ?>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


