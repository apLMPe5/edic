<form method="post" action="<?=BASE_URL?>/admin/modifReunion/<?= $reunion->id ?>">
    <div class="back">
        <div class="container">
            <div class="col-lg-12">
                <h1>Modification d'une réunion</h1>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Date de la réunion :</label>
                    <input class="effect-2" type="datetime-local" placeholder="Date de la réunion" name="date" value="<?= $reunion->date ?>" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Lieu de la réunion :</label>
                    <input class="effect-2" type="text" placeholder="Lieu" name="lieu" value="<?= $reunion->lieu ?>" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Présentation d'entreprise :</label>
                    <select class="effect-2" name="organisateur" id="select-organisateur" value="<?= $reunion->organisateur ?>">
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
                    <label>Groupe :</label>
                    <?php if(isset($groupes)) : ?>
                        <?php foreach ($groupes as $g) : ?>
                            <div>
                                <input type="radio" id="groupe" name="idGroupe" value="<?= $g->departement ?>" <?php if($g->departement == $reunion->groupe) echo "checked";?>/>
                                <label><?= $g->libelle ?> (<?=$g->departement ?>)</label>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Information :</label>
                    <textarea class="effect-2" type="text" placeholder="Information" name="information" required></textarea>
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="col-lg-6">
                <br>
                <div class="button">
                    <button type="submit" class="raise" id='submit' value="Modifier reunion" >Modifier la réunion</button>
                </div>
            </div>
        </div>
    </div>
</form>