<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/back/profils/list", name="back_user_list", methods={"GET"})
     */
    public function list(): Response
    {
        return $this->render('back/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/back/profils/{username}", name="back_user_show", methods={"GET"})
     */
    public function show(): Response
    {
        return $this->render('back/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/back/profils/ajouter", name="back_user_add", methods={"GET", "POST"})
     */
    public function add(): Response
    {
        return $this->render('back/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/back/profils/{username}/editer", name="back_user_edit", methods={"GET", "POST"})
     */
    public function edit(): Response
    {
        return $this->render('back/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/back/profils/{username}/supprimer", name="back_user_delete", methods={"POST"})
     */
    public function delete(): Response
    {
        return $this->render('back/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
