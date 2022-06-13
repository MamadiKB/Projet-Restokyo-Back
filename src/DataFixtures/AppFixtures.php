<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Tag;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Comment;
use App\Entity\District;
use App\Service\MySlugger;
use App\Entity\Establishment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Provider\RestokyoProvider;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    private $newSlugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->newSlugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {

        // @link https://fakerphp.github.io/
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('fr_FR');

        // Putting a seed to get the same datas
        $faker->seed(2022);

        // Setting which provider to use (RestokyoProvider in our case)
        $provider = new RestokyoProvider();
        // And adding it to Faker in order to work with it
        $faker->addProvider($provider);


        //!\ USERS

        // // Mise en place des user par ordre de privilège
        // // Admin

        // $admin = new User();
        // $admin->setEmail('admin@admin.com');
        // $admin->setPassword('admin');
        // $admin->setUsername('admin');
        // $admin->setFirstname('administrateur');
        // $admin->setRole('ADMIN');

        // $manager->persist($admin);

        // // User

        // $user = new User();
        // $user->setEmail('user@user.com');
        // $user->setPassword('user');
        // $user->setUsername('user');
        // $user->setFirstname('utilisateur');
        // $user->setRole('USER');

        // $manager->persist($user);

        //!\ TAGS

        $tagsList = [];

        for ($i = 1; $i <= 20; $i++) {

            // Creating a new tag and setting it as unique to avoid duplicates
            $tag = new Tag();
            $tag->setName($faker->unique()->establishmentTag());

            // Filling the array
            $tagsList[] = $tag;

            // Persisting
            $manager->persist($tag);
        }

        //!\ DISTRICTS

        $districtsList = [];
        
        for ($d = 1; $d <= 12; $d++) {

            // Creating a new district and setting it as unique to avoid duplicates
            $district = new District();
            $district->setName($faker->unique()->districtsName());

            // Filling the array
            $districtsList[] = $district;

            // Persisting
            $manager->persist($district);
        }
        


        //!\ ESTABLISHMENTS

        for ($e = 1; $e <= 10; $e++) {
            $establishment = new Establishment();
            $establishment->setName($faker->unique()->establishmentName());
            $establishment->setDescription($faker->text(100));
            $establishment->setAddress($faker->address());
            $establishment->setSlug($this->newSlugger->slug($establishment->getName())->lower());
            // 1/2 chance to have a type instead of another
            $establishment->setType($faker->randomElement(['restaurant', 'izakaya']));
            $establishment->setPicture('https://picsum.photos/id/' . $faker->numberBetween(1, 100) . '/450/300');
            $establishment->setRating($faker->randomFloat(1, 1, 5));
            $randomDistrict = $districtsList[mt_rand(0, count($districtsList) - 1)];
            $establishment->setDistrict($randomDistrict);

            $randomDistrict = $districtsList[mt_rand(0, count($districtsList) - 1)];
            $establishment->setDistrict($randomDistrict);


            //!\ TAGS to ESTABLISHMENTS
            //TODO To activate when relation is done
            // Adding 1 to 3 tags to each establishment
            // for ($t = 1; $t <= mt_rand(1, 3); $t++) {
            //     $randomTag = $tagsList[mt_rand(0, count($tagsList) - 1)];
            //     $establishment->addTag($randomTag);
            // }

            //!\ COMMENTS (and ratings) to ESTABLISHMENTS
            //TODO To activate when relation is done 
            // for ($j = 0; $j < mt_rand(15, 20); $j++) {
            //     $comment = new Comment();

            //     $comment
            //         ->setUsername($faker->userName())
            //         ->setPublishedAt(DateTimeImmutable::createFromMutable($faker->datetime()))
            //         ->setContent($faker->realTextBetween(100, 300))
            //         ->setRating(mt_rand(2, 5))
            //         ->setPicture($faker->randomElement(['https://picsum.photos/id/' . $faker->numberBetween(1, 100) . '/450/300', null]));

            //     $manager->persist($comment);
            // }

            $manager->persist($establishment);


            // Travail de Nico
            // Etablissements

            // $establishement = new Establishment();
            // $establishement->setName('Chatty Chatty');
            // $establishement->setType('Restaurant');
            // $establishement->setDescription("Ne cherchez plus, c/'est le meilleur burger de Tokyo !");
            // $establishement->setAddress('1 Chome-12-1 Shinjuku, Shinjuku City, Tokyo 160-0022');
            // $establishement->setOpeningDays('Du lundi au dimanche');


            // $manager->persist($establishement);

            // // quartiers

            // $district = new District();
            // $district->setName('Shinjuku');

            // $manager->persist($district);

            // // Tag

            // $tag = new Tag();
            // $tag->setName('Burger');

            // $manager->persist($tag);


            // $manager->flush();
        }
        $manager->flush();
    }
}
