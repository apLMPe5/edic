 <div class="back">
        <h2>Listes des inscrits pour la réunion</h2>
        <table class="styled-table">
            <thead>
            <tr>
                <td>id</td>
                <td>mail</td>
                <td>nom</td>
                <td>prenom</td>
                <td>Téléphone</td>
                <td>grade</td>
                <td>entreprise</td>
                <td>fonction</td>
                <td>groupe</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($inscrits)):
                foreach ($inscrits as $i ): ?>
                    <tr>
                        <td><?= $i->id?></td>
                        <td><?= $i->mail?></td>
                        <td><?= $i->nom?></td>
                        <td><?= $i->prenom?></td>
                        <td><?= $i->tel?></td>
                        <td><?= $i->grade?></td>
                        <td><?= $i->entreprise?></td>
                        <td><?= $i->fonction?></td>
                        <td><?= $i->groupe?></td>
                    </tr>
                <?php endforeach;?>
        <?php endif?>
            </tbody>
 </div>