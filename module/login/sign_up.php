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

    <body class="login_body">
        <header>
            <nav>
                <a href="/accueil.php">
                    <img src="../../img/favicon.png">
                </a>
            </nav>
        </header>

        <script>
            function checkPassword() {
                // On recupère les elements utiles
                var pwd = document.getElementById("password");
                var pwd2 = document.getElementById("password2");
                var submit = document.getElementById("sign_up");

                // Traitement
                if (pwd.value && pwd2.value) {
                    if (pwd.value == pwd2.value) {
                        submit.disabled = false;
                        submit.style.cursor = "pointer";
                        // On remet en place de hover
                        submit.style.backgroundColor = "#ff6e40";
                        submit.onmouseenter = function() {
                            this.style.backgroundColor = "#fa4911";
                        }
                        submit.onmouseout = function() {
                            this.style.backgroundColor = "#ff6e40";
                        }
                        pwd2.style.background = "#a1d66b";
                    } else {
                        submit.disabled = true;
                        submit.style.cursor = "default";
                        submit.style.backgroundColor = "#ff9370";
                        pwd2.style.background = "#e84848";
                    }
                }
            }
        </script>

        <!-- DIV LOGIN -->
        <div class="div_login">
            <h1>S'inscrire</h1>
            <form class="form_login" method="post">
                <div>
                    <label for="login">Identifiant<sup>*</sup></label>
                    <input type="email" id="login" name="login" placeholder="abc@example.uk" required="True"/>
                </div>
                <div>
                    <label for="pseudo">Pseudo<sup>*</sup></label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="Pseudonyme" required="True"/>
                </div>
                <div>
                    <label for="password">Mot de passe<sup>*</sup></label>
                    <input type="password" id="password" name="password" placeholder="*******" onfocusout="checkPassword()" required="True"/>
                </div>
                <div>
                    <label for="password2">Confirmation<sup>*</sup></label>
                    <input type="password" id="password2" name="password2" placeholder="*******" onfocusout="checkPassword()" required="True"/>
                </div>
                <button type="submit" id="sign_up" name="sign_up" class="login_submit">S'inscire</button>
            </form>
            <div>
                Déjà un compte ?<a href="sign_in.php">Se connnecter</a>
            </div>
        </div>

        <?php
            if (isset($_POST['sign_up']))
            {
                extract($_POST);
                if ($login && $pseudo && $password)
                {
                    $query = $db->prepare("INSERT INTO `res.user`(login, pseudo, password) VALUES (:login, :pseudo, :password)");
                    $query->execute([
                        'login' => $login,
                        'pseudo' => $pseudo,
                        'password' => $password,
                    ]);
                    unset($_POST);
                }
            }
        ?>

    </body>

</html>
