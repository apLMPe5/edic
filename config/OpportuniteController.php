<?php


class OpportuniteController extends Controller
{

    var $opportuniteModel;
    var $opportuniteInnerUtilisateurModel;
    var $maitreOuvrageModel;
    var $maitriseOeuvreModel;

    public function __construct($request)
    {
        parent::__construct($request);
        $this->opportuniteModel = $this->loadModel("Opportunite");
        $this->opportuniteInnerUtilisateurModel = $this->loadModel("OpportuniteInnerUtilisateur");
        $this->maitreOuvrageModel = $this->loadModel("MaitreOuvrage");
        $this->maitriseOeuvreModel = $this->loadModel("MaitriseOeuvre");
    }

    function liste(){

        if (isset($_POST['cf'])) {
            $delete = $_POST['cf'];
            var_dump($delete);
            foreach ($delete as $dl) {
                $this->opportuniteModel->delete(array('conditions' => $dl));
            }
        }

        $d['opportunites'] = $this->opportuniteInnerUtilisateurModel->find(array('conditions' => 1));
        $this->set($d);
    }

    function creerOpportunite(){
        if(isset($_POST['information']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['status'])){
            $dateAjout = date('Y-m-d H:i:s');
            $information = $_POST['information'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $cp = $_POST['cp'];
            $idUtilisateur = Session::get("id");
            $status = $_POST['status'];
           // echo isset($_POST['dateLimite']);
            $dateLimite = isset($_POST['dateLimite']) ? $_POST['dateLimite'] : "";
            $commentaire = $_POST['commentaire'];
            $groupe = Session::get("groupe");

            $test = array("dateAjout", "information", "adresse", "ville", "cp", "idUtilisateur", "commentaire", "groupe", "statut");
            $test2 = array($dateAjout, $information, $adresse, $ville, $cp, $idUtilisateur, $commentaire, $groupe, $status);
            if($dateLimite != ""){
                array_push($test, "dateLimite");
                array_push($test2, $dateLimite);
            }
            $this->opportuniteModel->insertAI($test, $test2);
            $op = $this->opportuniteModel->findFirst(array('conditions' => "1", 'orderby' => "idOpportunite DESC"));

            if(isset($op))
                header("Location: " . BASE_URL . "/opportunite/creerOpportunite2/$op->idOpportunite");
        }
    }

    function creerOpportunite2($idOp){
        
            //if (isset($_POST['subForm'])) {
            if (isset($_POST['nomMOuvrage'])) {
            //vérifier par où on passe
            //faire des requêtes en dur
            $nom = isset($_POST['nomMOuvrage']) ? $_POST['nomMOuvrage'] : "";
            $prenom = isset($_POST['prenomMOuvrage']) ? $_POST['prenomMOuvrage'] : "";
            $mail = isset($_POST['emailMOuvrage']) ? $_POST['emailMOuvrage'] : "";
            $tel = isset($_POST['telMOuvrage']) ? $_POST['telMOuvrage'] : ""; 
            /*$nom = "Pogba";
            $prenom = "Paul";
            $mail ="paul@sfr.fr";
            $tel = "0654253214";*/
            $chaine="/&".$nom.$prenom.$mail.$tel.$_POST['subForm'];
            $max=$this->maitreOuvrageModel->insertAI(["nom", "prenom", "mail", "tel"],[$nom, $prenom, $mail, $tel]);
            $chaine.="-->".$max."<--";
            //$this->maitreOuvrageModel->insertAI(array("nom", "prenom", "mail", "tel"),array($nom, $prenom, $mail, $tel));
            /*$m = $this->maitreOuvrageModel->findFirst(array('conditions' => "1", 'orderby' => "id DESC"));
            echo "id MaitreOuvrage: ";
            echo $m->id;*/
            //$this->opportuniteModel->update(array('conditions' => array('idOpportunite' => $idOp), 'donnees' => array("maitreOuvrage" => $m->id)));
            $this->opportuniteModel->update(array('conditions' => array('idOpportunite' => $idOp), 'donnees' => array("maitriseOuvrage" => $max)));

            //header("Location: " . BASE_URL . "/opportunite/creerOpportunite3/". $idOp."&".$m->id."&form");
            //header("Location: " . BASE_URL . "/opportunite/creerOpportunite3/". $idOp.$chaine);
            header("Location: " . BASE_URL . "/opportunite/creerOpportunite3/". $idOp);
            
            //header("Location: " . BASE_URL . "/opportunite/liste".$chaine);

        }
        elseif(isset($_POST['selectMOuvrage'])) {
            echo "efffffffefefeffe";
            $id = $_POST['selectMOuvrage']; echo "---->".$id."<----";
            $this->opportuniteModel->update(array('conditions' => array('idOpportunite' => $idOp), 'donnees' => array("maitriseOuvrage" => $id)));
            header("Location: " . BASE_URL . "/opportunite/creerOpportunite3/". $idOp."&".$id."&liste");
        }
            $d["id"] = $idOp;
            $d["maitreOuvrages"] = $this->maitreOuvrageModel->find(array('conditions' => 1,  'orderby' => "nom DESC"));
            $this->set($d);
            
    }

    function creerOpportunite3($idOp){
        //echo "ooooooo";
        if (isset($_POST['nomMOeuvre']) && isset($_POST['prenomMOeuvre'])) {
           // echo"test1";
            $nom = $_POST['nomMOeuvre'];
            $prenom = isset($_POST['prenomMOeuvre']) ? $_POST['prenomMOeuvre'] : "";
            $mail = isset($_POST['emailMOeuvre']) ? $_POST['emailMOeuvre'] : "";
            $tel = isset($_POST['telMOeuvre']) ? $_POST['telMOeuvre'] : "";

            $max=$this->maitriseOeuvreModel->insertAI(array("nom", "prenom", "mail", "telephone"), array($nom, $prenom, $mail, $tel));

            //$m = $this->maitriseOeuvreModel->findFirst(array('conditions' => "1", 'orderby' => "id DESC"));

            $this->opportuniteModel->update(array('conditions' => array('idOpportunite' => $idOp), 'donnees' => array("maitreOeuvre" => $max)));
            header("Location: " . BASE_URL . "/opportunite/liste"."/".$max);
        }else if(isset($_POST['selectMOuvrage'])){
            //echo"test2";

            $id = $_POST['selectMOuvrage'];
            echo " ----> " . $id;

            $this->opportuniteModel->update(array('conditions' => array('idOpportunite' => $idOp), 'donnees' => array("maitreOeuvre" => $id)));
            header("Location: " . BASE_URL . "/opportunite/liste");
        }

        $d["id"] = $idOp;
        $d["maitriseOeuvres"] = $this->maitriseOeuvreModel->find(array('conditions' => 1));
        $this->set($d);
    }

    function modifOpportunite($id){
        if(isset($_POST['information']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['status'])){
            $dateAjout = date('Y-m-d H:i:s');
            $information = $_POST['information'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $cp = $_POST['cp'];
            $idUtilisateur = Session::get("id");
            $status = $_POST['status'];
            // echo isset($_POST['dateLimite']);
            $dateLimite = isset($_POST['dateLimite']) ? $_POST['dateLimite'] : "";
            $commentaire = $_POST['commentaire'];
            $groupe = Session::get("groupe");

            $donnees = array("dateAjout" => $dateAjout, "information" => $information, "adresse" => $adresse, "ville" => $ville, "cp" => $cp, "idUtilisateur" => $idUtilisateur, "commentaire" => $commentaire, "groupe" => $groupe, "statut" => $status, "dateLimite" => $dateLimite);
            $conditions = array("idOpportunite" =>  $id);
            $params=array('donnees' => $donnees, 'conditions' => $conditions);
            $this->opportuniteModel->update($params);
            if($dateLimite != ""){
                array_push($test, "dateLimite");
                array_push($test2, $dateLimite);
            }
            var_dump(test2);
           
            /*for($i = 0; $i < sizeof($test); $i++){
                $test3[$i] = $test2[$i]; 
            }
            $this->opportuniteModel->update(array('conditions' =>
                array('idOpportunite' => $id), ));
            $this->opportuniteModel->update($test, $test2);
            $this->opportuniteModel->update(array('conditions' =>
                array('idOpportunite' => $id), ));*/
            //$this->opportuniteModel->update(array('conditions' =>array('idOpportunite' => $id), 'donnees' => array($test, $test2);
            header("Location: " . BASE_URL . "/opportunite/liste");

        }
         $test3 = array();
        //$d['opportunite'] = $this->opportuniteModel->findFirst(array('conditions' => "idOpportunite = '$id'",'donnees' => $test3));
        $d['opportunite'] = $this->opportuniteModel->findFirst(array('conditions' => "idOpportunite = '$id'"));
        $this->set($d);
    }

    function afficheOuvrage($id){
        if(isset($_POST['nom'])){
            $nom = $_POST['nom'];
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
            $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
            $this->maitreOuvrageModel->update(array('conditions' => array('id' => $id), 'donnees' => array("nom" => $nom, "prenom" => $prenom, "mail" => $mail, "tel" => $telephone)));
            header("Location: " . BASE_URL . "/opportunite/liste");
        }
        $d['maitre'] = $this->maitreOuvrageModel->findFirst(array('conditions' => "id = '$id'"));
        $this->set($d);
    }

    function afficheOeuvre($id){
        if(isset($_POST['nom'])){
            $nom = $_POST['nom'];
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
            $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
            $this->maitriseOeuvreModel->update(array('conditions' => array('id' => $id), 'donnees' => array("nom" => $nom, "prenom" => $prenom, "mail" => $mail, "telephone" => $telephone)));
            header("Location: " . BASE_URL . "/opportunite/liste");
        }
        $d['maitre'] = $this->maitriseOeuvreModel->findFirst(array('conditions' => "id = '$id'"));
        $this->set($d);
    }
}