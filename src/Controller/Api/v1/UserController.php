<?php

namespace App\Controller\Api\v1;

use App\Entity\User;
use App\Entity\Establishment;
use App\Service\FavoritesManager;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\EstablishmentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

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
    public function userGetData(User $user = null)
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
     * @route ("profil/{id}/favorites-list", name="favorites_list", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function handleFavorites(UserInterface $user = null)
    {


    }
}