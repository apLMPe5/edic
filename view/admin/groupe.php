<form method="post" action="<?=BASE_URL?>/admin/groupe">
    <div class="back">
        <h2>Liste des groupes</h2>
        <table class="styled-table">
            <thead>
            <tr >
                <td>Nom</td>
                <td>Code Postal</td>
                <td>Modifier</td>
                <td>Supprimer</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($groupes)){
                foreach ($groupes as $p ): ?>
                    <tr>
                        <td><?= $p->libelle?></td>
                        <td><?= $p->departement?></td>
                        <td>
                            <div class = "inscription-button">
                                <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/admin/modifGroupe/<?= $p->departement?>">Modifier</button></center>
                            </div>
                        </td>

                        <td>
                            <center><label class="switch">
                                    <input type="checkbox" name="cf[]" value="departement = <?=$p->departement?>">
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
    <button formaction="<?=BASE_URL?>/admin/creerGroupe" class="raise">Ajouter un groupe</button>
    </div>
</div>