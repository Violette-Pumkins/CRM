<?php
    //appel fichier externes

    //initialisation variable
    $action='accueil';
    var_dump($_GET);
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
        }


?>