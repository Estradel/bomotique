<?php
ob_start();
require 'Vue/modalAlert.php';
?>
<script type="text/javascript">
    $('#titrePage').text("Bomotique - Connexion Administration")
    $('#titreContenu').text("Connexion Administration")

    var contenuNavbar=$(`
    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" href="index.php?action=pageConnexion">Connexion Utilisateur</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="index.php?action=pageConnexionAdmin">Connexion Administration</a>
    </li>
    </ul>`);
    $('#nav-content').html(contenuNavbar);

    var lstUtilisateur;
</script>

<div>
    <form method="post" action="index.php" autocomplete="off">
        <fieldset class="form-group">
            <label for="pseudo">Nom d'utilisateur :</label><br>
            <!-- <input type="text" name="pseudo" id="pseudo" value="<?php //echo $pseudo ?>" placeholder="Ex: DupontD"/> -->
            <div>
              <?php
              $listeUtilisateur = getUtilisateurs();
              ?>
              <script type="text/javascript">
              //Charge la liste des élèves de la classe dans une variable JS
              lstUtilisateur = <?php echo json_encode($listeUtilisateur); ?>;
              </script>
              <select id="pseudo" name="pseudo" class="custom-select">
                <option disabled value selected> -- Sélectionnez un utilisateur -- </option>
                <?php
                foreach ($listeUtilisateur as $objUtil) {
                  $nomUtil = $objUtil->nomUtilisateur;
                  $idUtil = $objUtil->numero;
                  //var_dump($objUtil);
                  echo '<option value="' . $idUtil . '" '.( $pseudo == $idUtil ? "selected " : "").'>' . $nomUtil . '</option> ';
                }
                ?>
              </select>

            </div>
        </fieldset>

        <fieldset class="form-group">
            <label for="pass">Mot de passe :</label><br>
            <input type="password" name="pass" id="pass" placeholder="******" />
        </fieldset>

        <fieldset class="form-group">
            <!-- Captcha Google -->
            <div class="g-recaptcha" data-sitekey="6Le3mjkUAAAAAO8iqeRGS4LUlAGgSlhBJ574ZdPi"></div>
        </fieldset>

            <input type="hidden" name="action" id="action" value="connexionAdmin">
            <input type='submit' name="envoyer" id="envoyer" value="Se connecter" class="btn btn-primary" />

    </form>

    <a href="index.php?action=pageConnexion">Page Connexion Utilisateur</a>

</div>
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
