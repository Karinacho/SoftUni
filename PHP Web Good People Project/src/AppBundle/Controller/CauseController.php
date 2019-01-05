<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cause;
use AppBundle\Entity\User;
use AppBundle\Form\CauseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CauseController extends Controller
{
    /**
     * @Route("/cause/create", name="create_cause")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
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

    /**
     * @Route("/cause/{id}", name="cause_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewCause($id){
        $cause= $this->getDoctrine()->getRepository(Cause::class)->find($id);
        return $this->render("cause/cause.html.twig",['cause'=>$cause]);
    }

    /**
     * @Route("/cause/edit/{id}", name="edit_cause")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request,$id)
    {
        $cause= $this->getDoctrine()->getRepository(Cause::class)->find($id);
        if($cause === null){
            return $this->redirectToRoute('people_index');
        }
        $form = $this->createForm(CauseType::class,$cause);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
              /** @var User $currentUser */
            $currentUser = $this->getUser();
            if(!$currentUser->isAuthor($cause) && !$currentUser->isAdmin()){
                return $this->redirectToRoute('people_index');
            }
            $cause->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->merge($cause);
            $em->flush();
            return $this->redirectToRoute('people_index');
        }
        return $this->render('cause/edit.html.twig',['form'=>$form->createView(),'cause'=>$cause]);
    }
    /**
     * @Route("/cause/delete/{id}", name="delete_cause")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request,$id)
    {
        $cause= $this->getDoctrine()->getRepository(Cause::class)->find($id);
        if($cause === null){
            return $this->redirectToRoute('people_index');
        }
        $form = $this->createForm(CauseType::class,$cause);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            /** @var User $currentUser */
            $currentUser = $this->getUser();
            if(!$currentUser->isAuthor($cause) && !$currentUser->isAdmin()){
                return $this->redirectToRoute('people_index');
            }
            $em = $this->getDoctrine()->getManager();
            $em->remove($cause);
            $em->flush();
            return $this->redirectToRoute('people_index');
        }
        return $this->render('cause/delete.html.twig',['form'=>$form->createView(),'cause'=>$cause]);
    }

}
