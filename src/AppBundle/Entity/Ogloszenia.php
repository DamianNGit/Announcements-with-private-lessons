<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ogloszenia
 *
 * @ORM\Table(name="ogloszenia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OgloszeniaRepository")
 */
class Ogloszenia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tresc", type="text")
     */
    private $tresc;

    /**
     * @var string
     *
     * @ORM\Column(name="szkola", type="string", length=255)
     */
    private $szkola;

    /**
     * @var string
     *
     * @ORM\Column(name="przedmiot", type="string", length=255)
     */
    private $przedmiot;

    /**
     * @var string
     *
     * @ORM\Column(name="kontakt", type="string", length=255)
     */
    private $kontakt;

    /**
     * @var int
     *
     * @ORM\Column(name="cena", type="smallint")
     */
    private $cena;
    
    /**
     * @var type 
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="ogloszenia")
     * @ORM\JoinColumn(name="user_id", nullable=true)
     */
    private $user;
    
    
    public function __toString() {
        return $this->tresc;
    }
    
    
    
    //public function __construct() {
    //    $this->
    //}

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tresc
     *
     * @param string $tresc
     *
     * @return Ogloszenia
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;

        return $this;
    }

    /**
     * Get tresc
     *
     * @return string
     */
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * Set szkola
     *
     * @param string $szkola
     *
     * @return Ogloszenia
     */
    public function setSzkola($szkola)
    {
        $this->szkola = $szkola;

        return $this;
    }

    /**
     * Get szkola
     *
     * @return string
     */
    public function getSzkola()
    {
        return $this->szkola;
    }

    /**
     * Set przedmiot
     *
     * @param string $przedmiot
     *
     * @return Ogloszenia
     */
    public function setPrzedmiot($przedmiot)
    {
        $this->przedmiot = $przedmiot;

        return $this;
    }

    /**
     * Get przedmiot
     *
     * @return string
     */
    public function getPrzedmiot()
    {
        return $this->przedmiot;
    }

    /**
     * Set kontakt
     *
     * @param string $kontakt
     *
     * @return Ogloszenia
     */
    public function setKontakt($kontakt)
    {
        $this->kontakt = $kontakt;

        return $this;
    }

    /**
     * Get kontakt
     *
     * @return string
     */
    public function getKontakt()
    {
        return $this->kontakt;
    }

    /**
     * Set cena
     *
     * @param integer $cena
     *
     * @return Ogloszenia
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return int
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Ogloszenia
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
