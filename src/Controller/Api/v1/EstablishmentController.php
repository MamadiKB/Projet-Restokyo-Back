<?php

namespace App\Controller\Api\v1;

use App\Entity\Establishment;
use App\Repository\EstablishmentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;




/**
 * Class used to deal datas from Establishment
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class EstablishmentController extends AbstractController
{

    /**
     * @Route("/establishments", name="establishments_get_list", methods={"GET"})
     */
    public function establishmentsGetList(EstablishmentRepository $establishmentRepository)
    {
        $establishmentsList = $establishmentRepository->findAll();

        return $this->json(['establishmentsList' => $establishmentsList, Response::HTTP_OK]);
    }

    /**
     * @Route("/establishments/{id}", name="establishment_get_data", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function establishmentsGetData(Establishment $establishment = null)
    {
        
        if ($establishment === null) {
            return $this->json(['error' => 'Etablissement inexistant (pour le moment !)'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($establishment, Response::HTTP_OK);
    }

    /**
     * @Route("/establishments", name="establishment_set_data", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function establishmentsPostItem(Request $request,
    SerializerInterface $serializer,
    ManagerRegistry $doctrine,
    ValidatorInterface $validator)
    {
        
        $jsonContent = $request->getContent();
        $establishment = $serializer->deserialize($jsonContent, Establishment::class, 'json');
        $errors = $validator->validate($establishment);

        if (count($errors) > 0) {
            $cleanErrors = [];

            /** @var ConstraintViolation $error */
            foreach ($errors as $error) {

                $property = $error->getPropertyPath();
                $message = $error->getMessage();
                $cleanErrors[$property][] = $message;
                // array_push($cleanErrors[$property], $message);
            }

            return $this->json($cleanErrors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Saving into DB
        $em = $doctrine->getManager();
        $em->persist($establishment);
        $em->flush();

        return $this->json($establishment, Response::HTTP_CREATED, [
                'Location' => $this->generateUrl('api_v1_establishments_get_list', [
                    'id' => $establishment->getId()
                    ]
                )
            ]
        );
    }

    /**
     * @Route("/establishments/{type}", name="establishment_get_by_type", methods={"GET"})
     * 
     */
    public function establishmentsGetListByType(Establishment $establishment, EstablishmentRepository $establishmentRepository)
    {
        $type = $establishment->getType();
        $establishmentsList = $establishmentRepository->findByType($type);
        return $this->json(['establishmentsList' => $establishmentsList], Response::HTTP_OK);
    }
}
