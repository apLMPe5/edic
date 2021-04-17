<form method="post" action="<?=BASE_URL?>/admin/deleteMembreReunion/<?=$reunion->id?>">
    <div class="back">
        <h2>Listes des inscrits pour la réunion</h2>
        <table class="styled-table">
            <thead>
            <tr>
                <td>Id</td>
                <td>Mail</td>
                <td>Mot de passe</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Téléphone</td>
                <td>Grade</td>
                <td>Entreprise</td>
                <td>Fonction</td>
                <td>Groupe</td>
                <td>Désinscrire de la réunion</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($inscrits)){
                foreach ($inscrits as $i ): ?>
                    <tr>
                        <td><?= $i->id?></td>
                        <td><?= $i->mail?></td>
                        <td><?= $i->mdp?></td>
                        <td><?= $i->nom?></td>
                        <td><?= $i->prenom?></td>
                        <td><?= $i->tel?></td>
                        <td><?= $i->grade?></td>
                        <td><?= $i->entreprise?></td>
                        <td><?= $i->fonction?></td>
                        <td><?= $i->groupe?></td>
                        <td>
                            <center><label class="switch">
                                    <input type="checkbox" name="cf[]" value="idUtilisateur = <?=$i->id?> AND idReunion = <?= $reunion->id ?>">
                                    <div>
                                        <span></span>
                                    </div>
                                </label></center>
                        </td>
                    </tr>
                <?php endforeach;
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="button">
        <button type="submit" class="raise">Retirer de la reunion</button>
    </div>

</form>

<form method="post" action="<?=BASE_URL?>/admin/ajouterMembreReunion/<?= $reunion->id ?>">
    <div class="back">
        <h2>Listes des utilisateurs pouvant être inscrits a la reunion</h2>
        <table class="styled-table">
            <thead>
            <tr>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Entreprise</td>
                <td>Fonction</td>
                <td>Groupe</td>
                <td>Inscrire à la réunion</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($potentials)){
                foreach ($potentials as $i ): ?>
                    <tr>
                        <td><?= $i->nom?></td>
                        <td><?= $i->prenom?></td>
                        <td><?= $i->entreprise?></td>
                        <td><?= $i->fonction?></td>
                        <td><?= $i->groupe?></td>
                        <td>
                            <center><label class="switch">
                                    <input type="checkbox" name="cf[]" value="<?=$i->id?>,<?=$reunion->id?>">
                                    <div>
                                        <span></span>
                                    </div>
                                </label></center>
                        </td>
                    </tr>
                <?php endforeach;
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="button">
        <button type="submit" class="raise">Ajouter a la reunion</button>
    </div>
</form>
