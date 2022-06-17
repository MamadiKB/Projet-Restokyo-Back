<?php

namespace App\Controller\Api\v1;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**    
 * Class used to deal datas from User
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class UserController extends AbstractController
{
    /**
     * @route ("/profils/{id}", name="back_user_show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function userGetItem(User $user = null)
    {
        // 404 ?
        if ($user === null) {
            return $this->json(['error' => 'Utilisateur non trouvé.'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($user, Response::HTTP_OK);
    }

    /**
     * @route ("/profils/{id}", name="back_user_edit", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function userPutItem(User $user)
    {
        #
    }

    /**
     * @route ("/profils/{id}", name="back_user_delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function userDeleteItem(User $user)
    {
        #
    }

    
    /**
     * @route ("/profils/ajouter", name="back_user_add", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function userPostlist(User $user,
    Request $request,
    SerializerInterface $serializer,
    ManagerRegistry $doctrine,
    ValidatorInterface $validator
    ) 
    {
    // On doit récupérer le contenu JSON qui se trouve dans la Request
    $jsonContent = $request->getContent();

    // @link https://symfony.com/doc/current/components/serializer.html#deserializing-an-object
    // On "désérialise" le contenu JSON en entité de type User
    $user = $serializer->deserialize($jsonContent, User::class, 'json');

    // On valide l'entité
    // @link https://symfony.com/doc/current/validation.html#using-the-validator-service
    $errors = $validator->validate($user);

    

    if (count($errors) > 0) {

        
        $cleanErrors = [];

        /** @var ConstraintViolation $error */
        foreach ($errors as $error) {

            // On récupère les infos
            $property = $error->getPropertyPath(); // 'title'
            $message = $error->getMessage(); // 'This value is already used.'

            // On push tout ça dans un tableau à la clé $property

            
            // On ajoute le message dans un tableau à la clé $property
            // PHP gère lui-même l'existence du second tableau
            $cleanErrors[$property][] = $message;
            // array_push($cleanErrors[$property], $message);
        }

        return $this->json($cleanErrors, Response::HTTP_UNPROCESSABLE_ENTITY);
        // On peut aussi retourner $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY)
        // Si on ne souhaite pas reformater la sortie
    }

    // On la sauvegarde en base
    $em = $doctrine->getManager();
    $em->persist($user);
    $em->flush();

    // On retourne une réponse qui contient (REST !)
    
    return $this->json(
            // User créé
            $user,
            // Le status code : 201 CREATED            
            Response::HTTP_CREATED,
            // REST demande un header Location + l'URL de la ressource créée
            // (un tableau clé-valeur)
            [
                'Location' => $this->generateUrl('api_v1_back_user_show', ['id' => $user->getId()])
            ],
            // Pour éviter les références circulaires
            //['groups' => 'user_get_item']
        );
    }

    public function registration(UserPasswordHasherInterface $passwordHasher)
    {
        // ... e.g. get the user data from a registration form
        $user = new User();
        $plaintextPassword = "...";

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);

    }

    public function delete(UserPasswordHasherInterface $passwordHasher, UserInterface $user)
    {
        // ... e.g. get the password from a "confirm deletion" dialog
        $plaintextPassword = "...";

        if (!$passwordHasher->isPasswordValid($user, $plaintextPassword)) {
            throw new AccessDeniedHttpException();
        }
    }

    
}