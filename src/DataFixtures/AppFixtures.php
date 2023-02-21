<?php

namespace App\DataFixtures;

use App\Entity\Artista;
use App\Entity\User;
use App\Entity\Vinilo;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        #Users
        $user1 = new User();
        $user1->setName('Admin');
        $user1->setUsername('admin');
        $user1->setEmail('admin@gmail.com');
        $plainPassword = "admin";
        $hashedPassword = $this->passwordHasher->hashPassword($user1, $plainPassword);
        $user1->setPassword($hashedPassword);
        $user1->setCreatedAt(new DateTime());
        $user1->setRole('ROLE_ADMIN');

        $manager->persist($user1);

        $user2 = new User();
        $user2->setName('User');
        $user2->setUsername('user');
        $user2->setEmail('user@gmail.com');
        $plainPassword2 = "user";
        $hashedPassword2 = $this->passwordHasher->hashPassword($user2, $plainPassword2);
        $user2->setPassword($hashedPassword2);
        $user2->setCreatedAt(new DateTime());
        $user2->setRole('ROLE_USER');

        $manager->persist($user2);
        $manager->flush();

        #Artists
        $artista1 = new Artista();
        $artista1->setName('Los Chikos del Maíz');
        $artista1->setDescription('Grupo de rap proveniente de València');
        $artista1->setCreatedAt(new DateTime());

        $manager->persist($artista1);

        $artista2 = new Artista();
        $artista2->setName('Desakato');
        $artista2->setDescription('Grupo de punk-rock/hardcore-punk asturiano');
        $artista2->setCreatedAt(new DateTime());

        $manager->persist($artista2);
        $manager->flush();

        #Vinils
        $vinil1 = new Vinilo();
        $vinil1->setName('Comancheria');
        $vinil1->setDescription('Tercer albúm de estudio producido por el grupo');
        $vinil1->setPrice(15);
        $vinil1->setCreatedAt(new DateTime('2016-04-25'));
        $vinil1->setArtista($artista1);

        $manager->persist($vinil1);

        $vinil2 = new Vinilo();
        $vinil2->setName('La miel de las flores muertas');
        $vinil2->setDescription('Últim disc publicat per el grup amb el que es despedixen dels escenaris');
        $vinil2->setPrice(10);
        $vinil2->setCreatedAt(new DateTime());
        $vinil2->setArtista($artista2);

        $manager->persist($vinil2);
        $manager->flush();
    }
}
