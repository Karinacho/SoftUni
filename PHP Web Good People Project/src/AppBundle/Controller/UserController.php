<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @Route("/profile",name="user_profile")
     *
     */
    public function profile(){
       $id= $this->getUser()->getId();
  $user = $this->getDoctrine()->getRepository(User::class)->find($id);
  return $this->render('user/profile.html.twig',['user'=>$user]);
    }

}
