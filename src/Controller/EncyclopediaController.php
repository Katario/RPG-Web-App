<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Item;
use App\Entity\Skill;
use App\Entity\Spell;
use App\FormType\ItemType;
use App\FormType\SkillType;
use App\FormType\SpellType;
use App\Repository\ItemRepository;
use App\Repository\SkillRepository;
use App\Repository\SpellRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

#[AsController]
class EncyclopediaController
{
    public function __construct(
        private readonly RouterInterface $router,
        private readonly FormFactoryInterface $formFactory,
        private readonly Environment $twig
    ) {}

    #[Route('/encyclopedia', name: 'show_encyclopedia', methods: ['GET'])]
    public function showEncyclopedia(
        SpellRepository $spellRepository
    ): Response
    {
        $lastSpells = $spellRepository->getLastFiveSpells();

        return new Response(
            $this->twig->render('Encyclopedia/show_encyclopedia.html.twig', [
                'lastSpells' => $lastSpells,
            ])
        );
    }

    #[Route('/encyclopedia/create-spell',
        name: 'encyclopedia_create_spell',
        methods: ['GET', 'POST']
    )]
    public function createSpell(
        Request             $request,
        SpellRepository $spellRepository,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(SpellType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Spell $spell */
            $spell = $form->getData();

            $spellRepository->save($spell);

            return new RedirectResponse($this->router->generate('show_encyclopedia'));
        }

        return new Response(
            $this->twig->render('Encyclopedia/create_spell.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/encyclopedia/spells', name: 'encyclopedia_show_spells', methods: ['GET'])]
    public function showSpells(SpellRepository $spellRepository): Response
    {
        $spells = $spellRepository->findAll();

        return new Response(
            $this->twig->render('Encyclopedia/show_spells.html.twig', [
                'spells' => $spells
            ])
        );
    }

    #[Route('/encyclopedia/spells/{id}', name: 'encyclopedia_show_spell', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showSpell(
        SpellRepository $spellRepository,
        int                 $id
    ): Response
    {
        $spell = $spellRepository->find($id);

        return new Response(
            $this->twig->render('Encyclopedia/show_spell.html.twig', [
                'spell' => $spell
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/encyclopedia/spells/{id}/delete',
        name: 'encyclopedia_delete_spell',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteSpell(
        int                   $id,
        SpellRepository $spellRepository,
    ): Response
    {
        $spell = $spellRepository->find($id);

        if ($spell) {
            $spellRepository->delete($spell);
        }

        return new RedirectResponse($this->router->generate('show_spells'));
    }

    #[Route('/encyclopedia/create-item',
        name: 'encyclopedia_create_item',
        methods: ['GET', 'POST']
    )]
    public function createItem(
        Request             $request,
        ItemRepository $itemRepository,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(ItemType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Item $spell */
            $item = $form->getData();

            $itemRepository->save($item);

            return new RedirectResponse($this->router->generate('show_encyclopedia'));
        }

        return new Response(
            $this->twig->render('Encyclopedia/create_item.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/encyclopedia/create-skill',
        name: 'encyclopedia_create_skill',
        methods: ['GET', 'POST']
    )]
    public function createSkill(
        Request             $request,
        SkillRepository $skillRepository,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(SkillType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Skill $spell */
            $skill = $form->getData();

            $skillRepository->save($skill);

            return new RedirectResponse($this->router->generate('show_encyclopedia'));
        }

        return new Response(
            $this->twig->render('Encyclopedia/create_skill.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }
}