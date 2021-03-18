<?php
class controllerjure{

    /**
     * @param $choix
     * @return void
     */
        function getListePilotes($choix=PDO::FETCH_ASSOC){
        $sql=' SELECT * FROM jure ORDER BY ID_Jure ASC'; 
        try{
        $res=DBAirDi::getConnexion()->query($sql);
            var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'pilote', ['pil', 'pilNom', 'adr']);
                break;
            }

            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            DBAirDi::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD</h1>'. $e->getMessage());
        }
        return $records;
    }
}
?>