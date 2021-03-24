<?php

require('entity/Jure.class.php');
require('controller/ControllerJure.class.php');
require('controller/BDCRM.class.php');
require('controller/ControllerEntreprise.class.php');
require('entity/Entreprise.class.php');

    class Assert
    {
        public static function AreEqual( $a, $b )
        {
            if ( $a != $b )
            {
                throw new Exception( 'Subjects are not equal.' );
            }
        }
    }
$ID_Jure=10;
$Nom='Nom';
$Prenom='Prenom';
$Adresse_perso='Adresse_perso';
$Tel_perso='0232545587';
$Portable_perso='0623338546';
$Mail_perso='Mail_perso';


$test_jure= new Jure($ID_Jure, $Nom, $Prenom, $Adresse_perso, $Tel_perso, $Portable_perso, $Mail_perso);


    // try {
    //     Assert::AreEqual( $test_jure->getID_Jure(), $ID_Jure );
    //     echo '✔️'.$test_jure->getID_Jure().'et'.$ID_Jure.'sont égaux'.'<br/>';
    // } catch (Exception $e) {
    //     echo '❌ Caught exception: ',  $e->getMessage(), "<br/>";
   //}
$ID_en=10;
$Nom_en='Nom_en';
$Adresse_en='Adresse_en';
$Tel_en='0232545587';
$Portable_en='0623338546';
$Mail_en='mail_en';


$test_en= new Entreprise($ID_en, $Nom_en, $Adresse_en, $Tel_en, $Portable_en, $Mail_en);


    try {
        Assert::AreEqual( $test_en->getNom_en(), $Nom_en );
        echo '✔️'.$test_en->getNom_en().' et '.$Nom_en.'sont égaux'.'<br/>';
    } catch (Exception $e) {
        echo '❌ Caught exception: ',  $e->getMessage(), "<br/>";
    }
?>