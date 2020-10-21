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

    <body style="background-image: url('../../img/alone-on-mars.jpg');">
        <header>
            <nav>
                <!-- img pour revenir sur page accueil à faire -->
                <img href ="../accueil.html "src="../../img/favicon.png" style="width: 4%;">
            </nav>
        </header>

        <div class="login-space">
            <h1 class="title">Se connecter</h1>
            <form name="sign_in" method="post">
                <div>
                    <input type="email" id="signin-username" name="login" required="True" class="form-input text-input vertical-spacing" placeholder="Email" />
                </div>
                <div>
                    <input type="password" id="signin-password" name="password" required="True" class="form-input text-input vertical-spacing" placeholder="Mot de passe" />
                </div>
                <div>
                    <a id="mdp-oublié" href="mdp_oublié">Mot de passe oublié ?</a> 
                </div>
                <div>
                    <button type="submit" id="signin-submit" name="sign_in[submit]">Se connecter</button>
                </div>
            </form>
            <p>Pas de compte ? <br><button id="sign-up"><a href="sign_up.php">Inscrivez-vous</a></button> </i></p>
        </div>

    </body>

</html>


