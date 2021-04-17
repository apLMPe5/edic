<?php


class OpportuniteInnerGroupe extends Model
{
    var $table = "opportunite inner join groupe on opportunite.groupe=groupe.departement";

}