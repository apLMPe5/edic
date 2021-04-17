<?php
class AdminController extends Controller
{

    var $utilisateurModel;
    var $delUtilisateurModel;
    var $utilisateurInnerGroupeModel;

    var $groupeModel;
    var $delGroupModel;

    var $reunionModel;
    var $delReunionModel;

    var $presenceModel;
    var $presenceInnerReunion;
    var $delPresenceModel;

    var $opportuniteModel;

    public function __construct($request)
    {
        parent::__construct($request);
        $this->utilisateurModel = $this->loadModel("Utilisateur");
        $this->delUtilisateurModel = $this->loadModel("DelUtilisateur");
        $this->utilisateurInnerGroupeModel = $this->loadModel("UtilisateurInnerGroupe");

        $this->groupeModel = $this->loadModel("Groupe");
        $this->delGroupModel = $this->loadModel("DelGroupe");

        $this->reunionModel = $this->loadModel("Reunion");
        $this->delReunionModel = $this->loadModel("DelReunion");

        $this->presenceModel = $this->loadModel("Presence");
        $this->presenceInnerReunion = $this->loadModel("PresenceInnerReunion");
        $this->delPresenceModel = $this->loadModel("DelPresence");

        $this->opportuniteModel = $this->loadModel("Opportunite");
    }

    function utilisateurs()
    {
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/default/index");

        if (isset($_POST['cf'])) {
            $delete = $_POST['cf'];
            #var_dump($delete);
            foreach ($delete as $dl) {
                $this->delUtilisateurModel->delete(array('conditions' => $dl));
            }
        }
        $d['adherents'] = $this->utilisateurInnerGroupeModel->find(array('conditions' => 1));
        $this->set($d);
    }

    function modifUtilisateur($id)
    {
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/default/index");

        if (isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['grade']) && isset($_POST['entreprise']) && isset($_POST['fonction']) && isset($_POST['groupe'])) {
        	
            $mail = $_POST['mail'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['tel'];
            $grade = $_POST['grade'];
            $entreprise = $_POST['entreprise'];
            $fonction = $_POST['fonction'];
            $groupe = $_POST['groupe'];

            $this->utilisateurModel->update(array('conditions' =>
                array('id' => $id), 'donnees' =>
                array('mail' => $mail, 'nom' => $nom, 'prenom' => $prenom, 'tel' => $telephone, 'grade' => $grade, 'entreprise' => $entreprise, 'fonction' => $fonction, 'groupe' => $groupe)));


        }
        $d['utilisateur'] = $this->utilisateurModel->findFirst(array('conditions' => "id = '$id'"));
        $d['groupes'] = $this->groupeModel->find(array('conditions' => 1));
        $this->set($d);
    }

    function creerUtilisateur()
    {
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/default/index");

        if (isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['grade']) && isset($_POST['entreprise']) && isset($_POST['fonction']) && isset($_POST['idGroupe'])) {

            $mail = $_POST['mail'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
            $grade = $_POST['grade'];
            $entreprise = $_POST['entreprise'];
            $fonction = $_POST['fonction'];
            $dateCreation = date('Y-m-d H:i:s');
            $idGroupe = $_POST['idGroupe'];

            $this->utilisateurModel->insertAI(
                array("mail", "mdp", "nom", "prenom", "tel", "grade", "dateCreation", "entreprise", "fonction", "groupe"),
                array($mail, "achanger", $nom, $prenom, $telephone, $grade, $dateCreation, $entreprise, $fonction, $idGroupe));
        }
        $d['groupes'] = $this->groupeModel->find(array('conditions' => 1));
        $this->set($d);
    }


    function groupe()
    {
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/default/index");
        if (isset($_POST['cf'])) {
            $delete = $_POST['cf'];
            #var_dump($delete);

            foreach ($delete as $dl) {
                $this->delGroupModel->delete(array('conditions' => $dl));
            }
        }

        $d['groupes'] = $this->groupeModel->find(array('conditions' => 1));
        $this->set($d);
    }

    function creerGroupe()
    {
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/default/index");

        if (isset($_POST['libelle']) && isset($_POST['departement'])) {
            $libelle = $_POST['libelle'];
            $departement = $_POST['departement'];

            $this->groupeModel->insertAI(
                array("libelle", "departement"),
                array($libelle, $departement));
            header("Location: " . BASE_URL . "/admin/groupe");
        }
    }

