<?php

class Controllerjure{

    /**
     * @param $choix
     * @return void
     */
    public static function afficherListeJure($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM jure ORDER BY ID_Jure ASC'; 
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
            die('<h1>Erreur lecture en BDD</h1>'. $e->getMessage());
        }
        return $records;
    }

    /**
     * @param $choix
     * @return void
     */
    public static function addJure( string $nomj, string $prenomj, string $adressej, string $telj, string $portj, string $mailj, bool $vv, bool $vc, string $ID_en)
    {
        if(!ControllerJure::validatemail($mailj))
        {
            //create request insert entreprise et insert juré
            $sql= 'INSERT INTO `jure`(`Nom`, `Prenom`, `Adresse_perso`, `Tel_perso`, `Portable_perso`, `Mail_perso`, `Visible_sur_VALCE`, `Visible_sur_CERES`, `id_entreprise`) VALUES (:nom, :prenom, :adresse, :tel, :port, :mail, :vv, :vc, :id_en)';
            try{
                $co=BDCRM::getConnexion();
                $res=$co->prepare($sql);
                
                $res->execute(array(
                    ':nom'=> $nomj,
                ':prenom'=> $prenomj,
                ':adresse'=> $adressej,
                ':tel'=> $telj,
                ':port'=> $portj,
                ':mail'=> $mailj, 
                ':vv'=>  $vv ? "1" : "0",
                ':vc'=> $vc ? "1" : "0",
                ':id_en'=>$ID_en
            ));
                $res->closeCursor();
                BDCRM::disconnect();
                
                return true;
            }catch(PDOException $e){
                die('<h1>Erreur lecture en BDD-addJure</h1>'. $e->getMessage());
            }
        }
        else{
            $_SESSION['Erreur']="Juré invalide";
        }   
        return false;
    }
    public function validatemail($field)
    {
        $codereturn=false;
        
        $sql='SELECT * FROM jure WHERE Mail_perso LIKE :mail'; 
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array(':mail'=>$field));

            $records=$res->fetchAll();
            $res->closeCursor();
            BDCRM::disconnect();

            $codereturn=count($records)>0;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-checkentreprise</h1>'. $e->getMessage());
        }
            return $codereturn; 
    }

    public static function checkEmptyJure(string $nomj, string $prenomj, string $adressej, string $telj, string $portj, string $mailj, bool $vv, bool $vc) :bool
    {
        if((strlen(trim($nomj))>0 and strlen(trim($prenomj))>0 and strlen(trim($adressej))>0 and strlen(trim($telj))>0 and strlen(trim($portj))>0 and strlen(trim($mailj))>0)){ 
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
    public static function checkEmpty( string $nom, string $prenom, string $adresse, string $tel, string $port, string $mail) :bool
    {
        if((strlen(trim($nom))>0 and strlen(trim($prenom))>0 and strlen(trim($adresse))>0 and strlen(trim($tel))>0 and strlen(trim($port))>0 and strlen(trim($mail))>0)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function checkentrepriseID(string $ID):bool
    {
        $codereturn=false;
        
        $sql='SELECT * FROM entreprise WHERE id_entreprise LIKE :ID_en'; 
        
        try{
            $ID_int=intval($ID);
            if($ID_int>0){
                $co=BDCRM::getConnexion();
                $res=$co->prepare($sql);
                $res->execute(array('ID_en'=>$ID_int));

                $records=$res->fetchAll();
                $res->closeCursor();
                BDCRM::disconnect();

                $codereturn=count($records)>0;
            }
        }catch(Exception $e){
            die('<h1>Erreur lecture en BDD-checkentreprise</h1>'. $e->getMessage());
        }


            return $codereturn; 
    
        
    }
    public function checkAnySessionInJure($ID_Jure)
    {
        $sql= ('SELECT j.ID_Jure FROM jure j JOIN participe p ON j.ID_Jure = p.ID_Jure WHERE p.ID_Jure LIKE :ID_Jure');
        try{
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            $res->execute(array( ':ID_Jure'=>$ID_Jure));
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
    public static function deleteJure(string $ID_Jure)
    {
        $jure=ControllerJure::getJureById($ID_Jure);

        if(isset($jure) and count($jure)>0 and !ControllerJure::checkAnySessionInJure($ID_Jure)){

            $sql= ('DELETE FROM jure WHERE ID_Jure = :ID_Jure');
            try{
                $co=BDCRM::getConnexion();
                $res=$co->prepare($sql);
                $res->execute(array(':ID_Jure'=>$ID_Jure));
                $res->closeCursor();
                BDCRM::disconnect();
                return true;

            }catch(PDOException $e){
                
                die('<h1>Erreur lecture en BDD-deleteJure/session</h1>'. $e->getMessage());
            }
        }else{
            $_SESSION['Erreur']="La suppression à été problématique";
        }
            return false;
        
    }   
    public static function updateJure( $nom, $prenom, $adresse, $tel, $port, $mail, $vv, $vc, $ID_en, $ID_Jure)
    {
        $sql= 'UPDATE `jure` SET `Nom`= :nom,`Prenom`= :prenom,`Adresse_perso`= :adresse,`Tel_perso`= :tel,`Portable_perso`= :port,`Mail_perso`= :mail,`Visible_sur_VALCE`= :vv,`Visible_sur_CERES`= :vc,`id_entreprise`= :ID_en WHERE `ID_Jure` LIKE :ID_Jure';
        try{
            // var_dump("hello");
            $co=BDCRM::getConnexion();
            $res=$co->prepare($sql);
            // var_dump("hello");
            $res->execute(array(':nom'=>$nom, ':prenom'=>$prenom, ':adresse'=>$adresse, ':tel'=>$tel, ':port'=>$port,':mail'=>$mail, ':vv'=>  $vv ? "1" : "0", ':vc'=> $vc ? "1" : "0", ':ID_en'=>$ID_en, ':ID_Jure'=>$ID_Jure ));
            $res->closeCursor();
            BDCRM::disconnect();
            // var_dump("goodbye");
            return true;

        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-updateJure</h1>'. $e->getMessage());
        }
        return false;
    }

}
?>