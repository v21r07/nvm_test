<?php
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'Search'){//recherhce d'employé
            require_once('controllers/controllerSearch.php');
        }
        elseif (preg_match_all('/FicheEmploye\//', $_GET['action'])) { //Extraction des NumMatriEmploye pour les informations
            $NumMatriEmploye = preg_replace('/FicheEmploye\//', '', $_GET['action']);
            require_once('controllers/controllerFicheEmploye.php');
        }else { //les autres actions'accueil,...
            if (file_exists('controllers/controller' . ucfirst($_GET['action']) . '.php')) {
                require_once('controllers/controller' . ucfirst($_GET['action']) . '.php');
            } else {
                throw new Exception('Page Introuvable');
            }
        }
    } else {
        header('Location:Promotion-Immobiliere');
    }
} catch (Exception $e) {
    $php_errormsg = $e->getMessage();
    require_once('views/viewError.php');
}