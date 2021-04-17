<form action="<?= BASE_URL ?>/admin/modifGroupe/<?=$groupe->departement?>" method="POST">
    <div class="back">
    <div class="container">
        <div class="col-lg-12">
            <h1>Paramétrage d'un groupe</h1>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Nom du groupe :</label>
                <input class="effect-2" type="text" placeholder="Nom du groupe" name="libelle" value="<?= $groupe->libelle ?>" required />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="row bg_1">
            <div class="col-3">
                <label>Numéro de département :</label>
                <input class="effect-2" type="text" name="departement"  value="<?= $groupe->departement?>" disabled />
                <span class="focus-border"></span>
            </div>
        </div>

        <div class="col-lg-6">
            <br>
            <div class="button">
                <button type="submit" class="raise" id='submit' value="Soumettre l'activité" >Modifier</button>
            </div>
        </div>
    </div>
    </div>
</form>