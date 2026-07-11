<?php

declare(strict_types=1);

namespace App\Controller;

use App\Password\PasswordUpdater;
use App\Password\PasswordRecovery;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormError;
use App\Form\Password\LostPasswordType;
use App\Form\Password\ResetPasswordType;
use App\Security\ResetPasswordTokenizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PasswordController extends AbstractController
{
    public function __construct(
        private readonly ResetPasswordTokenizer $tokenizer,
        private readonly UserRepository $userRepository
    ) {
    }

    #[Route(
        path: '/lost-password',
        name: 'app_lost_password'
    )]
    public function lostPassword(Request $request, PasswordRecovery $passwordRecovery): Response
    {
        $form = $this->createForm(LostPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $user = $this->userRepository->findOneBy(['email' => $email]);

            if ($user) {
                if (!$user->isVerified()) {
                    $form->get('email')->addError(new FormError('Your email is not verified.'));

                    return $this->render('password/lost-password.html.twig', [
                        'form' => $form->createView(),
                    ], new Response(status: 422));
                }

                $resetUrl = $this->generateUrl(
                    route: 'app_reset_password',
                    parameters: ['token' => $this->tokenizer->generate($user)],
                    referenceType: UrlGeneratorInterface::ABSOLUTE_URL
                );

                $passwordRecovery($resetUrl, $user);

                $this->addFlash('success', 'Check your inbox for a link to reset your password.');

                return $this->redirectToRoute('app_lost_password');
            }

            $form->get('email')->addError(new FormError('No user found for this email'));
        }

        return $this->render('password/lost-password.html.twig', [
            'form' => $form->createView(),
        ], new Response(status: $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }

    #[Route(
        path: 'reset-password',
        name: 'app_reset_password',
        methods: ['GET', 'POST']
    )]
    public function resetPassword(Request $request, PasswordUpdater $updater): Response
    {
        $token = $request->query->get('token');

        if (!$token) {
            $this->addFlash('danger', 'Invalid token.');

            return $this->redirectToRoute('app_lost_password');
        }

        $validation = $this->tokenizer->validate($token);

        if (!$validation['success']) {
            $this->addFlash('danger', $validation['message']);

            return $this->redirectToRoute('app_lost_password');
        }

        $user = $this->userRepository->findOneBy(['resetPasswordToken' => $token]);

        if (!$user) {
            $this->addFlash('danger', 'Invalid token.');

            return $this->redirectToRoute('app_lost_password');
        }

        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->get('newPassword')->getData();
            $confirmPassword = $form->get('confirmPassword')->getData();

            if ($password !== $confirmPassword) {
                $form->addError(new FormError('Passwords do not match.'));

                return $this->render('password/reset-password.html.twig', [
                    'form' => $form->createView(),
                ], new Response(status: 422));
            }

            $updater($user, $password);

            $this->addFlash('success', 'Your password has been reset successfully.');

            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(ResetPasswordType::class);

        return $this->render('password/reset-password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
