<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures
{
    private Generator $faker;

    /** @var list<string> */
    private array $genres;

    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
    ) {
        $this->faker = Factory::create('FR-fr');
        $this->genres = ['male', 'female'];
    }

    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getUserData() as [$email, $roles, $password, $firstname, $lastname]) {
            $user = new User();

            $user->setEmail($email)
                 ->setRoles($roles)
                 ->setPassword($this->hasher->hashPassword($user, $password))
                 ->setFirstname($firstname)
                 ->setLastname($lastname)
                 ->setCreatedAt(new \DateTimeImmutable())
                 ->setUpdatedAt(new \DateTimeImmutable())
                 ->setIsVerified(true);

            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * @return list<array{0: string, 1: list<string>, 2: string, 3: string, 4: string}>
     */
    private function getUserData(): array
    {
        $users = [];

        foreach ($this->generateUsers() as $user) {
            $users[] = [
                $user['email'],
                $user['roles'],
                $user['password'],
                $user['firstname'],
                $user['lastname'],
            ];
        }

        return $users;
    }

    /**
     * @return list<array{email: string, roles: list<string>, password: string, firstname: string, lastname: string}>
     */
    private function generateUsers(): array
    {
        $users = [];

        for ($i = 0; $i < 10; ++$i) {
            $genre = $this->faker->randomElement($this->genres);
            $firstName = $this->faker->firstName($genre);
            $lastName = $this->faker->lastName();
            $email = strtolower($firstName . '.' . $lastName . '@example.com');

            $users[] = [
                'email' => $email,
                'roles' => ['ROLE_USER'],
                'password' => 'password',
                'firstname' => $firstName,
                'lastname' => $lastName,
            ];
        }

        $users[] = [
            'email' => 'admin@example.com',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'password',
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
        ];

        return $users;
    }
}
