<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav>
        <div>
            <a href="/accueil.php">
                <img src="../../img/favicon.png">
            </a>
        </div>
        <div>
            <!-- <div>
                <i class="fas fa-bars"></i>
            </div> -->
            <div class="boutton_menu" onclick="window.location='/module/cinemas/cinemas.php';">Cinéma</div>
        </div>
        <div>
            <div class="boutton_menu" onclick="window.location='/module/series/series.php';">Séries</div>
        </div>
        <div>
            <div class="boutton_menu" onclick="window.location='/module/dvd/dvd.php';">DVD</div>
        </div>
        <div>
            <div class="boutton_menu" onclick="window.location='/module/actors/actors.php';">Acteurs</div>
        </div>
        <div>
            <div class="boutton_menu" onclick="window.location='/module/producers/producers.php';">Réalisateurs</div>
        </div>
        <div class="button_login">
            <?php if (!isset($_SESSION['auth'])): ?>
                <div class="button_sign_in">
                    <a onclick="window.location='/module/login/sign_in.php';">Se connecter</a>
                </div>
                <div>
                    <a class="button_sign_up" onclick="window.location='/module/login/sign_up.php';">Créer un compte</a>
                </div>
            <?php else: ?>
                <div>
                    <a class="button_logout" onclick="window.location='/module/login/logout.php';">Se déconnecter</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>
