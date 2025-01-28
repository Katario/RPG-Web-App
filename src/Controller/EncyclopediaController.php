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
        SpellRepository $spellRepository,
        ItemRepository $itemRepository,
    ): Response
    {
        $lastSpells = $spellRepository->getLastFiveSpells();
        $lastItems = $itemRepository->getLastFiveItems();

        return new Response(
            $this->twig->render('Encyclopedia/show_encyclopedia.html.twig', [
                'lastSpells' => $lastSpells,
                'lastItems' => $lastItems,
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

        return new RedirectResponse($this->router->generate('encyclopedia_show_spells'));
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



    #[Route('/encyclopedia/items', name: 'encyclopedia_show_items', methods: ['GET'])]
    public function showItems(ItemRepository $itemRepository): Response
    {
        $items = $itemRepository->findAll();

        return new Response(
            $this->twig->render('Encyclopedia/show_items.html.twig', [
                'items' => $items
            ])
        );
    }

    #[Route('/encyclopedia/items/{id}', name: 'encyclopedia_show_item', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showItem(
        ItemRepository $itemRepository,
        int                 $id
    ): Response
    {
        $item = $itemRepository->find($id);

        return new Response(
            $this->twig->render('Encyclopedia/show_item.html.twig', [
                'item' => $item
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/encyclopedia/items/{id}/delete',
        name: 'encyclopedia_delete_item',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteItem(
        int                   $id,
        ItemRepository $itemRepository,
    ): Response
    {
        $item = $itemRepository->find($id);

        if ($item) {
            $itemRepository->delete($item);
        }

        return new RedirectResponse($this->router->generate('encyclopedia_show_items'));
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