    function modifGroupe($id)
    {
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/default/index");

        if (isset($_POST['libelle'])) {

            $libelle = $_POST['libelle'];

            $this->groupeModel->update(array('conditions' =>
                array('departement' => $id), 'donnees' =>
                array('libelle' => $libelle)));
            header("Location: " . BASE_URL . "/admin/groupe");
        }

        $d['groupe'] = $this->groupeModel->findFirst(array('conditions' => "departement = '$id'"));
        $this->set($d);
    }

    function reunions()
    {
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/default/index");

        if (isset($_POST['cf'])) {
            $delete = $_POST['cf'];
            #var_dump($delete);
            foreach ($delete as $dl) {
                $this->delReunionModel->delete(array('conditions' => $dl));
            }
        }
        $d['reunions'] = $this->reunionModel->find(array('conditions' => 1));
        $this->set($d);
    }

    function creerReunion()
    {
        if (isset($_POST['date']) && isset($_POST['organisateur']) && isset($_POST['lieu']) && isset($_POST['groupe'])) {

            $date = $_POST['date'];
            $organisateur = $_POST['organisateur'];
            $repas = isset($_POST["repas"]) ? $_POST['repas'] : 0;
            $lieu = $_POST['lieu'];
            $groupe = $_POST['groupe'];

            $this->reunionModel->insertAI(
                array("date", "organisateur", "lieu", "groupe", "repas"),
                array($date, $organisateur, $lieu, $groupe, $repas));
            header("Location: " . BASE_URL . "/admin/reunions");
        }
        $d['groupes'] = $this->groupeModel->find(array('conditions' => 1));
        $d['organisateurs'] = $this->utilisateurModel->find(array('conditions' => 1));
        $this->set($d);
    }

    function listeInscrits($idReunion){
        $d['inscrits'] = array();
        $d['potentials'] = array();

        $reunion = $this->reunionModel->findFirst(array('conditions' => "id = '$idReunion'"));
        $d['reunion'] = $reunion;
        $presences = $this->presenceModel->find(array('conditions' => "idReunion = '$idReunion'"));
        $potentials = $this->utilisateurModel->find(array('conditions' => "groupe = " . $reunion->groupe));
        $placePresence = 0;
        $placePotential = 0;

        foreach ($potentials as $potential){
            $tchecked = False;
            foreach ($presences as $presence){
                if($presence->idUtilisateur == $potential->id){
                    $d['inscrits'][$placePresence] = $potential;
                    $tchecked = True;
                    $placePresence++;
                    break;
                }
            }
            if(!$tchecked){
                $d['potentials'][$placePotential] = $potential;
                $placePotential++;
            }
        }

        $this->set($d);
    }

    function ajouterMembreReunion($idReunion)
    {

        if(isset($_POST['cf'])){
            $cf = $_POST['cf'];
            foreach ($cf as $c){
                $datas = explode(",", $c);
                $this->presenceModel->insert(array("idReunion", "idUtilisateur"), array($datas[1], $datas[0]));
            }
        }

        $this->listeInscrits($idReunion);
        $this->render("listeInscrits");
    }

    function deleteMembreReunion($idReunion)
    {
        if(isset($_POST['cf'])) {
            $delete = $_POST['cf'];
            foreach ($delete as $dl) {
                $this->delPresenceModel->delete(array('conditions' => $dl));
            }
        }

        $this->listeInscrits($idReunion);
        $this->render("listeInscrits");
    }



    function modifReunion($id)
    {
        if (isset($_POST['date']) && isset($_POST['organisateur']) && isset($_POST['lieu']) && isset($_POST['idGroupe'])) {

            $date = $_POST['date'];
            $organisateur = $_POST['organisateur'];
            $lieu = $_POST['lieu'];
            $idGroupe = $_POST['idGroupe'];
            $repas = isset($_POST['repas']) ? $_POST['repas'] : 0;
            $this->reunionModel->update(array('conditions' =>
                array('id' => $id), 'donnees' =>
                array('date' => $date, 'organisateur' => $organisateur, 'lieu' => $lieu, "groupe" => $idGroupe, "repas" => $repas)));
            header("Location: " . BASE_URL . "/admin/reunions");
        }
        $d['reunion'] = $this->reunionModel->findFirst(array('conditions' => "id = '$id'"));
        $d['groupes'] = $this->groupeModel->find(array('conditions' => 1));
        $d['organisateurs'] = $this->utilisateurModel->find(array('conditions' => 1));
        $this->set($d);
    }


    }