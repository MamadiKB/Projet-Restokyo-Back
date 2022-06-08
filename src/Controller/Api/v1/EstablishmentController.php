<?php

namespace App\Controller\Api\v1;

use App\Entity\Establishment;
use App\Repository\EstablishmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




/**
 * Class used to deal datas from Establishment
 * 
 * @Route("/api/v1", name="api_")
 */
class EstablishmentController extends AbstractController
{
    /**
     * @Route("/etablissements/liste", name="establishment_get_list", methods={"GET"})
     */
    public function establishmentsGetList(EstablishmentRepository $establishmentRepository) 
    {
        $establishmentsList = $establishmentRepository->findAll();

        return $this->json(['establishmentsList' => $establishmentsList, Response::HTTP_OK]);
    }

    /**
     * @Route("/etablissements/{type}/{id}", name="establishment_get_item", methods={"GET"}, requirements={"id"="\d+"})
     * 
     */
    public function establishmentsGetItem(Establishment $establishment) 
    {
        return $this->json($establishment, Response::HTTP_OK);
    }

    /**
     * @Route("/etablissements/{type}/{id}", name="establishment_post", methods={"POST"})
     */
    public function establishmentsPostItem() 
    {
        #
    }

    /**
     * @Route("/etablissements/{type}/{id}", name="establishment_put", methods={"PUT"})
     */
    public function establishmentsPutItem() 
    {
        #
    }

    /**
     * @Route("/etablissements/{type}/{id}", name="establishment_delete", methods={"DELETE"})
     */
    public function establishmentsDeleteItem() 
    {
        #
    }

    /**
     * @Route("/etablissements/{id}", name="establishment_get_data", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function establishmentsGetData(Establishment $establishment)
    {
        if ($establishment === null) {
            return $this->json(['error' => 'Etablissement inexistant (pour le moment !)'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($establishment, Response::HTTP_OK);
    }


}
