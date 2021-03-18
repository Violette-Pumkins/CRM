<?php
class Jure{
//initialise chaque variable de ma table
private $ID_Jure;
private $Nom;
private $Prenom;
private $Adresse_perso;
private $Tel_perso;
private $Portable_perso;
private $Mail_perso;

    /**
     * @param int $ID_Jure
     * @param string $Nom
     * @param string $Prenom
     * @param string $Adresse_perso
     * @param int $Tel_perso
     * @param int $Portable_perso
     * @param  string $Mail_perso
     * @param
     * @param
     * 
     * @return void
     */
        public function __construct(int $ID_Jure, string $Nom, string $Prenom, string $Adresse_perso, int $Tel_perso, int $Portable_perso, string $Mail_perso){
        
        $this->setID_Jure($ID_Jure);
        $this->setNom($Nom);
        $this->setPrenom($Prenom);
        $this->setAdresse_perso($Adresse_perso);
        $this->setTel_perso($Tel_perso);
        $this->setPortable_perso($Portable_perso);
        $this->setMail_perso($Mail_perso);
    }

    //getters
    public function getID_Jure() :int
    {
        return $this->ID_Jure;
    }

    public function getNom() :int
    {
        return $this->Nom;
    }

    public function getPrenom() :int
    {
        return $this->Prenom;
    }

    public function getAdresse_perso() :int
    {
        return $this->Adresse_perso;
    }

    public function getTel_perso() :int
    {
        return $this->Tel_perso;
    }

    public function getPortable_perso() :int
    {
        return $this->Portable_perso;
    }

    public function getMail_perso() :int
    {
        return $this->Mail_perso;
    }
//setters
    public function setID_Jure(string $ID_Jure)
    {
        $this->ID_Jure=$ID_Jure;
    }
    public function setNom(string $Nom)
    {
        $this->Nom=$Nom;
    }
    public function setPrenom(string $Prenom)
    {
        $this->Prenom=$Prenom;
    }
    public function setAdresse_perso(string $Adresse_perso)
    {
        $this->Adresse_perso=$Adresse_perso;
    }
    public function setTel_perso(string $Tel_perso)
    {
        $this->Tel_perso=$Tel_perso;
    }
    public function setPortable_perso(string $Portable_perso)
    {
        $this->Portable_perso=$Portable_perso;
    }
    public function setMail_perso(string $Mail_perso)
    {
        $this->Mail_perso=$Mail_perso;
    }


}
?>
