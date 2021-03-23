<?php
//appel fichier externes
function autoloadClassModel($class)
{
    require_once 'controller/' . $class . '.class.php';
}
spl_autoload_register('autoloadClassModel');

//initialisation variable
$action = 'accueil';
// var_dump($_GET);
//gestion action
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


//effets des actions (traitements)

switch ($action) {
    case 'accueil':
        require('view/view_header.php');
        require('view/view_accueil.php');
        require('view/view_footer.php');
        break;

    case 'listejure':
        $listeJures = ControllerJure::afficherListeJure();
        require('view/view_header.php');
        require('view/view_listejure.php');
        require('view/view_footer.php');
        break;

    case 'addJure':
        if ($_GET['action'] = 'addjure') {
            $nomj = isset($_POST['nom']) ? $_POST['nom'] : null;

            // var_dump(isset($nomj));
            

            
            $nomj = isset($_POST['nom']) ? $_POST['nom'] : null;
            // var_dump(isset($nomj));
            $prenomj = isset($_POST['prenom']) ? $_POST['prenom'] : null;
            // var_dump(isset($prenomj));
            $adressej = isset($_POST['adresse']) ? $_POST['adresse'] : null;
            // var_dump(isset($adressej));
            $telj = isset($_POST['tel']) ? $_POST['tel'] : null;
            // var_dump(isset($telj));
            $portj = isset($_POST['port']) ? $_POST['port'] : null;
            // var_dump(isset($portj));
            $mailj = isset($_POST['mail']) ? $_POST['mail'] : null;
            // var_dump(isset($mailj));
            $vv = isset($_POST['vv']) ? true : false;
            // var_dump(isset($vv));
            $vc = isset($_POST['vc']) ? true : false;
            // var_dump(isset($vc));//entreprise 
            
            $nome = isset($_POST['nom_en']) ? $_POST['nom_en'] : NULL;
            // var_dump(isset($nome));
            $adressee = isset($_POST['adresse_en']) ? $_POST['adresse_en'] : NULL;
            // var_dump(isset($adressee));
            $tele = isset($_POST['tel_en']) ? $_POST['tel_en'] : NULL;
            // var_dump(isset($tele));
            $porte = isset($_POST['port_en']) ? $_POST['port_en'] : NULL;
            // var_dump(isset($porte));
            $maile = isset($_POST['mail_en']) ? $_POST['mail_en'] : NULL;
            // var_dump(isset($maile));
        }


        //verifie l'existence des variables mais pas la véracité
        if ((isset($nomj) and isset($prenomj) and isset($adressej) and isset($telj) and isset($portj) and isset($mailj) and isset($vv) and isset($vc) and isset($nome) and isset($adressee) and isset($tele) and isset($porte) and isset($maile))and ControllerJure::checkJure($nomj, $prenomj, $adressej, $telj, $portj, $mailj, $vv, $vc, $nome, $adressee, $tele, $porte, $maile)
        ) {
            // var_dump("hello!");
            ControllerJure::addJure($nomj, $prenomj, $adressej, $telj, $portj, $mailj, $vv, $vc, $nome, $adressee, $tele, $porte, $maile);
            print_r("a rediriger");
            
            break;
        }

        require('view/view_header.php');
        require('view/forms/view_form.php');
        require('view/view_footer.php');
        break;
}
