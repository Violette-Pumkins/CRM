<?php
class Entreprise{
    //initialise chaque variable de ma table
    private $ID_en;
    private $Nom_en;
    private $Adresse_en;
    private $Tel_en;
    private $Port_en;
    private $Mail_en;

    /**
     * @param string $ID_en
     * @param string $Nom_en
     * @param string $Adresse_en
     * @param string $Tel_en
     * @param string $Port_en
     * @param string $Mail_en
     * 
     * @return void
     */
        public function __construct(string $ID_en, string $Nom_en, string $Adresse_en, string $Tel_en, string $Port_en, string $Mail_en ){

            $this->setID_en(intval($ID_en));
            $this->setNom_en($Nom_en);
            $this->setAdresse_en($Adresse_en);
            $this->setTel_en(strval($Tel_en));
            $this->setPort_en(strval($Port_en));
            $this->setMail_en($Mail_en);
    }
    //getters
    public function getID_en() :string
    {
        return $this->ID_en;
    }

    public function getNom_en() :string
    {
        return $this->Nom_en;
    }

    public function getAdresse_en() :string
    {
        return $this->Adresse_en;
    }

    public function getTel_en() :string
    {
        return $this->Tel_en;
    }

    public function getPort_en() :string
    {
        return $this->Port_en;
    }

    public function getMail_en() :string
    {
        return $this->Mail_en;
    }
//setters
    public function setID_en(string $ID_en)
    {
        $this->ID_en=$ID_en;
    }
    public function setNom_en(string $Nom_en)
    {
        $this->Nom_en=$Nom_en;
    }
    public function setAdresse_en(string $Adresse_en)
    {
        $this->Adresse_en = $Adresse_en;
    }
    public function setTel_en(string $Tel_en)
    {
        $this->Tel_en = $Tel_en;
    }
    public function setPort_en(string $Port_en)
    {
        $this->Port_en=$Port_en;
    }
    public function setMail_en(string $Mail_en)
    {
        $this->Mail_en=$Mail_en;
    }


}
?>
