<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Game;
use App\Entity\PlayableCharacter;
use App\Factory\PlayableCharacterFactory;
use App\FormType\DefaultPlayableCharacterType;
use App\FormType\GameType;
use App\FormType\PlayableCharacterType;
use App\Repository\GameRepository;
use App\Repository\PlayableCharacterRepository;
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

    #[Route('/games/{id}', name: 'show_game', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showGame(
        GameRepository $gameRepository,
        PlayableCharacterRepository $playableCharacterRepository,
        int $id
    ): Response
    {
        $game = $gameRepository->find($id);
        $playableCharacters = $playableCharacterRepository->findBy(['game' => $game]);

        return new Response(
            $this->twig->render('Game/show_game.html.twig', [
                'game' => $game,
                'playableCharacters' => $playableCharacters,
            ])
        );
    }

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

            $game->setGameMaster($this->security->getUser());

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

    #[Route('/games/{id}/generate-playable-character', name: 'generate_default_playable_character', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function createPlayableCharacter(
        Request $request,
        PlayableCharacterRepository $playableCharacterRepository,
        PlayableCharacterFactory $playableCharacterFactory,
        RouterInterface $router,
        int $id
    ): Response|RedirectResponse
    {
        $newPlayableCharacter = $playableCharacterFactory->createNew();
        $form = $this->formFactory->create(
            DefaultPlayableCharacterType::class,
            $newPlayableCharacter
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var PlayableCharacter $playableCharacter */
            $playableCharacter = $form->getData();

            $playableCharacter->setGame(
                $this->gameRepository->find($id)
            );

            $playableCharacterRepository->save($playableCharacter);

            return new RedirectResponse($router->generate('show_game',
                ['id' => $id]
            ));
        }

        return new Response(
            $this->twig->render('PlayableCharacter/generate_default_playable_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }
}