<?php
    //appel fichier externes
    function autoloadClassModel($class){
        global $nameApp;
        require_once $nameApp . '/model/' . $class . '.class.php';
}
spl_autoload_register('autoloadClassModel');

    //initialisation variable
    $action='accueil';
    var_dump($_GET);
    //gestion action
    if (isset($_GET['action'])) {
        $action=$_GET['action'];
    }
    if ($action=='listejure' ) {
        $ID_Jure=$_GET['ID_Jure'];
        $Nom=$_GET['Nom'];
        $Prenom=$_Get['Prenom'];
        $Adresse_perso=$_Get['Adresse_perso'];
        $Tel_perso=$_Get['Tel_Perso'];
        $Portable_perso=$_Get['Portable_Perso'];
        $Mail_perso=$_Get['Mail_perso'];
    }


//effets des actions (traitements)
    switch($action){
        case 'accueil':
            require('view/view_header.php');
            require('view/view_accueil.php');
            require('view/view_footer.php');
            break;
        
        case 'listejure':
            $listeJures=afficherListeJure($choix);
            require('view/view_header.php');
            require('view/view_listejure.php');
            require('view/view_footer.php');
            break;
        }


?>