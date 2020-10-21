<!DOCTYPE html>

<html>
    <!--  -->
    <head>
        <title>Cin3-iL - S'inscrire</title>
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

        <div class="register-space">
            <h1 class="title">S'inscrire</h1>
            <form name="sign_up" method="post">
                <div>
                    <input type="email" id="signup-username" name="login" class="form-input text-input vertical-spacing" placeholder="abc@example.uk" required="True"/>
                </div>
                <div>
                    <input type="password" id="signup-password" name="password1" class="form-input text-input vertical-spacing" placeholder="********" required="True"/>
                </div>
                <div>
                    <input type="password" id="signup-password" name="password2" class="form-input text-input vertical-spacing" placeholder="********" required="True"/>
                </div>
                <div>
                    <button type="submit" id="signup-submit" name="sign_up[submit]">S'inscrire</button>
                </div>

            </form>
            <p>Déjà un compte ? <br><button id="sign-in"><a href="sign_in.html">Connectez-vous</a></button> </i></p>
        </div>

    </body>

</html>
