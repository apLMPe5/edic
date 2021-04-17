<?php


class UtilisateurInnerGroupe extends Model
{

    var $table = "utilisateurs inner join groupe on utilisateurs.groupe=groupe.departement";

}