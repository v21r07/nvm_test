<?php
session_start();
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
    if (isset($_POST['Add_By_Form'])) {
        //info primary
        $init = $_POST['init'];
        $NumMatriEmploye = $_POST['NumMatriEmploye'];
        $NumCIN = $_POST['NumCIN'];
        $NumCnapsEmploye = $_POST['NumCnapsEmploye'];
        $NomU = $_POST['Nom'];
        $PrenomU = $_POST['Prenom'];
        $FonctionEmploye = $_POST['FonctionEmploye'];
        $DateNaissEmploye = $_POST['DateNaissEmploye'];
        $AdresseEmploye = $_POST['AdresseEmploye'];
        $DateEmbaucheEmploye = $_POST['DateEmbaucheEmploye'];
        $DateDemissionEmploye = $_POST['DateDemissionEmploye'];
        $SectionEmploye = $_POST['SectionEmploye'];
        $ClassEmploye = $_POST['ClassEmploye'];
        $SalaryBaseEmploye = $_POST['SalaryBaseEmploye'];
        $TauxHeureEmploye = $_POST['TauxHeureEmploye'];
        $THS30 = $_POST['THS30'];
        $THS50 = $_POST['THS50'];
        $THM40 = $_POST['THM40'];
        $THM50 = $_POST['THM50'];
        $THM50 = $_POST['THM50'];
        $THM100 = $_POST['THM100'];
        $IndiceEmploye = $_POST['IndiceEmploye'];
        if(isset($_POST['SexeEmploye']))
        {
            $SexeEmploye = $_POST['SexeEmploye'];
        }
        else
        {
            $SexeEmploye = ' - ';
        }
        $CarteDeVaccination = $_POST['CarteDeVaccination'];
        $NomConjointe = $_POST['NomConjointe'];
        $Nomdupere = $_POST['Nomdupere'];
        $Nomdelamere = $_POST['Nomdelamere'];
        $NbrEnfantEmploye = $_POST['NbrEnfantEmploye'];
        //INFO COMPLEMENTAIRE /SECONDAIRE
        //$PseudoEmploye= $_POST['PseudoEmploye'];
        $ContactEmploye= $_POST['Contact'];
        //$StatusEmploye= $_POST['Status'];//admin ou simple user
        $StatusEmploye= 'User';//admin ou simple user
        //$MailEmploye = $_POST['MailEmploye'];
        $MailEmploye = '-';
        $LieuNaissEmploye = $_POST['LieuNaissEmploye'];
        $EtatCivilEmploye = $_POST['EtatCivilEmploye'];
        $TypeContratEmploye = $_POST['TypeContratEmploye'];
        $durationCDDEmploye = $_POST['durationCDDEmploye'];
        $CDDMotifEmploye = $_POST['CDDMotifEmploye'];
        //$QualificateEmploye = $_POST['QualificateEmploye'];//Qualification
        $QualificateEmploye = '-';//Qualification
        $NameContactEmergencyEmploye = $_POST['NameContactEmergencyEmploye'];
        $ContactEmergencyEmploye = $_POST['ContactEmergencyEmploye'];
        $DescriEmploye= $_POST['healthEmploye'];//description sur la santé ou autre details
        if($NbrEnfantEmploye ==1) {
            $NomEnf1 = $_POST['NomEnf1'];
            $DateNEnf1 = $_POST['DateNEnf1'];
        }
        else if($NbrEnfantEmploye == 2) {
            $NomEnf2 = $_POST['NomEnf2'];
            $DateNEnf2 = $_POST['DateNEnf2'];
        }
        else if($NbrEnfantEmploye == 3) {
            $NomEnf3 = $_POST['NomEnf3'];
            $DateNEnf3 = $_POST['DateNEnf3'];
        }
        $LastStepSchool = $_POST['LastStepSchool'];
        $DiplomEmploye = $_POST['DiplomEmploye'];
        $SpecCout = $_POST['SpecCout'];
        $OtherWorkKnow = $_POST['OtherWorkKnow'];
        $LastWorkPlace = $_POST['LastWorkPlace'];

        $new_obj = new _Controller($bdd);

        $new_obj->Insert_new_Employe($init ,$NumMatriEmploye ,$NomU ,$PrenomU ,$FonctionEmploye ,$DateNaissEmploye ,$AdresseEmploye,$NumCIN ,$DateEmbaucheEmploye ,$DateDemissionEmploye ,$SectionEmploye ,$ClassEmploye ,$SalaryBaseEmploye ,$TauxHeureEmploye ,$IndiceEmploye ,$SexeEmploye , $NumCnapsEmploye ,$THM50 ,$THM40 ,$THS50 ,$THS30 ,$ContactEmploye ,$StatusEmploye ,$MailEmploye ,$LieuNaissEmploye ,$EtatCivilEmploye ,$NbrEnfantEmploye ,$TypeContratEmploye ,$durationCDDEmploye ,$CDDMotifEmploye ,$QualificateEmploye ,$NameContactEmergencyEmploye ,$ContactEmergencyEmploye ,$DescriEmploye);
        //$new_obj->Insert_Hist($_SESSION['id'], 'Ajout nouveau Utilisateur (' . $PseudoU . ')');
        header('Location:ListEmploye');
    } else if(isset($_POST['Add_By_Exraction'])){
        $file = $_FILES["fileToUpload"]["tmp_name"];
        // Charger le fichier Excel
        $spreadsheet = IOFactory::load($file);
        // Sélectionner la première feuille
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->removeRow(1);

        // Parcourir les lignes du fichier Excel
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            $isEmpty = true;
        
            // Initialiser l'itérateur de cellules et vérifier la première cellule
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Inclure les cellules vides
        
            $firstCell = $cellIterator->current();
            $firstCellValue = $firstCell->getCalculatedValue();
        
            if (empty($firstCellValue)) {
                break; // Arrêter complètement le foreach si la première cellule est vide
            }
            // Parcourir les cellules maintenant
            foreach ($cellIterator as $cell) {
                $value = $cell->getCalculatedValue();
                if (!empty($value)) {
                    $isEmpty = false;
                }
                $rowData[] = $value;
            }
        
            // Ignorer les lignes vides
            if ($isEmpty) {
                continue;
            }
        
            // Récupérer par cellules pour insertion
            $INIT = $rowData[0];
            $NUM = $rowData[1];
            $NOM = $rowData[2];
            $PRENOM = $rowData[3];
            $Fonction = $rowData[4];
            $DN = Date::excelToDateTimeObject($rowData[5])->format('Y-m-d');
            $ADRESSE = $rowData[6];
            $CIN = $rowData[7];
            $DateEmb = Date::excelToDateTimeObject($rowData[8])->format('Y-m-d');
            $DD = $rowData[12];
            $SECTION = $rowData[13];
            $CLASS = $rowData[14];
            $Sal_Base = $rowData[15];
            $TH = $rowData[16];
            $INDICE = $rowData[17];
            $Sexe = $rowData[18];
            $NumCnaps = $rowData[19];
            $THS30 = $rowData[50];
            $THM40 = $rowData[53];
            $THS50 = $rowData[56];
            $THM50 = $rowData[59];
            $PETIT_NOM = $rowData[105];
            $Departement = $rowData[109];
            $MM = $rowData[110];
            $TYPE_CONTRAT = $rowData[111];
            $FIN_CONTRAT = "0000-00-00";//Date::excelToDateTimeObject($rowData[112])->format('Y-m-d');
            $ANCIENNETE = $rowData[119];
            //$THM100 = $rowData[132];
            //$THM100 = $TH*2;
        
            // Afficher les données pour test
            /*
            echo "<pre>";
            print_r([
                'INIT' => $INIT,
                'NUM' => $NUM,
                'NOM' => $NOM,
                'PRENOM' => $PRENOM,
                'Fonction' => $Fonction,
                'DN' => $DN,
                'ADRESSE' => $ADRESSE,
                'CIN' => $CIN,
                'DateEmb' => $DateEmb,
                'DD' => $DD,
                'SECTION' => $SECTION,
                'CLASS' => $CLASS,
                'Sal_Base' => $Sal_Base,
                'TH' => $TH,
                'INDICE' => $INDICE,
                'Sexe' => $Sexe,
                'NumCnaps' => $NumCnaps,
                'THS30' => $THS30,
                'THM40' => $THM40,
                'THS50' => $THS50,
                'THM50' => $THM50,
                'PETIT_NOM' => $PETIT_NOM,
                'Departement' => $Departement,
                'MM' => $MM,
                'TYPE_CONTRAT' => $TYPE_CONTRAT,
                'FIN_CONTRAT' => $FIN_CONTRAT,
                'ANCIENNETE' => $ANCIENNETE,
                'THM100' => $THM100,
            ]);
            echo "</pre>";*/
        
            // Création objet
            $new_obj = new _Controller($bdd);
            // Appeler la méthode GammeController pour insérer les données dans la base de données
            $new_obj->Extract_And_Insert_Employe(
                $INIT,
                $NUM,
                $NOM,
                $PRENOM,
                $Fonction,
                $DN,
                $ADRESSE,
                $CIN,
                $DateEmb,
                $DD,
                $SECTION,
                $CLASS,
                $Sal_Base,
                $TH,
                $INDICE,
                $Sexe,
                $NumCnaps,
                $THM50,
                $THM40,
                $THS50,
                $THS30,
                $PETIT_NOM,
                $Departement,
                $MM,
                $ContactEmploye = 0,
                $StatusEmploye = 'User',
                $MailEmploye = 0,
                $LieuNaissEmploye = 0,
                $EtatCivilEmploye = 0,
                $NbrEnfantEmploye = 0,
                $TYPE_CONTRAT,
                $TYPE_CONTRAT,
                $CDDMotifEmploye = 0,
                $QualificateEmploye = "Moyen",
                $NameContactEmergencyEmploye = "vide",
                $ContactEmergencyEmploye = "vide",
                $DescriEmploye = "RAS",
                $THM100 = $TH+$TH,
                $ANCIENNETE,
                $FIN_CONTRAT
            );
            $NUM = 0;
        }
        header('Location:ListEmploye');
    } 
    else {
        $titre = "Ajouter un nouveau employé .";

        $username = $_SESSION['pseudo'];

        $Photoname = $_SESSION['photoName'];

        $customizedCSS = "AddEmploye";

        require_once('views/viewAddEmploye.php');
    }
/*} else
header('Location:'.URL.'Accueil');
*/