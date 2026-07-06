<?php

declare(strict_types=1);

namespace App\Password;

use App\Entity\User;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

final class PasswordRecovery
{
    public function __construct(
        private readonly string $noreplyEmail,
        private readonly MailerInterface $mailer,
    ) {
    }

    public function __invoke(string $url, User $user): void
    {
        $message = new TemplatedEmail()
            ->from(new Address($this->noreplyEmail, 'BookingApp'))
            ->to($user->getEmail())
            ->subject('Password recovery')
            ->htmlTemplate('emails/password_recovery.html.twig')
            ->context([
                'user' => $user,
                'url' => $url,
            ]);

        try {
            $this->mailer->send($message);
        } catch (\Exception $e) {
            // Fail silently to avoid revealing account existence
        }
    }
}
