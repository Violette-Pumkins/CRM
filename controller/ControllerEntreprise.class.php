<?php
class ControllerEntreprise{

    /**
     * @param $choix
     * @return void
     */
    public static function afficherListeEntreprise($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM entreprise ORDER BY ID_Entreprise ASC'; 
        try{
        $res=BDCRM::getConnexion()->query($sql);
            // var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'jure', ['ID_Jure', 'Nom', 'Prenom', 'Adresse_perso', 'Tel_perso', 'Portable_perso', 'Mail_perso', 'Visible_sur_VALCE', 'Visible_sur_CERES', 'id_entreprise']);
                break;
            }
            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            BDCRM::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-afficherlisteentreprise</h1>'. $e->getMessage());
        }
        return $records;
    }
    public static function validateField(string $field): bool
    { 
        if( preg_match('/[\'^£$%&"\\\/:;*()}{#~?><>|=_+]/', $field) or strlen(trim($field))<1){
            return false;
        }
        else{
            return true;
        }
    }
    public static function validateTest(string $field): bool
    {
        if(strcmp("test", $field) !== 0){
            return false;
        }
        // if(!ControllerJure::checkentreprise($field)){
        //     return false;
        // }
        else{
            return true;
        }
    }
    public static function checkEmpty( string $nom, string $adresse, string $tel, string $port, string $mail) :bool
    {
        if((strlen(trim($nom))>0 and strlen(trim($adresse))>0 and strlen(trim($tel))>0 and strlen(trim($port))>0 and strlen(trim($mail))>0)){
            return true;
        }
        else{
            return false;
        }
    }
    public static function validateNumber(string $field) :bool
    {
        return is_numeric($field) and strlen($field)>9 and strlen($field)<12;
    }

    public static function addEntreprise(string $nom, string $adresse, string $tel, string $port, string $mail)
    {
        $sql= 'INSERT INTO `entreprise`(`Nom_entreprise`, `Adresse_entreprise`, `Tel_entreprise`, `Port_entreprise`, `Mail_entreprise`) VALUES (:nom_en, :adresse_en, :tel_en, :port_en, :mail_en)';

        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array(':nom_en'=>$nom, ':adresse_en'=>$adresse, ':tel_en'=>$tel, ':port_en'=>$port, ':mail_en'=>$mail));
            $res->closeCursor();
            BDCRM::disconnect();
            return true;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-addentreprise</h1>'. $e->getMessage());
        }
        return false;
    }

    public static function checkentreprise(string $nom, string $adresse, string $tel, string  $port, string $mail):bool
    {
        $codereturn=false;
        
        $sql='SELECT * FROM entreprise WHERE Nom_entreprise LIKE :nom_en AND Adresse_entreprise LIKE :adresse_en AND Tel_entreprise LIKE :tel_en AND Port_entreprise LIKE :port_en AND Mail_entreprise LIKE :mail_en'; 
        
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array(':nom_en'=>$nom, ':adresse_en'=>$adresse, ':tel_en'=>$tel, ':port_en'=>$port, ': mail_en'=>$mail));

            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();

            $codereturn=count($records)>0;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-checkentreprise</h1>'. $e->getMessage());
        }


            return $codereturn; 
    
        
    }
    public static function checkAnyJureInEntreprise($ID_en)
    {
        $sql= ('SELECT j.ID_Jure, e.id_entreprise FROM jure j JOIN entreprise e ON e.id_entreprise = j.id_entreprise WHERE j.id_entreprise LIKE :ID_en');
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array( ':ID_en'=>$ID_en));
            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();
            var_dump($records);
            return isset($records) and (count($records)>0);

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-deleteJure</h1>'. $e->getMessage());
        }
        return false;
    }
    public static function getEntrepriseById($ID_en)
    {
        $sql= ('SELECT * FROM entreprise WHERE id_entreprise LIKE :ID_en');
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array(':ID_en'=>$ID_en));
            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();
            return $records;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-deleteJure</h1>'. $e->getMessage());
        }
        return NULL;
    }
    public static function getJureById($ID_Jure)
    {
        $sql= ('SELECT * FROM jure WHERE ID_Jure LIKE :ID_Jure');
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array(':ID_Jure'=>$ID_Jure));
            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();
            return $records;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD- get jure by id</h1>'. $e->getMessage());
        }
        return NULL;
    }

    public static function deleteEntreprise(string $ID_en)
    {
        $entreprise=ControllerEntreprise::getEntrepriseById($ID_en);

        if(isset($entreprise) and count($entreprise)>0 and !ControllerEntreprise::checkAnyJureInEntreprise($ID_en)){

            $sql= ('DELETE FROM `entreprise` WHERE id_entreprise LIKE :ID_en');
            
            try{
                var_dump("hello");
                $co=BDCRM::getConnexion();
                $res=$co->prepare($sql);
                var_dump("suppression");
                $res->execute(array(':ID_en'=>$ID_en));
                $res->closeCursor();
                BDCRM::disconnect();
                var_dump("goodbye");
                return true;

            }catch(PDOException $e){
                die('<h1>Erreur lecture en BDD-deleteJure</h1>'. $e->getMessage());
            }

        } else{
            $_SESSION['Erreur']="La suppression à été problématique";
            }
        return false;
    }
    public static function updateEntreprise($ID_en, $nom_en, $adresse_en, $tel_en, $port_en, $mail_en)
    {
        $sql= 'UPDATE `entreprise` SET `Nom_entreprise`= :nom_en,`Adresse_entreprise`= :adresse_en,`Tel_entreprise`= :tel_en,`Port_entreprise`= :port_en,`Mail_entreprise`= :mail_en WHERE id_entreprise LIKE :ID_en';
        try{
            // var_dump("hello");
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            // var_dump("billy");
            $res->execute(array(':nom_en'=>$nom_en, ':adresse_en'=>$adresse_en, ':tel_en'=>$tel_en, ':port_en'=>$port_en,':mail_en'=>$mail_en, ':ID_en'=>$ID_en ));
            $res->closeCursor();
            BDCRM::disconnect();
            // var_dump("goodbye");
            return true;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-deleteJure</h1>'. $e->getMessage());
        }
        return false;
    }


}
?>