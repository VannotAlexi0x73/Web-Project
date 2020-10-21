<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - Acteurs</title>
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
        <div class="list_items">
            <?php
                $query = $db->query("SELECT lastname, firstname, birthday_date, biography from `res.actor`");
                while ($actor = $query->fetch())
                { ?>
                    <div class="item">
                        <div><?php echo $actor['lastname']; ?></div>
                        <div><?php echo $actor['firstname']; ?></div>
                        <div><?php echo $actor['birthday_date']; ?></div>
                        <div><?php echo $actor['biography']; ?></div>
                        <div><i class="fas fa-edit"></i></div>
                        <div><i class="fas fa-trash-alt"></i></div>
                    </div>
                <?php }
            ?>
        </div>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


