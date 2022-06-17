<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiLoginController extends AbstractController
{
    
    
    /**
     * @Route("/api/login", name: "login_check")
     */
    /*public function index(CurrentUser $currentUser, ?User $user): Response
    {
        if (null === $user) {
            return $this->json([
                'message' => 'missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $currentUser; // somehow create an API token for $user

        return $this->json([             
            'user'  => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }
    */
    
/*
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

  class ApiLoginController extends AbstractController
  {
    #[Route('/api/login', name: 'api_login')]
    
    public function index(#[CurrentUser] ?User $user): Response
    {
        if (null === $user) {
            return $this->json([
                'message' => 'missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = ...; // somehow create an API token for $user

        return $this->json([             
            'user'  => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }
}
*/

}
