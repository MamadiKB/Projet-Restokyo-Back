<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackController extends AbstractController
{
    /**
     * @Route("/", name="back_back_menu")
     */
    public function home(): Response
    {
        return $this->redirectToRoute('login', [
            'controller_name' => 'BackController',
        ]);
    }
}
