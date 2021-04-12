<?php

//appel fichier externes
function autoloadClassModel($class)
{
    require_once 'controller/' . $class . '.class.php';
}
spl_autoload_register('autoloadClassModel');

//initialisation variable
session_start();
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

                $prenomj = isset($_POST['prenom']) ? $_POST['prenom'] : null;
            
                $adressej = isset($_POST['adresse']) ? $_POST['adresse'] : null;
                
                $telj = isset($_POST['tel']) ? $_POST['tel'] : null;

                $portj = isset($_POST['port']) ? $_POST['port'] : null;
    
                $mailj = isset($_POST['mail']) ? $_POST['mail'] : null;
    
                $vv = isset($_POST['vv']) ? true : false;

                $vc = isset($_POST['vc']) ? true : false;

                $ID_en = isset($_POST['ID_en']) ? $_POST['ID_en'] : null;
            }
            
            
                //verifie l'existence des variables mais pas la véracité
                if ((isset($nomj) and isset($prenomj) and isset($adressej) and isset($telj) and isset($portj) and isset($mailj) and isset($vv) and isset($vc) and isset($ID_en)
                and 
                ControllerJure::validateNumber($telj) and ControllerJure::validateNumber($portj)and
                ControllerJure::checkEmptyJure($nomj, $prenomj, $adressej, $telj, $portj, $mailj, $vv, $vc) and !ControllerJure::checkjure($mailj)
                )
                ) {
                    $coderetour=ControllerJure::addJure($nomj, $prenomj, $adressej, $telj, $portj, $mailj, $vv, $vc, $ID_en);

                    if ($coderetour) {
                        header('Location: index.php?action=listejure');
                        // TODO : : penser a changer URL.
                        exit();
                        $_SESSION['Success']="L'ajout à été réussit";
                        // Route('listejure');
                        break;
                    }
                    else{
                        $_SESSION['Erreur']="L'ajout à été problématique";
                        // TODO: changer le msg
                    }
    
                break;
                }
            require('view/view_header.php');
            require('view/forms/view_form.php');
            require('view/view_footer.php');
            break;
    
    
        case 'addEn':
            if ($_GET['action'] = 'addEn') {
                // $_SESSION['entreprise'];
    
                $nome = isset($_POST['Nom_en']) ? $_POST['Nom_en'] : NULL;
                
                $adressee = isset($_POST['Adresse_en']) ? $_POST['Adresse_en'] : NULL;
                
                $tele = isset($_POST['Tel_en']) ? $_POST['Tel_en'] : NULL;
                
                $porte = isset($_POST['Port_en']) ? $_POST['Port_en'] : NULL;
                
                $maile = isset($_POST['Mail_en']) ? $_POST['Mail_en'] : NULL;
                
            }
            //verifie l'existence des variables mais pas la véracité
            if (
                (isset($nome) and isset($adressee) and isset($tele) and isset($porte) and isset($maile)) and ControllerEntreprise::checkEmpty($nome, $adressee, $tele, $porte, $maile)  and 
                ControllerEntreprise::validateNumber($tele) and 
                ControllerEntreprise::validateNumber($porte) and 
                !ControllerEntreprise::validatename($nome)
                and !ControllerEntreprise::validatemail($maile)
            ) {
    
                $coderetour = ControllerEntreprise::addEntreprise($nome, $adressee, $tele, $porte, $maile);
                if ($coderetour) {
                    header('Location: index.php?action=listeentreprise');
                    
                    exit();
                    $_SESSION['Success']="L'ajout à été réussit";
                    
                    break;
                }
                else{
                    $_SESSION['Erreur']="L'ajout à été problématique";
                    
                }
            }
            require('view/view_header.php');
            require('view/forms/view_form_en.php');
            require('view/view_footer.php');
            break;
        case 'deleteJure':
            if(isset($_POST['ID_Jure'])){
                $ID = $_POST['ID_Jure'];
                $coderetour = ControllerJure::deleteJure($ID);
            }
                header('Location: index.php?action=listejure');
                exit();
            break;

        case'confirm':
            require('view/view_header.php');
            require('view/baby_views/confirm.php');
            require('view/view_footer.php');
            break;
        
        case 'listeentreprise':
            $listeEns = ControllerEntreprise::afficherListeEntreprise();
            require('view/view_header.php');
            require('view/view_listeentreprise.php');
            require('view/view_footer.php');
            break;

        case 'deleteEntreprise':
            if(isset($_POST['ID_en'])){
                $ID_en = $_POST['ID_en'];
                $coderetour = ControllerEntreprise::deleteEntreprise($ID_en);
            }
                header('Location: index.php?action=listeentreprise');
                exit();
            break;
        case 'updateEntreprise':
                $ID_en = isset($_GET['ID_en']) ? $_GET['ID_en'] : NULL;
            //verifie l'existence des variables mais pas la véracité
            $entreprise=ControllerEntreprise::getEntrepriseById($ID_en);
            // var_dump($entreprise);
            if (isset($entreprise) and count($entreprise)>0) {
                $_SESSION['entreprise']=$entreprise[0];
                require('view/view_header.php');
                require('view/forms/view_form_en.php');
                require('view/view_footer.php');
            }
            else{
                $ID_en=isset($_POST['ID_en']) ? $_POST['ID_en'] : NULL;
                $nome = isset($_POST['Nom_en']) ? $_POST['Nom_en'] : NULL;
                $adressee = isset($_POST['Adresse_en']) ? $_POST['Adresse_en'] : NULL;
                $tele = isset($_POST['Tel_en']) ? $_POST['Tel_en'] : NULL;
                $porte = isset($_POST['Port_en']) ? $_POST['Port_en'] : NULL;
                $maile = isset($_POST['Mail_en']) ? $_POST['Mail_en'] : NULL;
                //verifie l'existence des variables mais pas la véracité
                if ((isset($ID_en) and isset($nome) and isset($adressee) and isset($tele) and isset($porte) and isset($maile)) and ControllerEntreprise::checkEmpty($nome, $adressee, $tele, $porte, $maile) and 
                !ControllerEntreprise::validatename($nome)
                and !ControllerEntreprise::validatemail($maile)
                ) {
        
                    $coderetour = ControllerEntreprise::updateEntreprise($ID_en, $nome, $adressee, $tele, $porte, $maile);
                    if ($coderetour) {
                        unset($_SESSION['entreprise']);
                        header('Location: index.php?action=listeentreprise');
                        exit();
                        $_SESSION['Success']="L'ajout à été réussit";
                        break;
                    }
                    else{
                        $_SESSION['Erreur']="L'ajout à été problématique";
                    }
                }
                else{
                    unset($_SESSION['entreprise']);
                }
                header('Location: index.php?action=listeentreprise');
                exit();
                
            }
            break;
        case 'updateJure':
            $ID_Jure = isset($_GET['ID_Jure']) ? $_GET['ID_Jure'] : NULL;
            //verifie l'existence des variables mais pas la véracité
            $jure=ControllerJure::getJureById($ID_Jure);
            if (isset($jure) and count($jure)>0) {
                $_SESSION['jure']=$jure[0];
                require('view/view_header.php');
                require('view/forms/view_form.php');
                require('view/view_footer.php');
            }else{

                $ID_Jure=isset($_POST['ID_Jure']) ? $_POST['ID_Jure'] : NULL;
                
                $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
                
                $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
                
                $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
                
                $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
                
                $port = isset($_POST['port']) ? $_POST['port'] : null;
                
                $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
                
                $vv = isset($_POST['vv']) ? true : false;
                
                $vc = isset($_POST['vc']) ? true : false;
                
                $ID_en = isset($_POST['ID_en']) ? $_POST['ID_en'] : null;
                
                // verifie l'existence des variables mais pas la véracité
                if ((isset($ID_Jure) and isset($nom) and isset($prenom) and isset($adresse) and isset($tel) and isset($port) and isset($mail) and isset($vv) and isset($vc) and isset($ID_en)) and ControllerJure::checkEmpty($nom, $prenom, $adresse, $tel, $port, $mail) and !ControllerJure::checkjure($mail)
                //validate field non fonctionnel mais ne dérange pas le retse. a rendre ok.
                ) {
                    
        
                    $coderetour = ControllerJure::updateJure($nom, $prenom, $adresse, $tel, $port, $mail, $vv, $vc, $ID_en, $ID_Jure);
                    if ($coderetour) {
                        unset($_SESSION['jure']);
                        header('Location: index.php?action=listejure');
                        exit();
                        $_SESSION['Success']="La modification à été réussit";
                        break;
                    }
                    else{
                        $_SESSION['Erreur']="La modification à été problématique";
                    }
                }
                else{
                    unset($_SESSION['jure']);
                }
                header('Location: index.php?action=listejure');
                exit();
            }
}
