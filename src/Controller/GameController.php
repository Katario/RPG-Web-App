<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Game;
use App\Entity\User;
use App\FormType\GameType;
use App\Repository\GameRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

#[AsController]
class GameController
{
    public function __construct(
        public Environment $twig,
        public FormFactoryInterface $formFactory,
        public UrlGeneratorInterface $router,
        public GameRepository $gameRepository,
        public Security $security
    ) {}

    #[Route('/games/{id}', name: 'show_game', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showGame(
        int $id
    ): Response
    {
        $game = $this->gameRepository->find($id);

        return new Response(
            $this->twig->render('game/show_game.html.twig', [
                'game' => $game,
            ])
        );
    }

    #[Route('/games/create', name: 'create_game', methods: ['GET', 'POST'])]
    public function createGame(
        Request               $request,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(GameType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Game $game */
            $game = $form->getData();
            /** @var User $user */
            $user = $this->security->getUser();
            $game->setGameMaster($user);

            $this->gameRepository->save($game);

            return new RedirectResponse($this->router->generate('show_game', ['id' => $game->getId()]));
        }

        return new Response(
            $this->twig->render('game/create_game.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }
}