<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Ogloszenia;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DodajController extends Controller
{    
    /**
     * @Route("/DodajOgloszenie", name="DodajOgloszenie")
     */
    public function showAction(Request $request) {
        
        $form = null;
        
        if($user = $this->getUser()){
            $nOgloszenie = new Ogloszenia();
            //$nOgloszenie->setPost();
            $nOgloszenie->setUser($user);
            
            $form = $this->createForm('\AppBundle\Form\OgloszeniaType', $nOgloszenie);
            $form -> handleRequest($request);
        
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($nOgloszenie);
                $em->flush();

                $this->addFlash('notice', 'Ogłoszenie zostało pomyślnie dodane.');

                return $this->redirectToRoute('homepage');
            }
        }
                
        return $this->render('default/showDodajOgloszenie.html.twig', [
            'form' => is_null($form) ? $form : $form->createView()
        ]);

    }
}
