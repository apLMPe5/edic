<?php


class OpportuniteInnerUtilisateur extends Model
{

    var $table = "opportunite inner join utilisateurs on opportunite.idUtilisateur=utilisateurs.id";

}