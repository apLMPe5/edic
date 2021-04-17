<?php
class ActiviteController extends Controller
{
    function liste(){
        if(!Session::isConnected()) header("Location: " . BASE_URL . "/Default/index");
        $modActivite = $this->loadModel('Activite');
        $d['activites'] = $modActivite->find(Array('conditions' => 1));
        $this->set($d);
    }

    function rejoindre(){
        //$modInscription = $this->loadModel("rejoindre");

    }

    function details($id){
        $modActivite =  $this->loadModel('Activite');
        $d['activite'] = $modActivite->findFirst(array('conditions' => "ID_ACTIVITE = '$id'"));
        $this->set($d);
    }
}