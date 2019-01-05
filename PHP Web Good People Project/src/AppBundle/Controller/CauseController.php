<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cause;
use AppBundle\Form\CauseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CauseController extends Controller
{
    /**
     * @Route("/cause/create", name="create_cause")
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $cause = new Cause();

        $form = $this->createForm(CauseType::class,$cause);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $currentUser = $this->getUser();
            $cause->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->persist($cause);
            $em->flush();
             return $this->redirectToRoute('people_index');
        }
        return $this->render('cause/create.html.twig',['form'=>$form->createView()]);
    }
}
