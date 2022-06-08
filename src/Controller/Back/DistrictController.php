<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/quartiers")
 */
class DistrictController extends AbstractController
{
    /**
     * 
     * Method used to list the different districts
     * 
     * @Route("", name="back_district_list", methods={"GET"})
     */
    public function list(): Response
    {
        return $this->render('back/district/index.html.twig', [
            'controller_name' => 'DistrictController',
        ]);
    }

    /**
     * 
     * Method used to list establishments by districts
     * 
     * @Route("/{slug}", name="back_district_show", methods={"GET"})
     */
    public function show(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * 
     * Method used to add a new district
     * 
     * @Route("/ajouter", name="back_district_add", methods={"GET", "POST"})
     */
    public function add(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * 
     * Method used to edit a new district
     * 
     * @Route("/{slug}/editer", name="back_district_edit", methods={"GET", "POST"})
     */
    public function edit(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * 
     * Method used to edit a new district
     * 
     * @Route("/{slug}/supprimer", name="back_district_delete", methods={"POST"})
     */
    public function delete(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }
}
