<?php

namespace App\Controller\Api\v1;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class used to deal datas from Tags
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class TagController extends AbstractController
{
    /**
     * @Route("/tags", name="tags_get_list", methods={"GET"})
     */
    public function tagGetList(TagRepository $tagRepository)
    {
        $tagsList = $tagRepository->findAll();

        return $this->json(['tags' => $tagsList], Response::HTTP_OK, [], ['groups' => 'tags_get_list']);
    }

    /**
     * @Route("/tags/{id}", name="tags_get_establishments", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function establishmentsByTag(Tag $tag = null)
    {
        // 404 ?
        if ($tag === null) {
            
            return $this->json(['error' => 'Tag non trouvé.'], Response::HTTP_NOT_FOUND);
        }

                
        return $this->json($tag, Response::HTTP_OK, [], ['groups' => 'tags_get_establishments']);
    }


}
