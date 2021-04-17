<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author travail
 */
class  Session {
  
    static function set($k,$v){
        $_SESSION[$k]=$v;
    }
    static function get($k){
        if(isset($_SESSION[$k])){
        return $_SESSION[$k];
        }
        else{
            return null;
        }
    }

    static function isConnected(){
        if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == "true") return 1;

        return 0;
    }

    static function setConnected(){
        $_SESSION['connecte'] ="true";
    }
    //A L M
    static function hasPermission($p){

        if(!isset($_SESSION["grade"])) return 0;

        $grade = $_SESSION["grade"];
        return $grade == "A";
    }

    static function deleteSession(){
        session_destroy();
    }

    function __destruct() {
        session_destroy();
    }
}
