<?php

require('entity/Jure.class.php');
require('controller/ControllerJure.class.php');
require('controller/BDCRM.class.php');

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
?>