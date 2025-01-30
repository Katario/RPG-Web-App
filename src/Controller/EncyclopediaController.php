<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Armament;
use App\Entity\ArmamentTemplate;
use App\Entity\CharacterTemplate;
use App\Entity\Item;
use App\Entity\MonsterTemplate;
use App\Entity\NonPlayableCharacterTemplate;
use App\Entity\Skill;
use App\Entity\Spell;
use App\FormType\ArmamentTemplateType;
use App\FormType\CharacterTemplateType;
use App\FormType\ItemType;
use App\FormType\MonsterTemplateType;
use App\FormType\NonPlayableCharacterTemplateType;
use App\FormType\SkillType;
use App\FormType\SpellType;
use App\Repository\ArmamentRepository;
use App\Repository\ArmamentTemplateRepository;
use App\Repository\CharacterTemplateRepository;
use App\Repository\ItemRepository;
use App\Repository\MonsterTemplateRepository;
use App\Repository\NonPlayableCharacterTemplateRepository;
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
        SkillRepository $skillRepository,
        ArmamentTemplateRepository $armamentTemplateRepository,
        MonsterTemplateRepository $monsterTemplateRepository,
        NonPlayableCharacterTemplateRepository $nonPlayableCharacterTemplateRepository,
        CharacterTemplateRepository $characterTemplateRepository,
    ): Response
    {
        $lastSpells = $spellRepository->getLastFiveSpells();
        $lastItems = $itemRepository->getLastFiveItems();
        $lastSkills = $skillRepository->getLastFiveSkills();
        $lastArmamentTemplates = $armamentTemplateRepository->getLastFiveArmamentTemplates();
        $lastMonsterTemplates = $monsterTemplateRepository->getLastFiveMonsterTemplates();
        $lastNonPlayableCharacterTemplates = $nonPlayableCharacterTemplateRepository->getLastFiveNonPlayableCharacterTemplates();
        $lastCharacterTemplates = $characterTemplateRepository->getLastFiveCharacterTemplates();

        return new Response(
            $this->twig->render('Encyclopedia/show_encyclopedia.html.twig', [
                'lastSpells' => $lastSpells,
                'lastItems' => $lastItems,
                'lastSkills' => $lastSkills,
                'lastArmamentTemplates' => $lastArmamentTemplates,
                'lastMonsterTemplates' => $lastMonsterTemplates,
                'lastNonPlayableCharacterTemplates' => $lastNonPlayableCharacterTemplates,
                'lastCharacterTemplates' => $lastCharacterTemplates,
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

    #[Route('/encyclopedia/skills', name: 'encyclopedia_show_skills', methods: ['GET'])]
    public function showSkills(SkillRepository $skillRepository): Response
    {
        $skills = $skillRepository->findAll();

        return new Response(
            $this->twig->render('Encyclopedia/show_skills.html.twig', [
                'skills' => $skills
            ])
        );
    }

    #[Route('/encyclopedia/skills/{id}', name: 'encyclopedia_show_skill', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showSkill(
        SkillRepository $skillRepository,
        int                 $id
    ): Response
    {
        $skill = $skillRepository->find($id);

        return new Response(
            $this->twig->render('Encyclopedia/show_skill.html.twig', [
                'skill' => $skill
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/encyclopedia/skills/{id}/delete',
        name: 'encyclopedia_delete_skill',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteSkill(
        int                   $id,
        SkillRepository $skillRepository,
    ): Response
    {
        $skill = $skillRepository->find($id);

        if ($skill) {
            $skillRepository->delete($skill);
        }

        return new RedirectResponse($this->router->generate('encyclopedia_show_skills'));
    }

    #[Route('/encyclopedia/create-armament',
        name: 'encyclopedia_create_armament_template',
        methods: ['GET', 'POST']
    )]
    public function createArmamentTemplate(
        Request             $request,
        ArmamentTemplateRepository $armamentTemplateRepository,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(ArmamentTemplateType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ArmamentTemplate $armamentTemplate */
            $armamentTemplate = $form->getData();

            $armamentTemplateRepository->save($armamentTemplate);

            return new RedirectResponse($this->router->generate('show_encyclopedia'));
        }

        return new Response(
            $this->twig->render('Encyclopedia/create_armament_template.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/encyclopedia/armaments', name: 'encyclopedia_show_armament_templates', methods: ['GET'])]
    public function showArmamentTemplates(ArmamentTemplateRepository $armamentTemplateRepository): Response
    {
        $armamentTemplates = $armamentTemplateRepository->findAll();

        return new Response(
            $this->twig->render('Encyclopedia/show_armament_templates.html.twig', [
                'armamentTemplates' => $armamentTemplates
            ])
        );
    }

    #[Route('/encyclopedia/armaments/{id}', name: 'encyclopedia_show_armament_template', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showArmamentTemplate(
        ArmamentTemplateRepository $armamentTemplateRepository,
        int                 $id
    ): Response
    {
        $armamentTemplate = $armamentTemplateRepository->find($id);

        return new Response(
            $this->twig->render('Encyclopedia/show_armament_template.html.twig', [
                'armamentTemplate' => $armamentTemplate
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/encyclopedia/armament/{id}/delete',
        name: 'encyclopedia_delete_armament_template',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteArmamentTemplate(
        int                   $id,
        ArmamentTemplateRepository $armamentTemplateRepository,
    ): Response
    {
        $armamentTemplate = $armamentTemplateRepository->find($id);

        if ($armamentTemplate) {
            $armamentTemplateRepository->delete($armamentTemplate);
        }

        return new RedirectResponse($this->router->generate('encyclopedia_show_armament_templates'));
    }

    #[Route('/encyclopedia/create-monster',
        name: 'encyclopedia_create_monster_template',
        methods: ['GET', 'POST']
    )]
    public function createMonsterTemplate(
        Request             $request,
        MonsterTemplateRepository $monsterTemplateRepository,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(MonsterTemplateType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var MonsterTemplate $monsterTemplate */
            $monsterTemplate = $form->getData();

            $monsterTemplateRepository->save($monsterTemplate);

            return new RedirectResponse($this->router->generate('show_encyclopedia'));
        }

        return new Response(
            $this->twig->render('Encyclopedia/create_monster_template.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/encyclopedia/monsters', name: 'encyclopedia_show_monster_templates', methods: ['GET'])]
    public function showMonsterTemplates(MonsterTemplateRepository $monsterTemplateRepository): Response
    {
        $monsterTemplates = $monsterTemplateRepository->findAll();

        return new Response(
            $this->twig->render('Encyclopedia/show_monster_templates.html.twig', [
                'monsterTemplates' => $monsterTemplates
            ])
        );
    }

    #[Route('/encyclopedia/monsters/{id}', name: 'encyclopedia_show_monster_template', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showMonsterTemplate(
        MonsterTemplateRepository $monsterTemplateRepository,
        int                 $id
    ): Response
    {
        $monsterTemplate = $monsterTemplateRepository->find($id);

        return new Response(
            $this->twig->render('Encyclopedia/show_monster_template.html.twig', [
                'monsterTemplate' => $monsterTemplate
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/encyclopedia/monster/{id}/delete',
        name: 'encyclopedia_delete_monster_template',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteMonsterTemplate(
        int                   $id,
        MonsterTemplateRepository $monsterTemplateRepository,
    ): Response
    {
        $monsterTemplate = $monsterTemplateRepository->find($id);

        if ($monsterTemplate) {
            $monsterTemplateRepository->delete($monsterTemplate);
        }

        return new RedirectResponse($this->router->generate('encyclopedia_show_monster_templates'));
    }



    #[Route('/encyclopedia/create-non-playable-character',
        name: 'encyclopedia_create_non_playable_character_template',
        methods: ['GET', 'POST']
    )]
    public function createNonPlayableCharacterTemplate(
        Request             $request,
        NonPlayableCharacterTemplateRepository $nonPlayableCharacterTemplateRepository,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(NonPlayableCharacterTemplateType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var NonPlayableCharacterTemplate $nonPlayableCharacterTemplate */
            $nonPlayableCharacterTemplate = $form->getData();

            $nonPlayableCharacterTemplateRepository->save($nonPlayableCharacterTemplate);

            return new RedirectResponse($this->router->generate('show_encyclopedia'));
        }

        return new Response(
            $this->twig->render('Encyclopedia/create_non_playable_character_template.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/encyclopedia/nonPlayableCharacters', name: 'encyclopedia_show_non_playable_character_templates', methods: ['GET'])]
    public function showNonPlayableCharacterTemplates(NonPlayableCharacterTemplateRepository $nonPlayableCharacterTemplateRepository): Response
    {
        $nonPlayableCharacterTemplates = $nonPlayableCharacterTemplateRepository->findAll();

        return new Response(
            $this->twig->render('Encyclopedia/show_non_playable_character_templates.html.twig', [
                'nonPlayableCharacterTemplates' => $nonPlayableCharacterTemplates
            ])
        );
    }

    #[Route('/encyclopedia/nonPlayableCharacters/{id}', name: 'encyclopedia_show_non_playable_character_template', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showNonPlayableCharacterTemplate(
        NonPlayableCharacterTemplateRepository $nonPlayableCharacterTemplateRepository,
        int                 $id
    ): Response
    {
        $nonPlayableCharacterTemplate = $nonPlayableCharacterTemplateRepository->find($id);

        return new Response(
            $this->twig->render('Encyclopedia/show_non_playable_character_template.html.twig', [
                'nonPlayableCharacterTemplate' => $nonPlayableCharacterTemplate
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/encyclopedia/nonPlayableCharacter/{id}/delete',
        name: 'encyclopedia_delete_non_playable_character_template',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteNonPlayableCharacterTemplate(
        int                   $id,
        NonPlayableCharacterTemplateRepository $nonPlayableCharacterTemplateRepository,
    ): Response
    {
        $nonPlayableCharacterTemplate = $nonPlayableCharacterTemplateRepository->find($id);

        if ($nonPlayableCharacterTemplate) {
            $nonPlayableCharacterTemplateRepository->delete($nonPlayableCharacterTemplate);
        }

        return new RedirectResponse($this->router->generate('encyclopedia_show_non_playable_character_templates'));
    }












    #[Route('/encyclopedia/create-character',
        name: 'encyclopedia_create_character_template',
        methods: ['GET', 'POST']
    )]
    public function createCharacterTemplate(
        Request             $request,
        CharacterTemplateRepository $characterTemplateRepository,
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(CharacterTemplateType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var CharacterTemplate $characterTemplate */
            $characterTemplate = $form->getData();

            $characterTemplateRepository->save($characterTemplate);

            return new RedirectResponse($this->router->generate('show_encyclopedia'));
        }

        return new Response(
            $this->twig->render('Encyclopedia/create_character_template.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/encyclopedia/characters', name: 'encyclopedia_show_character_templates', methods: ['GET'])]
    public function showCharacterTemplates(CharacterTemplateRepository $characterTemplateRepository): Response
    {
        $characterTemplates = $characterTemplateRepository->findAll();

        return new Response(
            $this->twig->render('Encyclopedia/show_character_templates.html.twig', [
                'characterTemplates' => $characterTemplates
            ])
        );
    }

    #[Route('/encyclopedia/characters/{id}', name: 'encyclopedia_show_character_template', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showCharacterTemplate(
        CharacterTemplateRepository $characterTemplateRepository,
        int                 $id
    ): Response
    {
        $characterTemplate = $characterTemplateRepository->find($id);

        return new Response(
            $this->twig->render('Encyclopedia/show_character_template.html.twig', [
                'characterTemplate' => $characterTemplate
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/encyclopedia/character/{id}/delete',
        name: 'encyclopedia_delete_character_template',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteCharacterTemplate(
        int                   $id,
        CharacterTemplateRepository $characterTemplateRepository,
    ): Response
    {
        $characterTemplate = $characterTemplateRepository->find($id);

        if ($characterTemplate) {
            $characterTemplateRepository->delete($characterTemplate);
        }

        return new RedirectResponse($this->router->generate('encyclopedia_show_character_templates'));
    }
}