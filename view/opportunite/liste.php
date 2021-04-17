<form method="post" action="<?=BASE_URL?>/opportunite/liste">
    <div class="back">
        <h2>Liste des opportunités</h2>

        <table class="styled-table">
            <thead>
            <tr>
            	<td>Date d'ajout</td>
                <td>Ajoutée par</td>
                <td>Nom du projet</td>
                <td>Statut</td>
                <td>Ville</td>
                <td>Code postal</td>
                <td>Date limite de réponse</td>
                <td>Commentaire</td>
                <td>Maitrise d'ouvrage</td>
                <td>Maitre d'oeuvre</td>
                <td>Modifier l'opportunité</td>
                <?php if(Session::hasPermission('A')):?>
                <td>Supprimer</td>
                <?php endif ?>
            </tr>
            </thead>
            <body>
            <?php
            if(isset($opportunites)){
                $i=0;
                foreach ($opportunites as $o ): ?>
                    <tr>
                    	<td><?= $o->dateAjout ?></td>
                        <td><?= $o->prenom ?> <?= $o->nom ?></td>
                        <td><?= $o->information ?></td>
                        <td><?= $o->statut ?></td>
                        <td><?= $o->ville ?></td>
                        <td><?= $o->cp ?></td>
                        <td><?= $o->dateLimite ?></td>
                        <td><?= $o->commentaire ?></td>
                        
                        <td>
                            <div class="button">
                                <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/opportunite/afficheOuvrage/<?= $o->maitriseOuvrage ?>"><?= $lesMoa[0] ?></button></center>
                            </div>
                        </td>
                        <td>
                            <div class="button">
                                <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/opportunite/afficheOeuvre/<?= $o->maitreOeuvre ?>"><?= $lesMoe[0] ?></button></center>
                            </div>
                        </td>
                        <td>
                            <div class="button">
                                <center><button class="fill" type="submit" formaction="<?=BASE_URL?>/opportunite/modifOpportunite/<?= $o->idOpportunite ?>">Modifier</button></center>
                            </div>
                        </td>
                        <?php if(Session::hasPermission('A')):?>
                            <td><center><label class="switch">
                                    <input type="checkbox" name="cf[]" value="idOpportunite = <?=$o->idOpportunite ?>">
                                    <div>
                                        <span></span>
                                    </div>
                                </label></center></td>
                        <?php endif ?>
                    </tr>
                <?php 
                    $i++;
                endforeach;
            }
            ?>
            </body>
        </table>
        <br>
        <div class="button">
        	<button formaction="<?=BASE_URL?>/opportunite/creerOpportunite" class="raise">Ajouter une opportunité</button>
        
            <?php if (Session::hasPermission('A')): ?>
            <button type="submit" class="raise">Supprimer une opportunité</button>
            <?php endif?>
    </form>
    </div>
</div>
