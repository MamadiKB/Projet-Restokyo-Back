<?php

namespace App\Controller\Api\v1;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class used to deal datas from User
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class UserController extends AbstractController
{
    /**
     * @route ("/profils/{id}", name="back_user_show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function userGetItem(User $user = null)
    {
        // 404 ?
        if ($user === null) {
            return $this->json(['error' => 'Utilisateur non trouvé.'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($user, Response::HTTP_OK);
    }

    /**
     * @route ("/profils/{id}", name="back_user_edit", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function userPutItem(User $user)
    {
        #
    }

    /**
     * @route ("/profils/{id}", name="back_user_delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function userDeleteItem(User $user)
    {
        #
    }

    /**
     * @route ("/profils/ajouter", name="back_user_add", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function userPostlist(User $user)
    {
        #
    }

}