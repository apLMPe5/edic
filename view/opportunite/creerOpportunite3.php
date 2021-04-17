<form method="POST" action="<?= BASE_URL ?>/opportunite/creerOpportunite3/<?= $id ?>">
<div class="row bg_1">
    <div class="col-3">
        <label>Choisir un maître d'oeuvre déjà connu</label>
        <select type="input" class="effect-2" placeholder="Nom du maître d'oeuvre" name="selectMOuvrage">
            <?php
            foreach ($maitriseOeuvres as $m) : ?>
                <option value="<?= $m->id ?>"><?= $m->nom ?></option>
            <?php endforeach;?> }
        </select>
        <span class="focus-border"></span>
    </div>
</div>
    <div class="button">
        <button type="submit" class="raise" id='submit' >Associer un maître d'oeuvre déjà connu</button>
    </div>
</form>

<form action="<?= BASE_URL ?>/opportunite/creerOpportunite3/<?= $id ?>" method="POST">
    <div class="back">
        <div class="container">

            <h1>Créer un nouveau maitre d'oeuvre</h1>



            <div class="row bg_1">
                <div class="col-3">
                    <label>Nom maître d'oeuvre :</label>
                    <input class="effect-2" type="text" placeholder="Nom maître oeuvre" name="nomMOeuvre" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Prénom maître d'oeuvre :</label>
                    <input class="effect-2" type="text" placeholder="Prenom maître oeuvre" name="prenomMOeuvre" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Email maître d'oeuvre :</label>
                    <input class="effect-2" type="text" placeholder="Email maître oeuvre" name="emailMOeuvre" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Téléphone maître d'oeuvre :</label>
                    <input class="effect-2" type="text" placeholder="Téléphone maître oeuvre" name="telMOeuvre" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="button">
                <button type="submit" class="raise" id='submit' >Ajouter le nouveau maître d'oeuvre</button>
                <button type="reset" class="raise" id='submit' value="annuler" >Annuler</button>
            </div>
        </div>
    </div>
</form>