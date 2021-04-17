<form action="<?= BASE_URL ?>/opportunite/creerOpportunite2/<?= $id ?>" method="POST">
    <div class="row bg_1">
        <div class="col-3">
            <label>Choisir un maître d'ouvrage déjà connu :<?= $id ?></label>
            <select class="effect-2" placeholder="Nom du maître d'ouvrage" name="selectMOuvrage">
                <?php
                foreach ($maitreOuvrages as $m) : ?>
                    <option value="<?=$m->id?>"><?= $m->nom ?></option>
                <?php endforeach;?> }
            </select>
            <span class="focus-border"></span>
        </div>
    </div>
    <div class="button">
        <button type="submit" class="raise" id="subList" name="subList">Associer le maître d'ouvrage</button>
    </div>
</form>

<form action="<?= BASE_URL ?>/opportunite/creerOpportunite2/<?= $id ?>" method="POST">
    <div class="back">
        <div class="container">

            <h1>Créer un nouveau maître d'ouvrage<?= $id ?></h1>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Nom du maître d'ouvrage :</label>
                    <input class="effect-2" type="text" placeholder="Nom du maître d'ouvrage" name="nomMOuvrage" required/>
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Prénom du maître d'ouvrage :</label>
                    <input class="effect-2" type="text" placeholder="Prénom du maître d'ouvrage" name="prenomMOuvrage" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Adresse mail du maître d'ouvrage :</label>
                    <input class="effect-2" type="text" placeholder="Email du maître d'ouvrage" name="emailMOuvrage" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Téléphone du maître d'ouvrage :</label>
                    <input class="effect-2" type="text" placeholder="Téléphone du maître d'ouvrage" name="telMOuvrage" />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="button">
                <button type="submit" class="raise" id="subForm" name="subForm">Ajouter le nouveau maître d'ouvrage</button>
                <button type="reset" class="raise" id="resubmit" value="annuler" >Annuler</button>
            </div>
        </div>
    </div>
</form>