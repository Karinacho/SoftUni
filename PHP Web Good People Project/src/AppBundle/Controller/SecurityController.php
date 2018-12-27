<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        return $this->render('security/login.html.twig');
    }
    /**
     * @Route("/register", name="security_register")
     */
    public function registerAtion(){
        return $this->render('security/register.html.twig');

    }
}
