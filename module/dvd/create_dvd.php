<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <link rel="icon" type="image/png" href="img/favicon1.png">
        <link rel="stylesheet" href="../../css/base.css" type="text/css">
        <link rel="stylesheet" href="../../css/header.css" type="text/css">
        <link rel="stylesheet" href="../../css/footer.css" type="text/css">
        <link rel="stylesheet" href="../../css/carousel.css" type="text/css">
        <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">

    </head>

    <body>
        <!-- Include header -->
        <?php include "../../module/base/header.php"; ?>

        <form>
            <div>
                <label for="title" style="text-align: right;">Nom<sup>*</sup></label>
                <div>
                    <input type="text" placeholder="ex: Avengers endgame" id="title" name="title" required="True"/>
                </div>
            </div>

            <div>
                <label for="imdb" style="text-align: right;">IMDB<sup>*</sup></label>
                <div>
                    <input type="text" placeholder="ex: Avengers endgame" id="imdb" name="imdb" required="True"/>
                </div>
            </div>

            <div>
                <label for="description" style="text-align: right;">Description<sup>*</sup></label>
                <div>
                    <input type="text" placeholder="ex: Avengers endgame" id="description" name="description" required="True"/>
                </div>
            </div>

            <div>
                <label for="release_date" style="text-align: right;">Date de sortie<sup>*</sup></label>
                <div>
                    <input type="text" placeholder="ex: Avengers endgame" id="release_date" name="release_date" required="True"/>
                </div>
            </div>

            <div>
                <label for="lastname" style="text-align: right;">Tags<sup>*</sup></label>
                <div>
                    <input type="" placeholder="ex: Avengers endgame" id="name" name="name" required="True"/>
                </div>
            </div>

            <!-- Submit bouton -->
            <div class="form-group row">
                <div class="col text-center">
                    <button type="submit" id="create_person" name="create_person" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>

        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


