<!DOCTYPE html>

<html>
    <!--  -->
    <head>
        <title>Cin3-iL - Se connecter</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <?php include "../../module/base/link.php"; ?>

    </head>

    <body class="login_body">

        <!-- Include db -->
        <?php
            include '../../includes/database.php';
            global $db;
        ?>

        <!-- HEADER -->
        <header>
            <nav>
                <a href="/accueil.php">
                    <img src="../../img/favicon.png">
                </a>
            </nav>
        </header>

        <!-- DIV LOGIN -->
        <div class="div_login">
            <h1>Se connecter</h1>
            <form class="form_login" method="post">
                <div>
                    <label for="login">Identifiant<sup>*</sup></label>
                    <input type="email" id="login" name="login" placeholder="abc@example.uk" required="True"/>
                </div>
                <div>
                    <label for="password">Mot de passe<sup>*</sup></label>
                    <input type="password" id="password" name="password" placeholder="*******" required="True"/>
                </div>
                <button type="submit" id="sign_in" name="sign_in" class="login_submit">Se connecter</button>
            </form>
            <div>
                Pas de compte ?<a href="sign_up.php">Inscrivez-vous</a>
            </div>
        </div>

        <?php
            if (isset($_POST['sign_in']))
            {
                extract($_POST);
                if ($login && $password)
                {
                    $user = $db->query("SELECT * from `res.user` WHERE login='$login' AND password='$password' LIMIT 1");
                    if ($user) {
                        session_start();
                        $user = $user->fetch();
                        $_SESSION['auth'] = $user;
                        $_SESSION['flash']['danger'] = "Vous êtes maintenant connecté.";
                        header('Location: ../../accueil.php');
                        exit();
                    } else {
                        $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect.";
                    }
                    unset($_POST);
                }
            }
        ?>

    </body>

</html>


