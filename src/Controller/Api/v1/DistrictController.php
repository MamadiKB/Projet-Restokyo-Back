<?php

namespace App\Controller\Api\v1;

use App\Entity\District;
use App\Entity\Establishment;
use App\Repository\DistrictRepository;
use App\Repository\EstablishmentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class used to deal datas from District
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class DistrictController extends AbstractController
{
    /**
     * @Route("/districts", name="districts_get_list", methods={"GET"})
     */
    public function districtGetList(DistrictRepository $districtRepository)
    {
        $districtsList = $districtRepository->findAll();

        return $this->json(['districts' => $districtsList], Response::HTTP_OK, [], ['groups' => 'districts_get_list']);
    }

    /**
     * @Route("/districts/{id}", name="districts_get_establishments", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function establishmentsByDistrict(District $district, EstablishmentRepository $establishmentRepository)
    {
        // 404 ?
        if ($district === null) {
            throw $this->createNotFoundException('Pas de quartier !');
        }

        $id = $district->getId();
        $establishmentsList = $establishmentRepository->findEstablishmentByDistrict($id);

        return $this->json(['establishmentsList' => $establishmentsList], Response::HTTP_OK, [], ['groups' => 'districts_get_list']);
    }


}
