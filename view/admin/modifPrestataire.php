<form method="post" action="<?=BASE_URL?>/Admin/modifPrestataire/<?= $prestataire->ID ?>">
    <div class="col-lg-12">
        <h1>modification d'un prestataire</h1>
    </div>

    <div class="col-lg-6">
        <div class="form__group field">
            <input type="input" class="form__field" value="<?= $prestataire->NOM ?>" name="nom" id='nom' required />
            <label for="text" class="form__label">Nom du prestataire:</label>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form__group field">
            <input type="input" class="form__field" value="<?= $prestataire->MAIL ?>" name="mail" id='mail' required />
            <label for="text" class="form__label">Adresse email :</label>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form__group field">
            <input type="input" class="form__field" value="<?= $prestataire->TEL ?>" name="tel" id='tel' required />
            <label for="text" class="form__label">Téléphone :</label>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form__group field">
            <input type="input" class="form__field" value="<?= $prestataire->ADRESSE ?>" name="adresse" id='adresse' required />
            <label for="text" class="form__label">Adresse :</label>
        </d</div>
    </div>

    <div class="col-lg-6">
        <div class="form__group field">
            <input type="input" class="form__field" value="<?= $prestataire->CP ?>" name="cp" id='cp' required />
            <label for="text" class="form__label">Code postal :</label>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form__group field">
            <input type="input" class="form__field" value="<?= $prestataire->VILLE ?>" name="ville" id='ville' required />
            <label for="text" class="form__label">Ville :</label>
        </div>
    </div>

    <div class="col-lg-6">
        <br>
        <div class = "inscription-button">
            <button type="submit" class="btn draw-border" id='submit' value="modifier le préstataire" >Modifier le prestataire </button>
        </div>
    </div>

</form>
</div>