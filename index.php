<?php
    //appel fichier externes
    function autoloadClassModel($class){
        require_once 'controller/' . $class . '.class.php';
    }
    spl_autoload_register('autoloadClassModel');

    //initialisation variable
    $action='accueil';
    // var_dump($_GET);
    //gestion action
    if (isset($_GET['action'])) {
        $action=$_GET['action'];
    }


//effets des actions (traitements)

    switch($action){
        case 'accueil':
            require('view/view_header.php');
            require('view/view_accueil.php');
            require('view/view_footer.php');
            break;
        
        case 'listejure':
            $listeJures=ControllerJure::afficherListeJure();
            require('view/view_header.php');
            require('view/view_listejure.php');
            require('view/view_footer.php');
            break;
        
        case 'addJure':
            require('view/view_header.php');
            require('view/forms/view_form.php');
            require('view/view_footer.php');
            break;
        }


?>