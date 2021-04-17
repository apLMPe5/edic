<?php

class AdherentController extends Controller
{

    var $adherentModel;

        public function __construct($request)
        {
            parent::__construct($request);
            $this->adherentModel = $this->loadModel("Utilisateur");
        }

    function profil(){
        if(!Session::isConnected()) header("Location: " . BASE_URL . "/default/index");

        if(isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['entreprise']) && isset($_POST['fonction'])){

            $mail = $_POST['mail'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
            $entreprise = $_POST['entreprise'];
            $fonction = $_POST['fonction'];

            Session::set('mail', $mail);
            Session::set('nom', $nom);
            Session::set('prenom', $prenom);
            Session::set('tel', $telephone);
            Session::set('entreprise', $entreprise);
            Session::set('fonction', $fonction);

            $this->adherentModel->update(array('conditions' =>
                array('id' => Session::get('id')), 'donnees' =>
                array('mail' => $mail, 'nom' => $nom, 'prenom' => $prenom, 'tel' => $telephone, 'entreprise' => $entreprise, 'fonction' => $fonction)));


        }
    }

    function connexion(){
        if(isset($_POST['mail']) && isset($_POST['password'])){
            $r = $this->adherentModel->findFirst(array('conditions' => array('mail' => $_POST['mail'])));
            var_dump($r);
            if($r !== false){
                $rr = get_object_vars($r);
                if($rr["mdp"] == $_POST['password']){
                    $keys = array_keys($rr);
                    for($i=0;$i<sizeof($rr);$i++){
                        Session::set($keys[$i], $rr[$keys[$i]]);
                    }
                    Session::setConnected();
                }
            }else{

            }

        }
        header("Location: " . BASE_URL . "/default/index");
    }

    function deconnexion(){
        Session::deleteSession();
        header("Location: " . BASE_URL . "/default/index");
    }
    function resetmpd(){
        if(isset($_POST['newmdp'])){
            $newmdp = $_POST['newmdp'];
            $this->adherentModel->update(array('conditions' =>
                array('id' => Session::get('id')), 'donnees' =>
                array('mdp' => $newmdp)));
        }
        $this->profil();
        $this->render("profil");
    }
}