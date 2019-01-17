<?php
/**
 * Created by PhpStorm.
 * User: 302025627
 * Date: 16-1-2019
 * Time: 09:10
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="instructeur")
 */
class Instructeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $loginnaam;
    /**
     * @ORM\Column(type="string")
     */
    private $wachtwoord;
    /**
     * @ORM\Column(type="string")
     */
    private $naam;
    /**
     * @ORM\Column(type="string")
     */
    private $tussenvoegsel;
    /**
     * @ORM\Column(type="string")
     */
    private $achternaam;
    /**
     * @ORM\Column(type="string")
     */
    private $geboortedatum;
    /**
     * @ORM\Column(type="string")
     */
    private $aanneem_datum;
    /**
     * @ORM\Column(type="string")
     */
    private $salaris;
    /**
     * @ORM\Column(type="string")
     */
    private $persoonsnummer;

    /**
     * @return mixed
     */
    public function getLoginnaam()
    {
        return $this->loginnaam;
    }

    /**
     * @param mixed $loginnaam
     */
    public function setLoginnaam($loginnaam)
    {
        $this->loginnaam = $loginnaam;
    }

    /**
     * @return mixed
     */
    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }

    /**
     * @param mixed $wachtwoord
     */
    public function setWachtwoord($wachtwoord)
    {
        $this->wachtwoord = $wachtwoord;
    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getTussenvoegsel()
    {
        return $this->tussenvoegsel;
    }

    /**
     * @param mixed $tussenvoegsel
     */
    public function setTussenvoegsel($tussenvoegsel)
    {
        $this->tussenvoegsel = $tussenvoegsel;
    }

    /**
     * @return mixed
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * @param mixed $achternaam
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;
    }

    /**
     * @return mixed
     */
    public function getGeboortedatum()
    {
        return $this->geboortedatum;
    }

    /**
     * @param mixed $geboortedatum
     */
    public function setGeboortedatum($geboortedatum)
    {
        $this->geboortedatum = $geboortedatum;
    }

    /**
     * @return mixed
     */
    public function getAanneemDatum()
    {
        return $this->aanneem_datum;
    }

    /**
     * @param mixed $aanneem_datum
     */
    public function setAanneemDatum($aanneem_datum)
    {
        $this->aanneem_datum = $aanneem_datum;
    }

    /**
     * @return mixed
     */
    public function getSalaris()
    {
        return $this->salaris;
    }

    /**
     * @param mixed $salaris
     */
    public function setSalaris($salaris)
    {
        $this->salaris = $salaris;
    }

    /**
     * @return mixed
     */
    public function getPersoonsnummer()
    {
        return $this->persoonsnummer;
    }

    /**
     * @param mixed $persoonsnummer
     */
    public function setPersoonsnummer($persoonsnummer)
    {
        $this->persoonsnummer = $persoonsnummer;
    }






}