<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterUser
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function __invoke(Request $request, User $user, FormInterface $form): User
    {
        /** @var string $plainPassword */
        $plainPassword = $form->get('plainPassword')->getData();

        $firstName = $form->get('firstName')->getData();
        $lastName = $form->get('lastName')->getData();

        $user->setFirstName($firstName);
        $user->setLastName($lastName);

        // encode the plain password
        $user->setPassword($this->hasher->hashPassword($user, $plainPassword));

        $user->setIsVerified(false);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
