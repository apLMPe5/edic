<?php


class ReunionController extends Controller
{

    var $reunionModel;

    var $presenceModel;
    var $presenceInnerReunionModel;
    var $presenceInnnerJoinUtilisateur;


    public function __construct($request)
    {
        parent::__construct($request);
        $this->reunionModel = $this->loadModel("Reunion");
        $this->presenceModel = $this->loadModel("Presence");
        $this->presenceInnerReunionModel = $this->loadModel("PresenceInnerReunion");
        $this->presenceInnnerJoinUtilisateur = $this->loadModel("PresenceInnerUtilisateur");
    }

    function mesReunions(){
        $d['reunions'] = $this->presenceInnerReunionModel->find(array('conditions' => "idUtilisateur = " . Session::get("id") . " AND archivee = 0", 'orderby' => "date"));
        $this->set($d);
    }

    function mesReunionsArchive(){
        $d['reunions'] = $this->presenceInnerReunionModel->find(array('conditions' => "idUtilisateur = " . Session::get("id") . " AND archivee = 1", 'orderby' => "date"));
        $this->set($d);
    }

    function contrenduReunion($idReunion){
        if(isset($_POST['contrendu'])){
            $contrendu = $_POST['contrendu'];

            if(isset($_POST['cf'])){
                $dataPresences = $_POST['cf'];
                foreach($dataPresences as $dataPresence){
                    $data = explode(",", $dataPresence);
                    $this->presenceInnerReunionModel->update(array('conditions' =>
                        array('idUtilisateur' => $data[0], 'idReunion' => $data[1]), 'donnees' =>
                        array('present' => 'A')));

                }
            }


            //re metre present les gens qui sont present alors qu'il devais pas

            $this->reunionModel->update(array('conditions' => array('id' => $idReunion), 'donnees' => array('contrendu' => $contrendu, 'archivee' => 1)));

        }
        $d['reunion'] = $this->reunionModel->findFirst(array('conditions' => "id = " . $idReunion));
        $d['utilisateurs'] = $this->presenceInnnerJoinUtilisateur->find(array('conditions' => "idReunion = '$idReunion'"));
        $this->set($d);
    }

    function listeInscrits($idReunion){
        $d['inscrits'] = $this->presenceInnnerJoinUtilisateur->find(array('conditions' => "idReunion = '$idReunion'"));
        $this->set($d);

    }

    function excuse($idReunion){
        $this->presenceInnerReunionModel->update(array('conditions' =>
            array('idUtilisateur' => Session::get("id"), 'idReunion' => $idReunion), 'donnees' =>
            array('present' => 'E')));
            $this->mesReunions();
            $this->render("mesReunions");
    }

    function annulerExcuse($idReunion){
        $this->presenceModel->update(array('conditions' =>
            array('idUtilisateur' => Session::get("id"), 'idReunion' => $idReunion), 'donnees' =>
            array('present' => 'P')));
        $this->mesReunions();
        $this->render("mesReunions");
    }

    function contrendu($idReunion){
        $d['reunion'] = $this->reunionModel->findFirst(array('conditions' => "id = '$idReunion'"));
        $this->set($d);
    }

}