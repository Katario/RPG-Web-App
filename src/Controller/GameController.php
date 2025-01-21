<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Character;
use App\Entity\User;
use App\Factory\CharacterFactory;
use App\FormType\GenerateCharacterType;
use App\FormType\GameType;
use App\FormType\CharacterType;
use App\Repository\GameRepository;
use App\Repository\CharacterRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

#[AsController]
class GameController
{
    public function __construct(
        public Environment $twig,
        public FormFactoryInterface $formFactory,
        public GameRepository $gameRepository,
        public Security $security
    ) {}

    #[Route('/games/create', name: 'create_game', methods: ['GET', 'POST'])]
    public function createGame(
        Request               $request,
        GameRepository $gameRepository,
        UrlGeneratorInterface $router,
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

            $gameRepository->save($game);

            return new RedirectResponse($router->generate('show_game',
                ['id' => $game->getId()]
            ));
        }

        return new Response(
            $this->twig->render('Game/create_game.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }
}