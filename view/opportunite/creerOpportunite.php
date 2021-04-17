<form action="<?= BASE_URL ?>/opportunite/creerOpportunite" method="POST">
    <div class="back">
        <div class="container">

            <h1>Création d'une opportunité</h1>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Nom du projet :</label>
                    <input class="effect-2" type="text" name="information" placeholder="Nom du projet" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Statut de l'opportunité :</label>
                    <select class="effect-2" placeholder="statut" name="status" required>
                        <option value="Détectée">Détectée</option>
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
                    <input class="effect-2" type="text" name="adresse" placeholder="Adresse" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Ville :</label>
                    <input class="effect-2" type="text" name="ville" placeholder="Ville" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Code postal :</label>
                    <input class="effect-2" type="text" name="cp" placeholder="Code postal" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Date limite de réponse :</label>
                    <input class="effect-2" type="date" name="dateLimite" placeholder="Date limite"/>
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Commentaire :</label>
                    <textarea class="effect-2" type="text" placeholder="Commentaire" name="commentaire" ></textarea>
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="button">
                <button type="submit" class="raise" id='submit' >Ajouter</button>
                <button type="reset" class="raise" id='submit' value="annuler" >Annuler</button>
            </div>
        </div>
    </div>
</form>