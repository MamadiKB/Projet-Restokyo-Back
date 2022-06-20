<?php

namespace App\EventListener;

use App\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;



class JWTCreatedListener
{
    /**
     * @var RequestStack
     */
    private $requestStack;
   
    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;        
    }

    
    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $request = $this->requestStack->getCurrentRequest();
        
        /*$expiration = new \DateTime('+1 day');
        $expiration->setTime(2, 0, 0);*/

        $payload        = $event->getData();
        /*$payload['exp'] = $expiration->getTimestamp();   */     
        $payload['ip'] = $request->getClientIps();
        $payload['URI'] = $request->getUri();
        $payload['URI Request'] = $request->getRequestUri();

        $event->setData($payload);

    }
   
   
}

