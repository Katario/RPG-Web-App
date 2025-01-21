<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\FormType\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    public function __construct(
        private readonly FormFactoryInterface $formFactory,
    ) {}
    #[Route('/sign-in', name:'sign_in', methods: ['GET', 'POST'])]
    public function signIn(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('User/sign_in.html.twig', [
            'controller_name' => 'UserController',
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/sign-up', name:'sign_up', methods: ['GET', 'POST'])]
    public function signUp(
        Request $request,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(UserType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();
            $user->setPassword(
                $passwordHasher->hashPassword(
                    $user,
                    $user->getPassword()
                )
            );
            $userRepository->save($user);

            return $this->redirectToRoute('sign_in');
        }

        return $this->render('User/sign_up.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}