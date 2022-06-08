<?php

namespace App\Controller\Api\v1;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class used to deal datas from Tags
 * 
 * @Route("/api/v1", name="api_")
 */
class TagController extends AbstractController
{
    /**
     * @Route("/tags", name="tags_get_list", methods={"GET"})
     */
    public function tagsGetList(TagRepository $tagRepository)
    {
        $tagsList = $tagRepository->findAll();

        return $this->json(['tags' => $tagsList], Response::HTTP_OK);
    }

    /**
     * @Route("/tags/{id}/etablissements", name="tags_get_establishments_list", methods={"GET"})
     */
    public function establishmentsListByTag(Tag $tag = null)
    {
        return $this->json($tag, Response::HTTP_OK);
    }

    /**
     * @Route("/tags", name="tags_post", methods={"POST"})
     */
    public function tagsPost()
    {
        #
    }

    /**
     * @Route("/tags", name="tags_put", methods={"PUT"})
     */
    public function tagsPut()
    {
        #
    }

    /**
     * @Route("/tags", name="tags_delete", methods={"DELETE"})
     */
    public function tagsDelete()
    {
        #
    }
}
