<?php


class PresenceInnerReunion extends Model
{
    var $table = "presence inner join reunion on presence.idReunion = reunion.id";
}