<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cause;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GoodPeopleController extends Controller
{

    /**
     * @Route("/goodPeople", name="people_index")
     */
    public function indexAction()
    {
        $causes= $this->getDoctrine()->getRepository(Cause::class)->findAll();
        return $this->render('goodPeople/people_index.html.twig',['causes'=>$causes]);
    }
}
