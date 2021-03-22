<?php
class Controllerjure{

    /**
     * @param $choix
     * @return void
     */
        public static function afficherListeJure($choix=PDO::FETCH_ASSOC){
        $sql='SELECT * FROM jure ORDER BY ID_Jure ASC'; 
        try{
        $res=BDCRM::getConnexion()->query($sql);
            var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'jure', ['ID_Jure', 'Nom', 'Prenom', 'Adresse_perso', 'Tel_perso', 'Portable_perso', 'Mail_perso', 'Visible_sur_VALCE', 'Visible_sur_CERES', 'id_entreprise']);
                break;
            }

            $records=$res->fetchAll();
            var_dump($records);
            $res->closeCursor();
            BDCRM::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD</h1>'. $e->getMessage());
        }
        return $records;
    }
}
?>