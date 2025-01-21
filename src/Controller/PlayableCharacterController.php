<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\PlayableCharacter;
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
use Twig\Environment;

#[AsController]
class PlayableCharacterController
{
    public function __construct(
        public Environment $twig,
        public FormFactoryInterface $formFactory,
        public Security $security,
        public PlayableCharacterRepository $playableCharacterRepository,
    ) {}

    #[Route('/playable-characters', name: 'show_playable_characters', methods: ['GET'])]
    public function showPlayableCharacters(): Response
    {
        $playableCharacters = $this->playableCharacterRepository->findAll();

        return new Response(
            $this->twig->render('PlayableCharacter/show_playable_characters.html.twig', [
                'playableCharacters' => $playableCharacters,
            ])
        );
    }

    #[Route('/playable-characters/{id}', name: 'show_playable_character', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showPlayableCharacter(
        PlayableCharacterRepository $playableCharacterRepository,
        int $id
    ): Response
    {
        $playableCharacter = $playableCharacterRepository->find($id);

        return new Response(
            $this->twig->render('PlayableCharacter/show_playable_character.html.twig', [
                'playableCharacter' => $playableCharacter,
            ])
        );
    }

//    #[Route('/playable-characters/create', name: 'create_playable_character', methods: ['GET', 'POST'])]
//    public function createPlayableCharacter(
//        Request               $request,
//        PlayableCharacterRepository $playableCharacterRepository,
//        GameRepository $gameRepository,
//        UrlGeneratorInterface $router,
//        #[MapQueryParameter] ?int $gameId
//    ): Response|RedirectResponse
//    {
//        $form = $this->formFactory->create(PlayableCharacterType::class);
//
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            /** @var PlayableCharacter $playableCharacter */
//            $playableCharacter = $form->getData();
//
//            $game = $gameRepository->find($gameId);
//            $playableCharacter->setGame($game);
//
//            $playableCharacterRepository->save($playableCharacter);
//
//            return new RedirectResponse($router->generate('show_game',
//                ['id' => $gameId]
//            ));
//        }
//
//        return new Response(
//            $this->twig->render('PlayableCharacter/create_playable_character.html.twig', [
//                'form' => $form->createView(),
//            ])
//        );
//    }

    #[Route('/games/{gameId}/playable-characters/{playableCharacterId}/edit', name: 'edit_playable_character', methods: ['GET', 'POST'])]
    public function editPlayableCharacter(
        Request               $request,
        GameRepository $gameRepository,
        UrlGeneratorInterface $router,
        #[MapQueryParameter] ?int $playableCharacterId,
        #[MapQueryParameter] ?int $gameId,
    ): Response|RedirectResponse
    {
        $playableCharacter = $this->playableCharacterRepository->find($playableCharacterId);
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

            $this->playableCharacterRepository->save($playableCharacter);

            return new RedirectResponse($router->generate('show_game',
                ['id' => $gameId]
            ));
        }

        return new Response(
            $this->twig->render('PlayableCharacter/create_playable_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/playable-characters/delete/{id}', name: 'delete_playable_characters', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function deletePlayableCharacter(
        int                   $id,
        UrlGeneratorInterface $router,
    ): Response
    {
        $playableCharacter = $this->playableCharacterRepository->find($id);

        if ($playableCharacter) {
            $this->playableCharacterRepository->delete($playableCharacter);
        }

        return new RedirectResponse($router->generate('home'));
    }
}