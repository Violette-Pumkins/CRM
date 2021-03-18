<?php


    class BDCRM{

        private static $connexion;
        private $error;
        


        /**
        *constructeur implicite
        * 
        */

        // public function __construct(PDO $connexion);
                
        //     $this->connexion=$connexion;
            
        // }



        /**
        * fonction connection BDD
        */
        private static function connect(){
            $paramini= parse_ini_file('param/param.ini', true);
            // $host=$paramini['host'];
            // $bdd=$paramini['bdd'];
            // $user=$paramini['user'];
            // $pass=$paramini['pass'];
            extract($paramini['connexion bdd']);
            $dsn='mysql:host='.$host."; port=".$port ."; dbname=".$bdd ."; charset=UTF8";
            var_dump($dsn);
            
            try{

            $PDO= new PDO($dsn, $user, $pass, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
            }
            catch(PDOException $e){
                die('<h1>Erreur de connexion: </h1>'.$e->getMessage());
            }
            BDCRM::$connexion=$PDO;
            return BDCRM::$connexion;
            var_dump($connexion);
            



        } 


        /**
        * fonction déconnection BDD
        */
        public static function disconnect(){
            BDCRM::$connexion=NULL;
        }

        /**
        * pattern singleton
        */

        public static function getConnexion(){
            if(BDCRM::$connexion != NULL){
                return BDCRM::$connexion;
            }
            else{
                return BDCRM::connect();
            }
        }


    }

?>