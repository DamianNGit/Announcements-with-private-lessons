<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ogloszenia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ogloszenium controller.
 *
 * @Route("ogloszenia")
 */
class OgloszeniaController extends Controller
{
    /**
     * Lists all ogloszenium entities.
     *
     * @Route("/", name="ogloszenia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ogloszenias = $em->getRepository('AppBundle:Ogloszenia')->findAll();

        return $this->render('ogloszenia/index.html.twig', array(
            'ogloszenias' => $ogloszenias,
        ));
    }

    /**
     * Creates a new ogloszenium entity.
     *
     * @Route("/new", name="ogloszenia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ogloszenium = new Ogloszenia();
        $form = $this->createForm('AppBundle\Form\OgloszeniaType', $ogloszenium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ogloszenium);
            $em->flush();

            return $this->redirectToRoute('ogloszenia_show', array('id' => $ogloszenium->getId()));
        }

        return $this->render('ogloszenia/new.html.twig', array(
            'ogloszenium' => $ogloszenium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ogloszenium entity.
     *
     * @Route("/{id}", name="ogloszenia_show")
     * @Method("GET")
     */
    public function showAction(Ogloszenia $ogloszenium)
    {
        $deleteForm = $this->createDeleteForm($ogloszenium);

        return $this->render('ogloszenia/show.html.twig', array(
            'ogloszenium' => $ogloszenium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ogloszenium entity.
     *
     * @Route("/{id}/edit", name="ogloszenia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ogloszenia $ogloszenium)
    {
        $deleteForm = $this->createDeleteForm($ogloszenium);
        $editForm = $this->createForm('AppBundle\Form\OgloszeniaType', $ogloszenium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ogloszenia_edit', array('id' => $ogloszenium->getId()));
        }

        return $this->render('ogloszenia/edit.html.twig', array(
            'ogloszenium' => $ogloszenium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ogloszenium entity.
     *
     * @Route("/{id}", name="ogloszenia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ogloszenia $ogloszenium)
    {
        $form = $this->createDeleteForm($ogloszenium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ogloszenium);
            $em->flush();
        }

        return $this->redirectToRoute('ogloszenia_index');
    }

    /**
     * Creates a form to delete a ogloszenium entity.
     *
     * @param Ogloszenia $ogloszenium The ogloszenium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ogloszenia $ogloszenium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ogloszenia_delete', array('id' => $ogloszenium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
