<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Character;
use App\Entity\Game;
use App\Factory\CharacterFactory;
use App\FormType\CharacterType;
use App\Repository\CharacterRepository;
use App\Repository\CharacterTemplateRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

#[AsController]
class CharacterController
{
    public function __construct(
        public Environment $twig,
        public FormFactoryInterface $formFactory,
        public UrlGeneratorInterface $router,
        public Security $security,
        public CharacterRepository $characterRepository,
    ) {
    }

    #[Route('/games/{gameId}/characters/{id}', name: 'show_character', requirements: ['gameId' => '\d+', 'id' => '\d+'], methods: ['GET'])]
    public function showCharacter(
        int $id,
    ): Response {
        $character = $this->characterRepository->find($id);

        return new Response(
            $this->twig->render('character/show.html.twig', [
                'character' => $character,
            ])
        );
    }

    #[Route('/games/{gameId}/characters/{id}/edit',
        name: 'edit_character',
        requirements: ['gameId' => '\d+', 'id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function editCharacter(
        Request $request,
        int $id,
    ): Response|RedirectResponse {
        $character = $this->characterRepository->find($id);

        if (!$character) {
            throw new NotFoundHttpException();
        }

        $form = $this->formFactory->create(
            CharacterType::class,
            $character,
            [
                'gameId' => $character->getGame()->getId(),
                'characterId' => $character->getId(),
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Character $character */
            $character = $form->getData();

            $this->characterRepository->save($character);

            return new RedirectResponse($this->router->generate('show_game',
                ['id' => $character->getGame()->getId()]
            ));
        }

        return new Response(
            $this->twig->render('character/edit.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/games/{gameId}/characters/{id}/delete',
        name: 'delete_character',
        requirements: ['gameId' => '\d+', 'id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteCharacter(
        int $id,
    ): Response {
        $character = $this->characterRepository->find($id);

        if (!$character) {
            throw new NotFoundHttpException();
        }

        $gameId = $character->getGame()->getId();
        $this->characterRepository->delete($character);

        return new RedirectResponse($this->router->generate('show_game', ['id' => $gameId]));
    }

    #[Route('/games/{gameId}/characters/generate',
        name: 'generate_character',
        requirements: ['gameId' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function generateCharacter(
        Request $request,
        #[MapEntity(mapping: ['gameId' => 'id'])] Game $game,
        CharacterFactory $characterFactory,
        CharacterTemplateRepository $characterTemplateRepository,
    ): Response|RedirectResponse {
        if ($request->get('characterTemplateId')) {
            $characterTemplate = $characterTemplateRepository->find($request->get('characterTemplateId'));
            $character = $characterFactory->createOneFromCharacterTemplate($characterTemplate);
            $character->setGame($game);
        } else {
            $character = new Character();
            $character->setGame($game);
        }

        $form = $this->formFactory->create(
            CharacterType::class,
            $character
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Character $character */
            $character = $form->getData();

            $this->characterRepository->save($character);

            return new RedirectResponse($this->router->generate('show_game',
                ['id' => $character->getGame()->getId()]
            ));
        }

        return new Response(
            $this->twig->render('character/generate.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }
}
