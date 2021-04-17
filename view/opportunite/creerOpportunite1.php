<form action="<?= BASE_URL ?>/opportunite/creerOpportunite" method="POST">
    <div class="back">
        <div class="container">


            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Nom du projet" name="projet" required />
                <label for="name" class="form__label">Nom du projet :</label>
            </div>

            <div class="form__group field">
                <textarea class="form__field" placeholder="Information" name="information" required></textarea>
                <label for="name" class="form__label">Informations générales :</label>
            </div>

            <div class="form__group field">
                <select class="form__field" placeholder="statut" name="status" required>
                     <option value="Détectée">Détectée</option>
                        <option value="Consultation en cours">Consultation en cours</option>
                        <option value="Chantier en cours">Chantier en cours</option>
                        <option value="Projet terminé">Projet terminé</option>
                </select>
                <label for="name" class="form__label">Statut :</label>
            </div>

            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Adresse" name="adresse" required /ired />
                <label for="name" class="form__label">Adresse</label>
            </div>

            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Ville" name="ville" required />
                <label for="name" class="form__label">Ville :</label>
            </div>

            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Code postal" name="cp" required />
                <label for="name" class="form__label">Code postal :</label>
            </div>

            <div class="form__group field">
                <input type="date" class="form__field" placeholder="Date limite" name="dateLimite" required />
                <label for="name" class="form__label">Date limite :</label>
            </div>

            <div class="form__group field">
                <textarea type="text" class="form__field" placeholder="Commentaire" name="commentaire" required></textarea>
                <label for="name" class="form__label">Commentaire :</label>
            </div>

            <div class="button">
                <button type="submit" class="raise" id='submit' >Ajouter</button>
                <button type="reset" class="raise" id='submit' value="annuler" >Annuler</button>
            </div>
        </div>
    </div>
</form>