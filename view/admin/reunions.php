<form method="post" action="<?=BASE_URL?>/admin/reunions">
    <div class="back">
        <h2>Liste des réunions</h2>
        <table class="styled-table">
            <thead>
            <tr>
                <td>Date de la réunion</td>
                <td>Presentation entreprise</td>
                <td>Lieu</td>
                <td>Groupe</td>
                <td>Repas</td>
                <td>Participants</td>
                <td>Modifier</td>
                <td>Supprimer</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($reunions)){
                foreach ($reunions as $p ): ?>
                    <tr>
                        <td><?= $p->date?></td>
                        <td><?= $p->organisateur?></td>
                        <td><?= $p->lieu?></td>
                        <td><?= $p->groupe ?></td>
                        <td><?php echo $p->repas == 1 ? "Oui" : "Non";?></td>
                        <td>
                            <div class = "inscription-button">
                                <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/admin/listeInscrits/<?= $p->id?>">Voir les inscrits</button></center>
                            </div>
                        </td>
                        <td>
                            <div class = "inscription-button">
                                <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/admin/modifReunion/<?= $p->id?>">Modifier</button></center>
                            </div>
                        </td>

                        <td>
                            <center><label class="switch">
                                    <input type="checkbox" name="cf[]" value="id = <?=$p->id?>">
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
        <div class="button">
        <button type="submit" class="raise">Supprimer</button>
    </form>
    <button formaction="<?=BASE_URL?>/admin/creerReunion" class="raise">Ajouter une reunion</button>
</div>
</div>