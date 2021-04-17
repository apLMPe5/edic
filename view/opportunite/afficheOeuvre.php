<form action="<?= BASE_URL ?>/opportunite/afficheOeuvre/<?=$maitre->id?>" method="POST">
    <div class="back">
        <div class="container">
            <div class="col-lg-12">
                <h1>Modification du maître d'oeuvre</h1>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Nom :</label>
                    <input class="effect-2" type="text" placeholder="Nom" name="nom" value="<?= $maitre->nom ?>" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Prénom :</label>
                    <input class="effect-2" type="text" placeholder="Prénom" name="prenom" value="<?= $maitre->prenom ?>" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Adress mail :</label>
                    <input class="effect-2" type="text" placeholder="Mail" name="mail" value="<?= $maitre->mail ?>" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Téléphone :</label>
                    <input class="effect-2" type="text" placeholder="Téléphone" name="telephone" value="<?= $maitre->telephone ?>" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="col-lg-6">
                <br>
                <div class="button">
                    <button type="submit" class="raise" id='submit' value="Soumettre l'activité" >Valider</button>
                </div>
            </div>
        </div>
    </div>
</form>