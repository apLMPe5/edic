<div class="col-lg-12">
    <h1>Creation dun groupe</h1>
</div>
<form action="<?= BASE_URL ?>/admin/creerGroupe" method="POST">

    <div class="back">
        <div class="container">

            <div class="row bg_1">
                <div class="col-3">
                    <label>Nom du groupe :</label>
                    <input class="effect-2" type="text" name="libelle" placeholder="Nom du groupe" required />
                    <span class="focus-border"></span>
                </div>
            </div>

            <div class="row bg_1">
                <div class="col-3">
                    <label>Numéro de département du groupe :</label>
                    <input class="effect-2" type="text" placeholder="Numéro de département" name="departement" id='numdep' required />
                    <span class="focus-border"></span>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="button">
                    <button type="submit" class="raise" id='submit' >Ajouter</button>
                    <button type="reset" class="raise" id='submit' value="annuler" >Annuler</button>
                </div>
            </div>

        </div>
    </div>

</form>
