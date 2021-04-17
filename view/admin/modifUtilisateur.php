

<form method="post" action="<?=BASE_URL?>/admin/modifUtilisateur/<?= $utilisateur->id ?>">
    <div class="back">
     <div class="container">
        <div class="col-lg-12">
            <h1>Modification du profil</h1>
        </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Adresse mail :</label>
                 <input class="effect-2" type="email" name="mail" placeholder="Mail" value="<?= $utilisateur->mail ?>" />
                 <span class="focus-border"></span>
             </div>
         </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Nom :</label>
                 <input class="effect-2" type="text" name="nom" placeholder="Nom" value="<?= $utilisateur->nom ?>" />
                 <span class="focus-border"></span>
             </div>
         </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Prénom :</label>
                 <input class="effect-2" type="text" name="prenom" placeholder="Prénom" value="<?= $utilisateur->prenom ?>" />
                 <span class="focus-border"></span>
             </div>
         </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Téléphone :</label>
                 <input class="effect-2" type="text" name="tel" placeholder="Téléphone" value="<?= $utilisateur->tel ?>" />
                 <span class="focus-border"></span>
             </div>
         </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Entreprise :</label>
                 <input class="effect-2" type="text" name="entreprise" placeholder="Téléphone" value="<?= $utilisateur->entreprise ?>" />
                 <span class="focus-border"></span>
             </div>
         </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Activité :</label>
                 <input class="effect-2" type="text" name="fonction" placeholder="Téléphone" value="<?= $utilisateur->fonction ?>" />
                 <span class="focus-border"></span>
             </div>
         </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Statut :</label>
                 <div>
                     <input type="radio" id="grade" name="grade" value="A" <?php echo ($utilisateur->grade == 'A') ? "checked" : ""; ?> />
                     <label for="masculin">Administateur</label>
                 </div>
                 <span class="focus-border"></span>
                 <div>
                     <input type="radio" id="grade" name="grade" value="A" <?php echo ($utilisateur->grade == 'M') ? "checked" : ""; ?> />
                     <label for="masculin">Membre</label>
                 </div>
             </div>
         </div>

         <div class="row bg_1">
             <div class="col-3">
                 <label>Groupe :</label>
                 <?php if(isset($groupes)) : ?>
                     <?php foreach ($groupes as $g) : ?>
                         <div>
                             <input type="radio" id="groupe" name="groupe" value="<?= $g->departement?>" <?php echo ($utilisateur->groupe == $g->departement) ? "checked" : ""; ?> />
                             <label><?= $g->libelle ?> (<?=$g->departement ?>)</label>
                         </div>
                     <?php endforeach; ?>
                 <?php endif; ?>
                 <span class="focus-border"></span>
             </div>
         </div>


        <div class="col-lg-6">
            <br>
            <div class ="button">
                <button type="submit" class="raise" id='submit'>Modifier le profil</button>
             </div>
            <div class = "button">
                <button type="submit" class="raise" formaction="<?=BASE_URL?>" value="Annuler" >Annuler </button>
            </div>
        </div>
    </div>
    </div>
</form>

        <div class="col-lg-12">
            <div class="form__group field button">
                <button type="submit" class="fill" formaction="<?=BASE_URL?>/adherent/changepass">Réinitialiser </button>
                <label for="text" class="form__label" class="reinitpassword">Réinitialisation du mots de passe :</label>
            </div>
        </div>


