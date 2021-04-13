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
            require('view/baby_views/messages.php');
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
                // var_dump(isset($vv));
                $vc = isset($_POST['vc']) ? true : false;
                $ID_en = isset($_POST['ID_en']) ? $_POST['ID_en'] : null;
                
            }

            //verifie l'existence des variables mais pas la véracité
            if ((isset($nomj) and isset($prenomj) and isset($adressej) and isset($telj) and isset($portj) and isset($mailj) and isset($vv) and isset($vc) and isset($ID_en) and 
            ControllerJure::validateNumber($telj) and ControllerJure::validateNumber($portj)and
            ControllerJure::checkEmptyJure($nomj, $prenomj, $adressej, $telj, $portj, $mailj, $vv, $vc) and !ControllerJure::checkjure($mailj))
            ) {
                $coderetour=ControllerJure::addJure($nomj, $prenomj, $adressej, $telj, $portj, $mailj, $vv, $vc, $ID_en);

                if ($coderetour) {
                    header('Location: index.php?action=listejure');
                    // TODO : : penser a changer URL.
                    exit();
                    $_SESSION['Success'] = "L'ajout du juré à été réussit";
                    // Route('listejure');
                    break;
                }
                else{
                    $_SESSION['Erreur']="L'ajout à été problématique";
                    // TODO: changer le msg
                }
    
                break;
            }
                unset($_SESSION['jure']);
            
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
                unset($_SESSION['entreprise']);
        
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
            require('view/baby_views/messages.php');
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
                $nome = trim(isset($_POST['Nom_en'])) ? trim($_POST['Nom_en']): NULL;
                $adressee = isset($_POST['Adresse_en']) ? $_POST['Adresse_en'] : NULL;
                $tele = isset($_POST['Tel_en']) ? $_POST['Tel_en'] : NULL;
                $porte = isset($_POST['Port_en']) ? $_POST['Port_en'] : NULL;
                $maile = isset($_POST['Mail_en']) ? $_POST['Mail_en'] : NULL;
                // var_dump(isset($nome));
                // var_dump(isset($adressee)); 
                // var_dump(isset($tele)); 
                // var_dump(isset($porte)); 
                // var_dump(isset($maile)); 
                // var_dump(isset($ID_en)); 
                // var_dump(ControllerEntreprise::checkEmpty($nome, $adressee, $tele, $porte, $maile));
                $mail_valid_en=false;
                $nom_valid_en=false;
                if(isset($ID_en)){
                    $entreprise =ControllerEntreprise::getEntrepriseById($ID_en);
                    if (isset($entreprise) and count($entreprise)>0) {
                        $entreprise=$entreprise[0];
                        $mail_en=$entreprise['Mail_entreprise'];
                        $nom_en=$entreprise['Nom_entreprise'];
                        // var_dump($nome);
                        // var_dump($nom_en);
                        // var_dump($maile);
                        // var_dump($mail_en);

                        if(strcmp($maile, $mail_en)==0){
                            $mail_valid_en=true;
                            
                        }
                        // var_dump($mail_valid_en);
                        if(strcmp($nome, $nom_en)==0){
                            $nom_valid_en=true;
                        }
                        // var_dump($nom_valid_en);
                        // var_dump($mail_valid_en);
                    }else{
                        $mail_valid_en=!ControllerEntreprise::validatemail($maile);
                        $nom_valid_en=!ControllerEntreprise::validatename($nome);
                    }  
                }
                //verifie l'existence des variables mais pas la véracité
                if ((isset($ID_en) and isset($nome) and isset($adressee) and isset($tele) and isset($porte) and isset($maile)) and ControllerEntreprise::checkEmpty($nome, $adressee, $tele, $porte, $maile)
                and ($mail_valid_en or $nom_valid_en)
                ) 
                {
        
                    $coderetour = ControllerEntreprise::updateEntreprise($ID_en, $nome, $adressee, $tele, $porte, $maile);
                    if ($coderetour) {
                        unset($_SESSION['entreprise']);
                        header('Location: index.php?action=listeentreprise');
                        exit();
                        $_SESSION['Success']="La modification de l'entreprise à été réussit";
                        break;
                    }
                    else{
                        $_SESSION['Erreur']="La modification de l'entreprise à été problématique";
                    }
                }
                
    
                header('Location: index.php?action=listeentreprise');
                exit();
                
            }
            break;
        case 'updateJure':
            $ID_Jure = isset($_GET['ID_Jure']) ? $_GET['ID_Jure'] : NULL;
            //verifie l'existence des variables mais pas la véracité
            $jure=ControllerJure::getJureById($ID_Jure);
            // var_dump($jure);
            if (isset($jure) and count($jure)>0) {
                $_SESSION['jure']=$jure[0];
                // var_dump($jure[0]);
                require('view/view_header.php');
                require('view/forms/view_form.php');
                require('view/view_footer.php');
            }
            else{
                $ID_Jure=isset($_POST['ID_Jure']) ? $_POST['ID_Jure'] : null;
                // var_dump($ID_Jure);

                $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
                // var_dump($nom);
                $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
                // var_dump($prenom);
                $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
                // var_dump($adresse);
                $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
                // var_dump($tel);
                $port = isset($_POST['port']) ? $_POST['port'] : null;
                // var_dump($port);
                $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
                // var_dump($mail);
                $vv = isset($_POST['vv']) ? true : false;
                // var_dump($vv);
                $vc = isset($_POST['vc']) ? true : false;
                // var_dump($vc);
                $ID_en = isset($_POST['ID_en']) ? $_POST['ID_en'] : null;
                // var_dump($ID_en);
                
                // verifie l'existence des variables mais pas la véracité
                // var_dump(isset($ID_Jure));
                // var_dump(isset($nom));
                // var_dump(isset($prenom)); 
                // var_dump(isset($adresse)); 
                // var_dump(isset($tel)); 
                // var_dump(isset($port)); 
                // var_dump(isset($mail)); 
                // var_dump(isset($vv)); 
                // var_dump(isset($vc)); 
                // var_dump(isset($ID_en)); 
                // var_dump(ControllerJure::checkEmpty($nom, $prenom, $adresse, $tel, $port, $mail));
                
                $mail_valid=false;
                if(isset($ID_Jure)){
                    $jure=ControllerJure::getJureById($ID_Jure);
                    if (isset($jure) and count($jure)>0) {
                        $jure=$jure[0];

                        $mail_jure=$jure['Mail_perso'];
                        
                        if(strcmp($mail, $mail_jure)==0){
                            $mail_valid=true;
                        }else{
                        $mail_valid=!ControllerJure::checkjure($mail);
                        // var_dump($mail_valid);
                        // var_dump($mail_jure);
                        // var_dump($mail);
                        }
                    }
                }
                if ((isset($ID_Jure) and isset($nom) and isset($prenom) and isset($adresse) and isset($tel) and isset($port) and isset($mail) and isset($vv) and isset($vc) and isset($ID_en)) and ControllerJure::checkEmpty($nom, $prenom, $adresse, $tel, $port, $mail) 
                and $mail_valid
                ) {
                    // var_dump("hello!");
                    $coderetour = ControllerJure::updateJure($nom, $prenom, $adresse, $tel, $port, $mail, $vv, $vc, $ID_en, $ID_Jure);
                    
                    if ($coderetour) {
                        unset($_SESSION['jure']);
                        header('Location: index.php?action=listejure');
                        exit();
                        $_SESSION['Success']="La modification à été réussit";
                        break;
                    } else{
                        $_SESSION['Erreur']="La modification à été problématique";
                    }
                }
                header('Location: index.php?action=listejure');
                exit();
            }
            break;
            
}
