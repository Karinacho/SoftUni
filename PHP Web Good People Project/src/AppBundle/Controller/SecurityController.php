<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/register", name="user_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request){
        $user = new User();
        $form= $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted()){


            $validator = $this->get('validator');
            $errors = $validator->validate($user);

            if (count($errors) > 0) {

                return $this->render('security/register.html.twig', array(
                    'errors' => $errors
                ));
            }
            if ($user->getPassword() !== $request->request->get('confirm_password')){
                $this->addFlash('info','Password mismatch!');
                return $this->render('security/register.html.twig', ['form' => $form->createView()]);
            }
            $password = $this->get('security.password_encoder')
               ->encodePassword($user,$user->getPassword());

           $user->setPassword($password);
           $em= $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();

            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/register.html.twig');

    }
}
