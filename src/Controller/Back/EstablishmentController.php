<?php

namespace App\Controller\Back;

use App\Entity\District;
use App\Entity\Establishment;
use App\Form\EstablishmentType;
use App\Repository\DistrictRepository;
use App\Repository\EstablishmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/etablissement")
 */
class EstablishmentController extends AbstractController
{
    /**
     * @Route("", name="back_establishment_index", methods={"GET"})
     */
    public function index(EstablishmentRepository $establishmentRepository): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'establishments' => $establishmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="back_establishment_show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function show(Establishment $establishment): Response
    {
        return $this->render('back/establishment/show.html.twig', [
            'establishment' => $establishment,
        ]);
    }

    /**
     * @Route("/new", name="back_establishment_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EstablishmentRepository $establishmentRepository): Response
    {
        $establishment = New Establishment();
        $form = $this->createForm(EstablishmentType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $establishmentRepository->add($establishment);
            $this->addFlash('success', 'L\'établissement à été ajouté.');
            return $this->redirectToRoute('back_establishment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/establishment/new.html.twig', [
            'establisment' => $establishment,
            'form' => $form,
        ]);
    }
    
    /**
     * @Route("/{id}", name="back_establishment_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Establishment $establishment, EstablishmentRepository $establishmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$establishment->getId(), $request->request->get('_token'))) {
            $establishmentRepository->remove($establishment);
            $this->addFlash('success', 'L\'établissement à été supprimé.');
        }

        return $this->redirectToRoute('back_establishment_index', [], Response::HTTP_SEE_OTHER);
    }
    
    

    /**
     * @Route("/orderbytypeasc", name="back_establishment_orderByTypeASC", methods={"GET"})
     */
    public function orderByType( EstablishmentRepository $establishmentRepository): Response
    {
        $orderByTypeList = $establishmentRepository->findAllOrderedByTypeAsc();
        return $this->render('back/establishment/index.html.twig', [
            'establishments' => $orderByTypeList,
        ]);
    }

    /**
     * @Route("/orderbydistrictasc", name="back_establishment_orderByDistrictASC", methods={"GET"})
     */
    public function orderByDistrict(EstablishmentRepository $establishmentRepository): Response
    {
        $orderByDistrictList = $establishmentRepository->findAllOrderedByDistrictAsc();
        return $this->render('back/establishment/index.html.twig', [
            'establishments' => $orderByDistrictList,
        ]);
    }
   

    /**
     * @Route("/{type}", name="back_establishment_listByType", methods={"GET"})
     */
    public function listByType(Establishment $establishment, EstablishmentRepository $establishmentRepository): Response
    {
        $type = $establishment->getType();
        $establishmentByType = $establishmentRepository->findByType($type);
        return $this->render('back/establishment/index.html.twig', [
            'establishments' => $establishmentByType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="back_establishment_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Establishment $establishment, EstablishmentRepository $establishmentRepository): Response
    {
        $form = $this->createForm(EstablishmentType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $establishmentRepository->add($establishment);
            $this->addFlash('success', 'L\'établissement à été ajouté.');
            return $this->redirectToRoute('back_establishment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/establishment/new.html.twig', [
            'establisment' => $establishment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/district/{district}", name="back_establishment_listByDistrict", methods={"GET"}) 
     */
    public function listByDistrict(EstablishmentRepository $establishmentRepository, District $district): Response
    {
        $districtId = $district->getId();
        $establishmentByDistrict = $establishmentRepository->findByDistrict($districtId);
        return $this->render('back/establishment/index.html.twig', [
            'establishments' => $establishmentByDistrict,
            'Location' => 'App\Entity\Establishment',
        ]);
    }
}
