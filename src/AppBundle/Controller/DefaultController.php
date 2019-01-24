<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $qb = $this->getDoctrine()
                ->getManager()
                ->createQueryBuilder()
                ->from('AppBundle:Ogloszenia', 'o')
                ->select('o');                
                
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $qb,
                $request->query->get('page', 1),
                5
            );
        
        return $this->render('default/index.html.twig', [
            'ogloszenia' => $pagination
        ]);
    }
    
}
