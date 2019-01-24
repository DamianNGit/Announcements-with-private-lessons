<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OgloszenieController extends Controller
{
    
    /**
     * @Route("/ogloszenie_{id}", name="PokazOgloszenie")
     */
    public function showAction(\AppBundle\Entity\Ogloszenia $ogloszenia) {
        
        return $this->render('default/show.html.twig', [
            'ogloszenie' => $ogloszenia
        ]);
    }
    
}
