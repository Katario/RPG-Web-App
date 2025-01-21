<?php

declare(strict_types=1);

namespace App\Controller;


use App\Entity\PlayableCharacter;
use App\Factory\PlayableCharacterFactory;
use App\FormType\DefaultPlayableCharacterType;
use App\FormType\PlayableCharacterType;
use App\Repository\GameRepository;
use App\Repository\PlayableCharacterRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

#[AsController]
class GameMasterController
{
    public function __construct(
        public Environment $twig,
        public FormFactoryInterface $formFactory,
        public GameRepository $gameRepository,
        public Security $security
    ) {}

    #[Route('/game-master/games/{id}', name: 'game_master_show_game', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showGameMasterGame(
        GameRepository $gameRepository,
        PlayableCharacterRepository $playableCharacterRepository,
        int $id
    ): Response
    {
        $game = $gameRepository->find($id);
        $playableCharacters = $playableCharacterRepository->findBy(['game' => $game]);

        return new Response(
            $this->twig->render('GameMaster/show_game.html.twig', [
                'game' => $game,
                'playableCharacters' => $playableCharacters,
            ])
        );
    }

    #[Route('/game-master/playable-characters/{id}', name: 'game_master_show_playable_character', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showGameMasterPlayableCharacter(
        PlayableCharacterRepository $playableCharacterRepository,
        int $id
    ): Response
    {
        $playableCharacter = $playableCharacterRepository->find($id);

        return new Response(
            $this->twig->render('GameMaster/show_playable_character.html.twig', [
                'playableCharacter' => $playableCharacter,
            ])
        );
    }

    #[Route('/game-master/games/{id}/generate-playable-character',
        name: 'game_master_generate_default_playable_character',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function generateDefaultPlayableCharacter(
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

            return new RedirectResponse($router->generate('game_master_show_game',
                ['id' => $id]
            ));
        }

        return new Response(
            $this->twig->render('GameMaster/generate_default_playable_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/game-master/games/{gameId}/playable-characters/{playableCharacterId}/edit',
        name: 'game_master_edit_playable_character',
        methods: ['GET', 'POST']
    )]
    public function editGameMasterPlayableCharacter(
        Request               $request,
        GameRepository $gameRepository,
        PlayableCharacterRepository $playableCharacterRepository,
        UrlGeneratorInterface $router,
        #[MapQueryParameter] ?int $playableCharacterId,
        #[MapQueryParameter] ?int $gameId,
    ): Response|RedirectResponse
    {
        $playableCharacter = $playableCharacterRepository->find($playableCharacterId);
        if (!$playableCharacter) {
            throw new NotFoundHttpException();
        }

        $form = $this->formFactory->create(
            PlayableCharacterType::class,
            $playableCharacter
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var PlayableCharacter $playableCharacter */
            $playableCharacter = $form->getData();

            $game = $gameRepository->find($gameId);
            $playableCharacter->setGame($game);

            $playableCharacterRepository->save($playableCharacter);

            return new RedirectResponse($router->generate('game_master_show_game',
                ['id' => $gameId]
            ));
        }

        return new Response(
            $this->twig->render('GameMaster/edit_playable_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/game-master/playable-characters/{id}/delete',
        name: 'game_master_delete_playable_characters',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deletePlayableCharacter(
        int                   $id,
        UrlGeneratorInterface $router,
        PlayableCharacterRepository $playableCharacterRepository,
    ): Response
    {
        $playableCharacter = $playableCharacterRepository->find($id);

        if ($playableCharacter) {
            $playableCharacterRepository->delete($playableCharacter);
        }

        return new RedirectResponse($router->generate('home'));
    }
}