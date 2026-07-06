<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class ResetPasswordTokenizer
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly EntityManagerInterface $em
    ) {
    }

    /**
     * @throws \Random\RandomException
     */
    public function generate(User $user): string
    {
        $rawToken = bin2hex(random_bytes(32)); // 64 chars hex
        $tokenHash = hash('sha512', $rawToken);

        // $data = [
        //     'token' => $tokenHash,
        //     'user_id' => $user->getId(),
        // ];
        // $serializedToken = base64_encode(serialize($data));

        $user->setResetPasswordToken($tokenHash);

        $this->em->persist($user);
        $this->em->flush();

        return $tokenHash;
    }

    /**
     * @return array{success: bool, token: string, message: string}
     */
    public function validate(string $rawToken): array
    {
        if ('' === $rawToken) {
            return ['success' => false, 'token' => '', 'message' => 'Invalid token.'];
        }

        $user = $this->repository->findOneBy(['resetPasswordToken' => $rawToken]);

        if (null === $user) {
            return ['success' => false, 'token' => '', 'message' => 'Invalid token.'];
        }

        $userToken = $user->getResetPasswordToken();

        if (null === $userToken || '' === $userToken || !hash_equals($userToken, $rawToken)) {
            return ['success' => false, 'token' => '', 'message' => 'Invalid token.'];
        }

        return ['success' => true, 'token' => $rawToken, 'message' => 'Token is valid.'];
    }

    public function consume(User $user): true
    {
        $user->setResetPasswordToken(null);

        $this->em->persist($user);
        $this->em->flush();

        return true;
    }
}
