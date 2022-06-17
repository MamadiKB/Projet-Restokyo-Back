<?php

namespace App\Controller\Api\v1;

use App\Entity\Tag;
use App\Entity\Comment;
use App\Entity\Establishment;
use App\Repository\CommentRepository;
use App\Repository\EstablishmentRepository;
use App\Repository\TagRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class used to deal datas from Tags
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class CommentController extends AbstractController
{
    /**
     * @Route("/comments", name="comments_get_list", methods={"GET"})
     */
    public function browseComments(CommentRepository $commentRepository)
    {
        $commentsList = $commentRepository->findAll();

        return $this->json(['comments' => $commentsList], Response::HTTP_OK, [], ['groups' => 'comments_get_list']);
    }

    /**
     * @Route("/comment/{id}", name="comment_delete", methods={"DELETE"})
     * @ParamConverter("comment", options={"id" = "id"})
     */
    public function deleteComment(Request $request, Comment $comment, CommentRepository $commentRepository): Response
    {
        // if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
        //     $commentRepository->remove($comment);
        //     $this->addFlash('success', 'Commentaire supprimé');
        // }

        $commentRepository->remove($comment);

        return $this->redirectToRoute($request->getRequestUri(), [], Response::HTTP_SEE_OTHER);
        // return $app->redirect($request->getRequestUri());

    }

    /**
     * Ajout d'un commentaire à un établissement
     * 
     * @Route("/establishment/{id}/comments", name="addComment", methods={"POST"})
     */
    public function addComment(
        Establishment $establishment,
        EstablishmentRepository $establishmentRepository,
        Request $request,
        SerializerInterface $serializer,
        //Security $security,
        UserRepository $userRepository,
        ManagerRegistry $doctrine
    ) {
        // Mettre le commentaire recu en objet comment
        $comment = $serializer->deserialize($request->getContent(), Comment::class, 'json');

        //! Passer ton objet au validator si besoin

        // Mettre l'utilisateur courant dans le commentaire
        // $user = $security->getUser();
        $user = $userRepository->find(1);
        $comment->setUser($user);
        $comment->setEstablishment($establishment);

        // Persist et flush ton commentaire
        $entityManager = $doctrine->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();

        // Appel de la méthode de calcul de la moyenne des ratings des commentaires depuis EstablishmentRepository->averageRating()
        $rating = $establishmentRepository->averageRating($establishment->getId());
        $establishment->setRating($rating[0]['rating']);
        $entityManager->flush();

        return $this->json(['message'=> 'Commentaire créé avec succès.'], Response::HTTP_CREATED);
    }

}
