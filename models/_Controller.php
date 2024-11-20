<?php

class _Controller extends Controller
{
    private $_bdd;
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
    //SELECT
    //fonction permettant de recupere les details sur un employe via Nmatri
    public function get_Employe_Detail(int $NumMatriEmploye)
    {
        $req = $this->_bdd->prepare("SELECT * FROM employe WHERE NumMatriEmploye = :matri");
        $req->execute(array('matri' => $NumMatriEmploye));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return new Controller($data);
    }
   //Fonction permettant d'etablir l'authentification
   public function Authentification($PseudoEmploye, $PassUser)
   {
       $req = $this->_bdd->prepare('SELECT * FROM administrateur WHERE (PseudoEmploye = ? OR MailEmploye = ?) AND passAdmin = ?');
       $req->execute([$PseudoEmploye, $PseudoEmploye, $PassUser]);
       if ($req->rowCount() == 1) {
           $data = $req->fetch(PDO::FETCH_ASSOC);
           return new Controller($data);
       } else
           header('Location:Login');
       $req->closeCursor();
   }
    //INSERT
    //function permettant de suivre les connexions
    public function Insert_new_connexion($NumMatriEmploye, $navigateurUtiliser, $NomEmploye)
    {
        date_default_timezone_set('Africa/Djibouti');
        $TimeCon = date('d/m/Y H:i:s'); // Utiliser le format DATETIME pour stocker la date et l'heure
        $detailsCon = 'Navigateur : ' . $navigateurUtiliser;
        //verification
        $reqCheck = $this->_bdd->prepare("SELECT COUNT(*) FROM connexion WHERE NumMatriEmploye = ?");
        $reqCheck->execute(array($NumMatriEmploye));
        $rowExists = $reqCheck->fetchColumn();
        if ($rowExists) {
            $reqUpdate = $this->_bdd->prepare("UPDATE connexion SET TimeCon = ?, healthEmploye = ?, Statu = ? WHERE NumMatriEmploye = ?");
            $reqUpdate->execute([$TimeCon, $detailsCon,"Connecté", $NumMatriEmploye]);
            $reqUpdate->closeCursor();
        } else {
            $reqInsert = $this->_bdd->prepare("INSERT INTO connexion (TimeCon, NumMatriEmploye, healthEmploye,PseudoEmploye,Statu) VALUES (?,?,?,?,?)");
            $reqInsert->execute([$TimeCon, $NumMatriEmploye, $detailsCon, $NomEmploye,'Connecté']);
            $reqInsert->closeCursor();
        }
    }
    //function permettant de suivre les deconnexions
    public function Insert_new_deconnexion($NumMatriEmploye)
    {
        date_default_timezone_set('Africa/Djibouti');
        $TimeDecon = date('d/m/Y H:i:s'); // Utiliser le format DATETIME pour stocker la date et l'heure
        $req = $this->_bdd->prepare("UPDATE connexion SET TimeDecon = ?, Statu = ? WHERE NumMatriEmploye = ?");
        $req->execute(array($TimeDecon, 'Deconnecté' ,$NumMatriEmploye));
        $req->closeCursor();
    }
}