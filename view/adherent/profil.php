<form method="post" action="<?=BASE_URL?>/adherent/profil/">
<div class="back">
    <div class="container">
        <div class="col-lg-12">
            <h1>Modification du profil</h1>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Adresse mail :</label>
                <input class="effect-2" type="email" name="mail" placeholder="Mail" value="<?= Session::get("mail") ?>" />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Nom :</label>
                <input class="effect-2" type="text" name="nom" placeholder="Nom" value="<?= Session::get("nom") ?>" />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Prenom :</label>
                <input class="effect-2" type="text" name="prenom" placeholder="Prenom" value="<?= Session::get("prenom") ?>" />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Téléphone :</label>
                <input class="effect-2" type="text" name="telephone" placeholder="Téléphone" value="<?= Session::get("tel") ?>" />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Entreprise :</label>
                <input class="effect-2" type="text" name="entreprise" placeholder="Entreprise" value="<?= Session::get("entreprise") ?>" />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Fonction :</label>
                <input class="effect-2" type="text" name="fonction" placeholder="Fonction" value="<?= Session::get("fonction") ?>" />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="button">
                <button type="submit" class="raise" id='submit' value="Modifier le profil" >Modifier votre profil</button>
            </div>
            <div class="button">
                <button type="submit" class="raise" formaction="<?=BASE_URL?>" value="Annuler" >Annuler </button>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST" action="<?=BASE_URL?>/adherent/resetmpd/">
    <div class="back">
        <div class="container">
            <div class="row bg_1">
                <div class="col-3">
                    <label>Modifier son mot de passe :</label>
                    <input class="effect-2" type="text" placeholder="Nouveau mot de passe" name="newmdp" />
                    <span class="focus-border"></span>
                    <button class="fill" type="submit">Changer de mots de passe</button>
                </div>
            </div>
        </div>
    </div>
</form>




