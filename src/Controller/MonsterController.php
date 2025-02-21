<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Monster;
use App\Factory\MonsterFactory;
use App\FormType\MonsterType;
use App\Repository\MonsterRepository;
use App\Repository\MonsterTemplateRepository;
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
class MonsterController
{
    public function __construct(
        public readonly MonsterRepository $monsterRepository,
        public readonly Environment $twig,
        public readonly UrlGeneratorInterface $router,
        public readonly FormFactoryInterface $formFactory,
    )
    {}

    #[Route('/monsters/{id}', name: 'show_monster', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showMonster(
        int $id
    ): Response
    {
        $monster = $this->monsterRepository->find($id);

        return new Response(
            $this->twig->render('game_master/show.html.twig', [
                'monster' => $monster,
            ])
        );
    }


    #[Route('/monsters/{id}/edit',
        name: 'edit_monster',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function editMonster(
        Request $request,
        int $id,
    ): Response|RedirectResponse
    {
        $monster = $this->monsterRepository->find($id);

        if (!$monster) {
            throw new NotFoundHttpException();
        }

        $form = $this->formFactory->create(
            MonsterType::class,
            $monster
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Monster $monster */
            $monster = $form->getData();

            $this->monsterRepository->save($monster);

            return new RedirectResponse($this->router->generate('home'));
        }

        return new Response(
            $this->twig->render('game_master/edit.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/monsters/{id}/delete',
        name: 'delete_monster',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteMonster(
        int                   $id,
    ): Response
    {
        /** @var Monster $monster */
        $monster = $this->monsterRepository->find($id);

        if ($monster) {
            $this->monsterRepository->delete($monster);
        }

        return new RedirectResponse($this->router->generate('home'));
    }

    #[Route('/monsters/generate',
        name: 'generate_monster',
        methods: ['GET', 'POST']
    )]
    public function generateMonster(
        Request $request,
        MonsterTemplateRepository $monsterTemplateRepository,
        MonsterFactory $monsterFactory,
    ): Response|RedirectResponse
    {
        if ($request->get('monsterTemplateId')) {
            $monsterTemplate = $monsterTemplateRepository->find($request->get('monsterTemplateId'));
            $monster = $monsterFactory->createOneFromMonsterTemplate($monsterTemplate);
        } else {
            $monster = new Monster();
        }
        $form = $this->formFactory->create(MonsterType::class, $monster);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Monster $monster */
            $monster = $form->getData();

            $this->monsterRepository->save($monster);

            return new RedirectResponse($this->router->generate('show_game',
                ['id' => $monster->getGame()->getId()]
            ));
        }

        return new Response(
            $this->twig->render('game_master/generate.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }
}