<?php


class PresenceInnerUtilisateur extends Model
{

    var $table = "presence inner join utilisateurs on presence.idUtilisateur = utilisateurs.id";

}