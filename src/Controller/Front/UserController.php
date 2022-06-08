<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/connexion", name="user_login")
     */
    public function login(): Response
    {
        return $this->render('front/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/inscription", name="user_signin")
     */
    public function signin(): Response
    {
        return $this->render('front/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/profil", name="user_profile")
     */
    public function profile(): Response
    {
        return $this->render('front/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/profil/editer", name="user_edit")
     */
    public function edit(): Response
    {
        return $this->render('front/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/deconnexion", name="user_logout", methods={"GET"})
     */
    public function logout(): Response
    {
        return $this->render('front/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
