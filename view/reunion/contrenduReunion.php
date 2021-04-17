<form method="post" action="<?=BASE_URL?>/reunion/contrenduReunion/<?=$reunion->id?>">
    <div class="back">
        <h2>Liste des membres pour cette réunion</h2>
        <table class="styled-table">
            <tr>
                <thead>
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Entreprise</td>
                    <td>Presence</td>
                    <td>Etait absent</td>
                </thead>
            </tr>
            <tbody>
            <?php
            if(isset($utilisateurs)){
                foreach ($utilisateurs as $p): ?>
                    <tr>
                        <td><?= $p->nom?></td>
                        <td><?= $p->prenom?></td>
                        <td><?= $p->entreprise?></td>
                        <td><?= $p->present?></td>
                        <td><center><label class="switch">
                                    <input <?php if($p->present == 'A') echo"checked"; ?> type="checkbox" name="cf[]" value="<?=$p->id?>,<?= $reunion->id ?>">
                                    <div>
                                        <span></span>
                                    </div>
                                </label></center></td>
                    </tr>
                <?php endforeach;
            }
            ?>
            </tbody>
        </table>

        <h2>Saisir le compte rendu</h2>
        <table class="styled-table">
            <tr>
                <thead>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Commentaire</td>
                <td>Qui souhaitez vous inviter ?</td>
                </thead>
            </tr>
            <tbody>
            <?php
            if(isset($utilisateurs)){
                foreach ($utilisateurs as $p): ?>
                    <tr>
                        <td><?= $p->nom?></td>
                        <td><?= $p->prenom?></td>
                        <td>
                            <textarea class="effect-2" type="text" placeholder="Commentaire" name="commentaire"></textarea>
                        </td>
                        <td>
                            <textarea class="effect-2" type="text" placeholder="Invité" name="invite"></textarea>
                        </td>
                    </tr>
                <?php endforeach;
            }
            ?>
            </tbody>
        </table>

        <h2>Dej'EDIC</h2>
        <table class="styled-table">
            <tr>
                <thead>
                <td>Organisateur</td>
                <td>Groupe 1</td>
                <td>Groupe 2</td>
                <td>Groupe 3</td>
                <td>Groupe 4</td>
                </thead>
            </tr>
            <tbody>
                
                    <tr>
                        <td>
                            <textarea class="effect-2" type="text" placeholder="Invite" name="?"></textarea>
                        </td>
                    </tr>
               
            </tbody>
        </table>

        <div class="row bg_1">
            <div class="col-lg-4"></div>
            <div class="col-3">
                <label>Commentaire diver :</label>
                <textarea class="effect-2" type="text" placeholder="Commentaire" name="commentaireDiver" required></textarea>
                <span class="focus-border"></span>
            </div>
            <div class="col-lg-5"></div>
        </div>
        <div class="button">
            <center><button type="submit" class="raise">Valider</button></center>
        </div>
    </div>
</form>