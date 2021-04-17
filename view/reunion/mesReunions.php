<form method="post" action="<?=BASE_URL?>/admin/reunions">
    <div class = "inscription-button">
        <button type="submit" class="fill" id='submit' value="StatistiquesGlobal" formaction="<?= BASE_URL?>/reunion/mesReunionsArchive">Archivée</button>
    </div>
    <br>
    <div class="back">
        <h2>Liste des réunions</h2>
        <table class="styled-table">
            <thead>
            <tr>
                <td>Date de la réunion</td>
                <td>Organisateur</td>
                <td>Lieu</td>
                <td>Groupe</td>
                <td>Repas</td>
                <td>Participants</td>
                <td>Absents</td>
                <td>Compte-rendu</td>
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
                                <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/listeInscrits/<?= $p->id?>">Voir les inscrits</button></center>
                            </div>
                        </td>
                        <td>
                            <div class = "inscription-button">
                                <?php if($p->present == 'P'): ?>
                                    <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/excuse/<?= $p->id?>">S'excuser</button></center>
                                <?php elseif($p->present == "E"): ?>
                                    <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/annulerExcuse/<?= $p->id?>">Annuler</button></center>
                                <?php else: ?>
                                    <center><button disabled class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/annulerExcuse/<?= $p->id?>">Annuler</button></center>
                                <?php endif;?>
                            </div>
                        </td>

                        <td>
                            <div class = "inscription-button">
                                <?php if(Session::hasPermission('A')): ?>
                                    <?php if(isset($p->contrendu) && strlen($p->contrendu) > 0): ?>
                                        <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/contrenduReunion/<?= $p->id?>">Modifier le compte-rendu</button></center>
                                    <?php else: ?>
                                        <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/contrenduReunion/<?= $p->id?>">Faire le compte-rendu</button></center>
                                    <?php endif ?>
                                <?php else: ?>
                                    <?php if(isset($p->contrendu) && strlen($p->contrendu) > 0): ?>
                                        <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/contrendu/<?= $p->id?>">Afficher le compte-rendu</button></center>
                                    <?php else: ?>
                                        <center><button disabled class="fill" type="submit" formaction="<?=BASE_URL?>/reunion/contrendu/<?= $p->id?>">Afficher le compte-rendu</button></center>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;
            }
            ?>
            </tbody>
        </table>

    </div>
</form>
</div>
</div>
