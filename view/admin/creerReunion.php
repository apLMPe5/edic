
<form action="<?= BASE_URL ?>/admin/creerReunion" method="POST">

    <div class="back">

    <div class="container">

        <div class="col-lg-12">
            <h1>Creation d'une reunion</h1>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>date et heure de la reunion :</label>
                <input class="effect-2" type="datetime-local" placeholder="Date de la reunion" name="date" required />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Présentation d'entreprise :</label>
                <select class="effect-2" name="organisateur" id="select-organisateur">
                    <?php if(isset($organisateurs)) : ?>
                        <?php foreach ($organisateurs as $g) : ?>
                            <div>
                                <option value="<?= $g->id?>"><?= $g->prenom ?> <?=$g->nom ?></option>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Lieu de la réunion :</label>
                <input class="effect-2" type="text" placeholder="Lieu" name="lieu" required />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Groupe :</label>
                <?php if(isset($groupes)) : ?>
                    <?php foreach ($groupes as $g) : ?>
                        <div>
                            <input type="radio" id="groupe" name="groupe" value="<?= $g->departement?>">
                            <label><?= $g->libelle ?> (<?=$g->departement ?>)</label>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Repas après réunion :</label>
                <label class="switch">
                    <input type="checkbox" name="cf[]">
                    <div>
                        <span></span>
                    </div>
                </label>
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="col-lg-6">
            <div class = " button inscription-button">
                <button type="submit" class="raise" id='submit' >Ajouter</button>
                <button type="reset" class="raise" id='submit' value="annuler" >Annuler</button>
            </div>
        </div>
    </div>
    </div>

</form>
