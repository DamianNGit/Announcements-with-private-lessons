<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Ania i Czarek
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser {
    //put your code here
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @var type
     * 
     * @ORM\OneToMany(targetEntity="Ogloszenia", mappedBy="user")
     */
    private $ogloszenia;
    
    
    public function __construct() {
        parent::__construct();
        //$this->ogloszenia = new \ArrayObject;
    }

        public function getId(){
        return $this->id;
    }

    /**
     * Add ogloszenium
     *
     * @param \AppBundle\Entity\Ogloszenia $ogloszenium
     *
     * @return User
     */
    public function addOgloszenium(\AppBundle\Entity\Ogloszenia $ogloszenium)
    {
        $this->ogloszenia[] = $ogloszenium;

        return $this;
    }

    /**
     * Remove ogloszenium
     *
     * @param \AppBundle\Entity\Ogloszenia $ogloszenium
     */
    public function removeOgloszenium(\AppBundle\Entity\Ogloszenia $ogloszenium)
    {
        $this->ogloszenia->removeElement($ogloszenium);
    }

    /**
     * Get ogloszenia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOgloszenia()
    {
        return $this->ogloszenia;
    }
}
