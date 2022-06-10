<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\District;
use App\Entity\Establishment;
use App\Entity\Tag;
use App\Entity\User;
use App\Service\MySlugger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        // Mise en place des user par ordre de privilège
        // Admin

        $admin = new User();
        $admin->setEmail('admin@admin.com');
        $admin->setPassword('admin');
        $admin->setUsername('admin');
        $admin->setFirstname('administrateur');
        $admin->setRole('ADMIN');

        $manager->persist($admin);

        // User

        $user = new User();
        $user->setEmail('user@user.com');
        $user->setPassword('user');
        $user->setUsername('user');
        $user->setFirstname('utilisateur');
        $user->setRole('USER');

        $manager->persist($user);

        // Etablissements

        $establishement = new Establishment();
        $establishement->setName('Chatty Chatty');
        $establishement->setType('Restaurant');
        $establishement->setDescription("Ne cherchez plus, c/'est le meilleur burger de Tokyo !");
        $establishement->setAddress('1 Chome-12-1 Shinjuku, Shinjuku City, Tokyo 160-0022');
        $establishement->setOpeningDays('Du lundi au dimanche');

        $manager->persist($establishement);

        // quartiers

        $district = new District();
        $district->setName('Shinjuku');

        $manager->persist($district);

        // Tag

        $tag = new Tag();
        $tag->setName('Burger');

        $manager->persist($tag);


        $manager->flush();
    }
}
