<form action="<?= BASE_URL ?>/opportunite/modifOpportunite/<?=$opportunite->idOpportunite?>" method="POST">
    <div class="back">
        <div class="container">
            <div class="col-lg-12">
                <h1>Modification d'une opportunité</h1>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Désignation de l'opportunité :</label>
                    <input class="effect-2" type="input" placeholder="Désignation" name="information" value="<?= $opportunite->information ?>" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Statut de l'opportunité :</label>
                    <select type="text" class="effect-2"  name="status" value="<?= $opportunite->status ?>">
                        <option value="Détéctée">Détéctée</option>
                        <option value="Consultation en cours">Consultation en cours</option>
                        <option value="Chantier en cours">Chantier en cours</option>
                        <option value="Projet terminé">Projet terminé</option>
                    </select>
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Adresse :</label>
                    <input class="effect-2" type="text" placeholder="Adresse" name="adresse" value="<?= $opportunite->adresse ?>" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Ville :</label>
                    <input class="effect-2" type="text" placeholder="Ville" name="ville" value="<?= $opportunite->ville ?>" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Code postal :</label>
                    <input class="effect-2" type="text" placeholder="Code postal" name="cp" value="<?= $opportunite->cp ?>" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Date limite de réponse :</label>
                    <input class="effect-2" type="date" name="dateLimite" placeholder="Date limite" value="<?= $opportunite->dateLimit ?>" />
                    <span class="focus-border"></span>
                </div>
            </div>

             <div class="row bg_1">
                <div class="col-3">
                    <label>Commentaire :</label>
                    <input class="effect-2" type="input" placeholder="Commentaire" name="commentaire" value="<?= $opportunite->commentaire ?>" />
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