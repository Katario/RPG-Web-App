<?php

declare(strict_types=1);

namespace App\Controller;


use App\Entity\Character;
use App\Factory\CharacterFactory;
use App\FormType\GenerateCharacterType;
use App\FormType\CharacterType;
use App\Repository\GameRepository;
use App\Repository\CharacterRepository;
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
        GameRepository      $gameRepository,
        CharacterRepository $characterRepository,
        int                 $id
    ): Response
    {
        $game = $gameRepository->find($id);
        $characters = $characterRepository->findBy(['game' => $game]);

        return new Response(
            $this->twig->render('GameMaster/show_game.html.twig', [
                'game' => $game,
                'characters' => $characters,
            ])
        );
    }

    #[Route('/game-master/characters/{id}', name: 'game_master_show_character', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showGameMasterCharacter(
        CharacterRepository $characterRepository,
        int                 $id
    ): Response
    {
        $character = $characterRepository->find($id);

        return new Response(
            $this->twig->render('GameMaster/show_character.html.twig', [
                'character' => $character,
            ])
        );
    }

    #[Route('/game-master/games/{id}/generate-character',
        name: 'game_master_generate_default_character',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function generateDefaultCharacter(
        Request             $request,
        CharacterRepository $characterRepository,
        CharacterFactory    $characterFactory,
        RouterInterface     $router,
        int                 $id
    ): Response|RedirectResponse
    {
        $newCharacter = $characterFactory->createNew();
        $form = $this->formFactory->create(
            GenerateCharacterType::class,
            $newCharacter
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Character $character */
            $character = $form->getData();

            $character->setGame(
                $this->gameRepository->find($id)
            );

            $characterRepository->save($character);

            return new RedirectResponse($router->generate('game_master_show_game',
                ['id' => $id]
            ));
        }

        return new Response(
            $this->twig->render('GameMaster/generate_default_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/game-master/games/{gameId}/characters/{characterId}/edit',
        name: 'game_master_edit_character',
        methods: ['GET', 'POST']
    )]
    public function editGameMasterCharacter(
        Request                   $request,
        GameRepository            $gameRepository,
        CharacterRepository       $characterRepository,
        UrlGeneratorInterface     $router,
        #[MapQueryParameter] ?int $characterId,
        #[MapQueryParameter] ?int $gameId,
    ): Response|RedirectResponse
    {
        $character = $characterRepository->find($characterId);
        if (!$character) {
            throw new NotFoundHttpException();
        }

        $form = $this->formFactory->create(
            CharacterType::class,
            $character
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Character $character */
            $character = $form->getData();

            $game = $gameRepository->find($gameId);
            $character->setGame($game);

            $characterRepository->save($character);

            return new RedirectResponse($router->generate('game_master_show_game',
                ['id' => $gameId]
            ));
        }

        return new Response(
            $this->twig->render('GameMaster/edit_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/game-master/characters/{id}/delete',
        name: 'game_master_delete_characters',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteCharacter(
        int                   $id,
        UrlGeneratorInterface $router,
        CharacterRepository   $characterRepository,
    ): Response
    {
        $character = $characterRepository->find($id);

        if ($character) {
            $characterRepository->delete($character);
        }

        return new RedirectResponse($router->generate('home'));
    }
}