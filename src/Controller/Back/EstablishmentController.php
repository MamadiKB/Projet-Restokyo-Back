<?php

namespace App\Controller\Back;

use App\Entity\Establishment;
use App\Form\EstablishmentType;
use App\Repository\EstablishmentRepository;
use App\Service\MySlugger;
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
            'establishment' => $establishmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{type}", name="back_establishment_listByType", methods={"GET"})
     */
    public function listByType(EstablishmentRepository $establishmentRepository): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/{district}", name="back_establishment_listByDistrict", methods={"GET"})
     */
    public function listByDistrict(EstablishmentRepository $establishmentRepository): Response
    {
        return $this->render('back/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/{id}", name="back_establishment_show", methods={"GET"})
     */
    public function show(Establishment $establishment): Response
    {
        return $this->render('back/establishment/show.html.twig', [
            'establishment' => $establishment,
        ]);
    }

    /**
     * @Route("/{id}/ajouter", name="back_establishment_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EstablishmentRepository $establishmentRepository, MySlugger $mySlugger): Response
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
     * @Route("/{id}/editer", name="back_establishment_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Establishment $establishment, EstablishmentRepository $establishmentRepository, MySlugger $mySlugger): Response
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
     * @Route("/{id}/supprimer", name="back_establishment_delete", methods={"POST"})
     */
    public function delete(Request $request, Establishment $establishment, EstablishmentRepository $establishmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$establishment->getId(), $request->request->get('_token'))) {
            $establishmentRepository->remove($establishment);
            $this->addFlash('success', 'L\'établissement à été supprimé.');
        }

        return $this->redirectToRoute('back_establishment_index', [], Response::HTTP_SEE_OTHER);
    }
}
