<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/etablissement")
 */
class EstablishmentController extends AbstractController
{
    /**
     * @Route("", name="back_establishment_list", methods={"GET"})
     */
    public function list(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/{type}", name="back_establishment_listByType", methods={"GET"})
     */
    public function listByType(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/{type}/{slug}", name="back_establishment_show", methods={"GET"})
     */
    public function show(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/{type}/ajouter", name="back_establishment_add", methods={"GET", "POST"})
     */
    public function add(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/{type}/editer", name="back_establishment_edit", methods={"GET", "POST"})
     */
    public function edit(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/{type}/supprimer", name="back_establishment_delete", methods={"POST"})
     */
    public function delete(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * 
     * Method used to consultate the establishments' propositions by users validate (or invalidate) an establishment submitted by user
     * 
     * @Route("/nouveau/liste", name="back_establishment_new_list", methods={"GET"})
     */
    public function newEstablishmentList(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * 
     * Method designed to validate (or invalidate) an establishment submitted by user
     * 
     * @Route("/nouveau/liste", name="back_establishment_new_handle", methods={"GET", "POST"})
     */
    public function handleProposition(): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

}
