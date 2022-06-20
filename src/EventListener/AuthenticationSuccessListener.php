<?php
namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccessListener
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
{
    $data = $event->getData();
    $user = $event->getUser();

    if (!$user instanceof User) {
        return;
    }

    $data['user'] = array(
        'roles' => $user->getRoles(),
        'lastname' => $user->getLastname(),
        'firstname' => $user->getFirstname(),
        'username' => $user->getUserIdentifier(),
        'email' => $user->getEmail(),
        'birthdate' => $user->getBirthdate(),
        'nationality' => $user->getNationality(),
        'picture' => $user->getPicture(),

    );

    $event->setData($data);
}
}