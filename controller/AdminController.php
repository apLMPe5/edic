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
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/Default/index");

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
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/Default/index");

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
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/Default/index");

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
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/Default/index");
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
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/Default/index");

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
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/Default/index");

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
        if (!Session::hasPermission("A")) header("Location: " . BASE_URL . "/Default/index");

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


        function validActivite($id)
        {
            $modActivite = $this->loadModel('Activite');
            $modActivite->update(array('conditions' => array('ID_ACTIVITE' => $id), 'donnees' => array('STATUT' => "V")));
            $this->render("activite");
        }

        function mesactivite()
        {
            if (isset($_POST['cf'])) {
                $delete = $_POST['cf'];
                #var_dump($delete);
                $actModelSup = $this->loadModel("Supactivite");
                foreach ($delete as $dl) {
                    $actModelSup->delete(array('conditions' => $dl));
                }
            }
            $modActivite = $this->loadModel("Activite");
            $d['activites'] = $modActivite->find(array('conditions' => "ID_LEADER = " . Session::get("ID_ADHERENT")));
            $this->set($d);
        }

        function prestataire()
        {
            if (!Session::hasPermission("A") and !Session::hasPermission("L")) header("Location: " . BASE_URL . "/Default/index");
            if (isset($_POST['cf'])) {
                $delete = $_POST['cf'];
                $prestataireModelSup = $this->loadModel("Supprestataire");
                foreach ($delete as $dl) {
                    $prestataireModelSup->delete(array('conditions' => $dl));
                }
            }

            $prestataireModel = $this->loadModel("Prestataire");
            $d['prestataires'] = $prestataireModel->find(array('conditions' => 1));
            $this->set($d);
        }


        function creerprestataire()
        {
            if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])) {
                $prestataireModel = $this->loadModel("Prestataire");
                $prestataireModel->insertAI(array("NOM", "MAIL", "TEL", "ADRESSE", "CP", "VILLE"), array($_POST['nom'], $_POST['email'], $_POST['telephone'], $_POST['adresse'], $_POST['cp'], $_POST['ville']));
            }
        }

        function modifPrestataire($id)
        {
            $prestataireModel = $this->loadModel("Prestataire");
            if (isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])) {
                $prestataireModel->update(array('conditions' => array('id' => $id), 'donnees' => array('nom' => $_POST['nom'], 'mail' => $_POST['mail'], 'tel' => $_POST['tel'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'])));
            }
            $d['prestataire'] = $prestataireModel->findFirst(array('conditions' => "id = '$id'"));
            $this->set($d);
        }


        function creneau()
        {
            if (!Session::hasPermission("A") and !Session::hasPermission("L")) header("Location: " . BASE_URL . "/Default/index");
            if (isset($_POST['cf'])) {
                $delete = $_POST['cf'];
                $creneauModelSup = $this->loadModel("Supcreneau");
                foreach ($delete as $dl) {
                    $creneauModelSup->delete(array('conditions' => $dl));
                }
            }
            $creneauModel = $this->loadModel("Creneau");
            $d['creneaux'] = $creneauModel->find(array('conditions' => 1));
            $this->set($d);
        }

        function creercreneau()
        {
            if (isset($_POST['id_activite']) && isset($_POST['datecreneau']) && isset($_POST['heurecreneau']) && isset($_POST['effectif']) && isset($_POST['statut'])) {
                $creneauModel = $this->loadModel("Creneau");
                $activiteModel = $this->loadModel("Activite");
                $creneauModel->insertAI(array("ID_ACTIVITE", "DATE_CRENEAU", "HEURE_CRENEAU", "EFFECTIF_CRENEAU", "STATUT"), array($_POST['id_activite'], $_POST['datecreneau'], $_POST['heurecreneau'], $_POST['effectif'], $_POST['statut']));
                $d['activites'] = $activiteModel->find(array('conditions' => 1));
            }
        }

        function modifcreneau($id)
        {
            $creneauModel = $this->loadModel("Creneau");
            if (isset($_POST['id_activite']) && isset($_POST['datecreneau']) && isset($_POST['heurecreneau']) && isset($_POST['effectif']) && isset($_POST['statut'])) {
                $creneauModel->update(array('conditions' => array('NUM_CRENEAU' => $id), 'donnees' => array('ID_ACTIVITE' => $_POST['id_activite'], 'DATE_CRENEAU' => $_POST['datecreneau'], 'HEURE_CRENEAU' => $_POST['heurecreneau'], 'EFFECTIF' => $_POST['effectif'], 'STATUT' => $_POST['statut'])));
            }
            $d['creneau'] = $creneauModel->findFirst(array('conditions' => "NUM_CRENEAU = '$id'"));
            $this->set($d);
        }

        function stats(){
            $d['groupes'] = $this->groupeModel->find(array('conditions' => 1));
            $d['utilisateurs'] = $this->utilisateurModel->find(array('conditions' => 1));


            $d['reunionStats'] = array();
            foreach ($d['groupes'] as $groupe){
                $d['reunionStats'][$groupe->departement] = array();
                $d['reunionStats'][$groupe->departement]['groupe'] = $groupe;
                $d['reunionStats'][$groupe->departement]['utilisateurs'] = array();
                foreach($d['utilisateurs'] as $utilisateur){
                    if($groupe->departement == $utilisateur->groupe){
                        $d['reunionStats'][$groupe->departement]['utilisateurs'][$utilisateur->id]['utilisateur'] = $utilisateur;
                        $d['reunionStats'][$groupe->departement]['utilisateurs'][$utilisateur->id]['presences'] = array();
                        $reunions = $this->presenceInnerReunion->find(array('conditions' => "idUtilisateur = '$utilisateur->id'", 'orderby' => "date"));
                        $current = 0;
                        foreach ($reunions as $reunion){
                            $currentAnnee = new DateTime();
                            $currentAnnee = $currentAnnee->format("Y");
                            //$currentAnnee = date("Y", strtotime(date("Y", strtotime($currentAnnee)) . " + 1 year"));

                            $dateAnnee = date("Y", strtotime($reunion->date));
                            if($dateAnnee == $currentAnnee){
                                $d['reunionStats'][$groupe->departement]['utilisateurs'][$utilisateur->id]['presences'][$current] = $reunion;
                            }
                        }
                    }
                }
            }


            $d['test'] = array();
            foreach($d['groupes'] as $groupe){
                $d['test'][$groupe->departement] = array();
                $d['test'][$groupe->departement]['groupe'] = $groupe;
                $d['test'][$groupe->departement]['utilisateurs'] = array();
                foreach($d['utilisateurs'] as $utilisateur){
                    if($groupe->departement == $utilisateur->groupe){
                        $opportunites = $this->opportuniteModel->find(array('conditions' => "idUtilisateur = '$utilisateur->id'"));
                        $nbrOp = 0;
                        foreach($opportunites as $opportunite){
                            $currentAnnee = new DateTime();
                            $currentAnnee = $currentAnnee->format("Y");
                            //$currentAnnee = date("Y", strtotime(date("Y", strtotime($currentAnnee)) . " + 1 year"));

                            $dateAnnee = date("Y", strtotime($opportunite->dateAjout));
                            if($dateAnnee == $currentAnnee){
                               $nbrOp += 1;
                            }
                        }
                        $d['test'][$groupe->departement]['utilisateurs'][$utilisateur->id]['utilisateur'] = $utilisateur;
                        $d['test'][$groupe->departement]['utilisateurs'][$utilisateur->id]['stats'] = $nbrOp;
                    }
                }
            }
            /*
            foreach($d['utilisateurs'] as $utilisateur){

                $d['opportuniteStats'][$utilisateur->groupe]['utilisateur'] = $utilisateur;
                $d['opportuniteStats'][$utilisateur->groupe]['nbrOpportunite'] = 0;
                $opportunites = $this->opportuniteModel->find(array('conditions' => "idUtilisateur = '$utilisateur->id'"));
                foreach($opportunites as $opportunite){
                    $currentAnnee = new DateTime();
                    $currentAnnee = $currentAnnee->format("Y");
                    //$currentAnnee = date("Y", strtotime(date("Y", strtotime($currentAnnee)) . " + 1 year"));

                    $dateAnnee = date("Y", strtotime($opportunite->dateAjout));
                    if($dateAnnee == $currentAnnee){
                        $d['opportuniteStats'][$i]['nbrOpportunite'] += 1;
                    }
                }

            $i++;

            }*/
            //var_dump($d['opportuniteStats']);
            $this->set($d);
        }
}