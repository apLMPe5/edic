<?php
    //var_dump($utilisateurs);
    //var_dump($opportuniteStats);
    //var_dump($reunionStats);
    //var_dump($test);
   // var_dump($groupes);
?>

<div class="back">

<h1>Statistiques</h1>

<h2>Présence aux réunions</h2>

<?php foreach ($reunionStats as $reunionStat){
    echo "<h3>Groupe : " . $reunionStat["groupe"]->libelle . "</h3> 
    <table class='styled-table'>
        <thead>
            <tr>
                <td>Utilisateurs</td>
                <td>Janvier</td>
                <td>Février</td>
                <td>Mars</td>
                <td>Avril</td>
                <td>Mai</td>
                <td>Juin</td>
                <td>Juillet</td>
                <td>Août</td>
                <td>Septembre</td>
                <td>Octobre</td>
                <td>Novembre</td>
                <td>Décembre</td>

            </tr>
        </thead>
    <tbody>";
    foreach($reunionStat["utilisateurs"] as $utilisateur){
        echo "<tr><td>" . $utilisateur['utilisateur']->prenom . "&ensp;" . $utilisateur['utilisateur']->nom . "</td>";

        for($i = 0; $i < 12; $i++){
            if(isset($utilisateur['presences']) && isset($utilisateur['presences'][$i])){
                echo "<td>".$utilisateur['presences'][$i]->present."</td>";
            }
            else  {
               echo "<td>N</td>";
            }            
        }

        echo "</tr>";
    }
    echo "</tbody></table>";
}?>



<h2>Statistiques sur les opportunités</h2>

<?php foreach ($test as $t){
    echo "<h3>Groupe : " . $t["groupe"]->libelle . "</h3> 
    <table class='styled-table'>
    <thead>
    <tr>
        <td>Utilisateurs</td>
        <td>Opportunités créées</td>

    </tr>
    </thead>
    <tbody>";
    foreach($t["utilisateurs"] as $utilisateur){
        echo "<tr> <td>" . $utilisateur['utilisateur']->prenom . "&ensp;" . $utilisateur['utilisateur']->nom . "</td> <td>". number_format(($utilisateur['stats'] / 12 * 100), 1, ',', ' ') . "&nbsp;%</td> </tr>";
    }
    echo "</tbody></table>"; 
}
?>
</div>
