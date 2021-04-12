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
    /**
     * check si champs vides
     *  @param $nom
     * @param $adresse
     * @param $tel
     * @param $port
     * @param $mail
     * @return bool
     */
    public static function checkEmpty( string $nom, string $adresse, string $tel, string $port, string $mail) :bool
    {
        if((strlen(trim($nom))>0 and strlen(trim($adresse))>0 and strlen(trim($tel))>0 and strlen(trim($port))>0 and strlen(trim($mail))>0)){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * @param $field
     * @return bool
     */
    public static function validateNumber(string $field) :bool
    {
        return is_numeric($field) and strlen($field)>9 and strlen($field)<12;
    }
/**
 * @param $nom
 * @param $adresse
 * @param $tel
 * @param $port
 * @param $mail
 * return bool
 */
    public static function addEntreprise(string $nom, string $adresse, string $tel, string $port, string $mail):bool
    { 
        if(!ControllerEntreprise::validatemail($mail) or !ControllerEntreprise::validatename($nom)){
            // var_dump("hello");
            $sql= 'INSERT INTO `entreprise`(`Nom_entreprise`, `Adresse_entreprise`, `Tel_entreprise`, `Port_entreprise`, `Mail_entreprise`) VALUES (:nom_en, :adresse_en, :tel_en, :port_en, :mail_en)';

            try{
                // echo"hello";
                $co=BDCRM::getConnexion();
                // echo"hello";
                $res=$co->prepare($sql);
                $res->execute(array(':nom_en'=>$nom, ':adresse_en'=>$adresse, ':tel_en'=>$tel, ':port_en'=>$port, ':mail_en'=>$mail));
                $res->closeCursor();
                BDCRM::disconnect();
                // var_dump("goodbye");
                return true;

            }catch(PDOException $e){
                die('<h1>Erreur lecture en BDD-addentreprise</h1>'. $e->getMessage());
            }
        }else {
            $_SESSION['Erreur']="Entreprise invalide";
        } 
        return false;
    }
/**
 * controlle doublon de noms
 * @param $nom
 * @return bool
 */
    public static function validatename(string $nom):bool
    {
        $codereturn=false;
        
        $sql='SELECT * FROM entreprise WHERE Nom_entreprise LIKE :nom_en'; 
        
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array(':nom_en'=>$nom));

            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();

            $codereturn=count($records)>0;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-validatename</h1>'. $e->getMessage());
        }
            return $codereturn; 
    }
    /**
 * controlle doublon de mails
 * @param $mail
 * @return bool
 */
    public static function validatemail(string $mail):bool
    {
        $codereturn=false;
        
        $sql='SELECT * FROM entreprise WHERE Mail_entreprise LIKE :mail_en'; 
        
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array(':mail_en'=>$mail));

            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();

            $codereturn=count($records)>0;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-validatemail</h1>'. $e->getMessage());
        }
            return $codereturn; 
    }
    /**
     * check si jure est affilié a une session
     *
     * @param string $ID_en
     * @return bool
     */
    public static function checkAnyJureInEntreprise(string $ID_en):bool
    {
        $sql= ('SELECT j.ID_Jure, e.id_entreprise FROM jure j JOIN entreprise e ON e.id_entreprise = j.id_entreprise WHERE j.id_entreprise LIKE :ID_en');
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array( ':ID_en'=>$ID_en));
            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();
            // var_dump($records);

            return isset($records) and (count($records)>0);

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-deleteJure</h1>'. $e->getMessage());
        }
        return false;
    }
    /**
     * récupère l'id de l'ntreprise
     *
     * @param $ID_en
     * @return null
     */
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
    /**
     * récupère l'id du juré
     *
     * @param string $ID_Jure
     * @return null
     */
    public static function getJureById(string $ID_Jure)
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
    /**
     * supprime une entreprise
     *
     * @param string $ID_en
     * @return bool
     */
    public static function deleteEntreprise(string $ID_en):bool
    {
        $entreprise=ControllerEntreprise::getEntrepriseById($ID_en);

        if(isset($entreprise) and count($entreprise)>0 and !ControllerEntreprise::checkAnyJureInEntreprise($ID_en)){

            $sql= ('DELETE FROM `entreprise` WHERE id_entreprise LIKE :ID_en');
            
            try{
                // var_dump("hello");
                $co=BDCRM::getConnexion();
                $res=$co->prepare($sql);
                // var_dump("suppression");
                $res->execute(array(':ID_en'=>$ID_en));
                $res->closeCursor();
                BDCRM::disconnect();
                // var_dump("goodbye");
                return true;

            }
            catch(PDOException $e){
                die('<h1>Erreur lecture en BDD-deleteEntreprise</h1>'. $e->getMessage());
            }

        } else{
            $_SESSION['Erreur']="La suppression à été problématique";
            }
        return false;
    }
    /**
     * modifie entreprise
     *
     * @param string $ID_en
     * @param string $nom_en
     * @param string $adresse_en
     * @param int $tel_en
     * @param int $port_en
     * @param string $mail_en
     * @return boolean
     */
    public static function updateEntreprise(string $ID_en, string $nom_en, string $adresse_en, int $tel_en, int $port_en, string $mail_en):bool
    {  
        if(!ControllerEntreprise::validatemail($mail_en) or !ControllerEntreprise::validatename($nom_en)){
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
        }else {
            $_SESSION['Erreur']="Entreprise invalide";
        } 
        return false;
    }


}
?>