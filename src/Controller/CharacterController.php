<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Character;
use App\Factory\CharacterFactory;
use App\FormType\CharacterType;
use App\FormType\GenerateCharacterType;
use App\Repository\CharacterTemplateRepository;
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
class CharacterController
{
    public function __construct(
        public Environment $twig,
        public FormFactoryInterface $formFactory,
        public UrlGeneratorInterface $router,
        public Security $security,
        public CharacterRepository $characterRepository,
    ) {}

    #[Route('/characters/{id}', name: 'show_character', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showCharacter(
        int $id
    ): Response
    {
        $character = $this->characterRepository->find($id);

        return new Response(
            $this->twig->render('character/show_character.html.twig', [
                'character' => $character,
            ])
        );
    }

    #[Route('/characters/{id}/edit',
        name: 'edit_character',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function editCharacter(
        Request $request,
        int $id,
    ): Response|RedirectResponse
    {
        $character = $this->characterRepository->find($id);

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

            $this->characterRepository->save($character);

            return new RedirectResponse($this->router->generate('show_game',
                ['id' => $character->getGame()->getId()]
            ));
        }

        return new Response(
            $this->twig->render('game_master/edit_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/characters/{id}/delete',
        name: 'delete_characters',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteCharacter(
        int $id,
    ): Response
    {
        $character = $this->characterRepository->find($id);

        if (!$character) {
            throw new NotFoundHttpException();
        }

        $gameId = $character->getGame()->getId();
        $this->characterRepository->delete($character);

        return new RedirectResponse($this->router->generate('show_game', ['id' => $gameId]));
    }

    #[Route('/characters/generate',
        name: 'generate_character',
        methods: ['GET', 'POST']
    )]
    public function generateCharacter(
        Request $request,
        CharacterFactory $characterFactory,
        CharacterTemplateRepository $characterTemplateRepository,
    ): Response|RedirectResponse
    {
        if ($request->get('characterTemplateId')) {
            $characterTemplate = $characterTemplateRepository->find($request->get('characterTemplateId'));
            $character = $characterFactory->createOneFromCharacterTemplate($characterTemplate);
        } else {
            $character = new Character();
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
            $this->twig->render('game_master/generate_default_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }
}