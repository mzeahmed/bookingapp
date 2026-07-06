<?php

declare(strict_types=1);

namespace App\Password;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class PasswordUpdater
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly UserPasswordHasherInterface $hasher,
    ) {
    }

    public function __invoke(User $user, string $newPassword): void
    {
        $hash = $this->hasher->hashPassword($user, $newPassword);
        $user->setPassword($hash);

        $this->em->persist($user);
        $this->em->flush();
    }
}
