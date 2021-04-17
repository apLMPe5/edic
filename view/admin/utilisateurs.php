<?php if(isset($adherents)): ?>
<form action="<?= BASE_URL?>/admin/utilisateurs" method="POST">
    <div class="back">
        <h2>Liste des utilisateurs</h2>
        <table class="styled-table">
            <thead>
            <tr>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Entreprise</td>
                <td>Téléphone</td>
                <td>Mail</td>
                <td>Grade</td>
                <td>Date creation</td>
                <td>Activité</td>
                <td>Groupe</td>
                <td>Modifier</td>
                <td>Suprimmer</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($adherents as $f) : ?>
                <tr>
                    <td><?=$f->nom?></td>
                    <td><?=$f->prenom?></td>
                    <td><?=$f->entreprise?></td>
                    <td><?=$f->tel?></td>
                    <td><?=$f->mail?></td>
                    <td><?=$f->grade?></td>
                    <td><?=$f->dateCreation?></td>
                    <td><?=$f->fonction?></td>
                    <td><?=$f->libelle?></td>

                       <td>
                        <div class = "inscription-button">
                           <center><button type="submit" class="fill" id='submit' value="Modifier l'adhérent" formaction="<?= BASE_URL?>/admin/modifUtilisateur/<?= $f->id ?>">Modifier </button></center>
                        </div>
                    </td>
                    <td>

                        <center><label class="switch">
                            <input type="checkbox" name="cf[]" value="id = <?=$f->id?>">
                            <div>
                                <span></span>
                            </div>
                        </label></center>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <div class="button">
            <button type="submit" class="raise" id='submit' value="supprimer">Supprimer</button>
    </form>
        <button formaction="<?= BASE_URL?>/admin/creerUtilisateur" type="submit" class="raise" id='submit' value="AjoutUtilisateur">Ajouter</button>
    <?php endif ?>
</div>
</div>
