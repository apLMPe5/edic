<form method="post" action="<?=BASE_URL?>/admin/creerUtilisateur">
    <div class="back">
        <div class="container">
            <div class="col-lg-12">
                <h1>Creation d'un nouveau compte utilisateur</h1>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Adresse mail :</label>
                    <input class="effect-2" name="mail" type="email" placeholder="Mail" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Nom :</label>
                    <input class="effect-2" type="text" name="nom" placeholder="Nom" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Prénom :</label>
                    <input class="effect-2" type="text" name="prenom" placeholder="Prénom" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Téléphone :</label>
                    <input class="effect-2" type="text" name="telephone" placeholder="Téléphone" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Entreprise :</label>
                    <input class="effect-2" type="text" name="entreprise" placeholder="Entreprise" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Activité :</label>
                    <input class="effect-2" type="text" name="activite" placeholder="Actvité" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Fonction :</label>
                    <input class="effect-2" type="text" name="fonction" placeholder="Fonction" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Grade :</label>
                    <div>
                        <input type="radio" name="grade" value="A" checked />
                        <label>Administrateur</label>
                    </div>
                    <span class="focus-border"></span>
                    <div>
                        <input type="radio" name="grade" value="M" checked />
                        <label>Membre</label>
                    </div>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Groupe :</label>
                    <?php if(isset($groupes)) : ?>
                        <?php foreach ($groupes as $g) : ?>
                            <div>
                                <input type="radio" id="groupe" name="idGroupe" value="<?= $g->departement?>" />
                                <label><?= $g->libelle ?> (<?=$g->departement ?>)</label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="col-lg-6">
                <br>
                <div class="button">
                    <button type="submit" class="raise" id='submit' value="Soumettre l'activité" >Créer </button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>