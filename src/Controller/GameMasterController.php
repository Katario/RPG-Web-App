<?php

declare(strict_types=1);

namespace App\Controller;


use App\Entity\Armament;
use App\Entity\Character;
use App\Entity\Item;
use App\Entity\Monster;
use App\Entity\NonPlayableCharacter;
use App\Entity\Skill;
use App\Entity\Spell;
use App\Factory\CharacterFactory;
use App\FormType\GenerateArmamentType;
use App\FormType\GenerateCharacterType;
use App\FormType\CharacterType;
use App\FormType\GenerateMonsterType;
use App\FormType\GenerateNonPlayableCharacterType;
use App\FormType\ItemType;
use App\FormType\SkillType;
use App\FormType\SpellType;
use App\Repository\ArmamentRepository;
use App\Repository\GameRepository;
use App\Repository\CharacterRepository;
use App\Repository\ItemRepository;
use App\Repository\MonsterRepository;
use App\Repository\NonPlayableCharacterRepository;
use App\Repository\SkillRepository;
use App\Repository\SpellRepository;
use Doctrine\ORM\PersistentCollection;
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
            $this->twig->render('game_master/show_game.html.twig', [
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
            $this->twig->render('game_master/show_character.html.twig', [
                'character' => $character,
            ])
        );
    }

    // @TODO need to generate from the encyclopedia API and not from scratch
    #[Route('/game-master/games/{id}/generate-character',
        name: 'game_master_generate_character',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function generateCharacter(
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
            $this->twig->render('game_master/generate_default_character.html.twig', [
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
            $this->twig->render('game_master/edit_character.html.twig', [
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

    // @TODO need to generate from the encyclopedia API and not from scratch
    #[Route('/game-master/games/{id}/generate-armament',
        name: 'game_master_generate_armament',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function generateArmament(
        Request             $request,
        ArmamentRepository $armamentRepository,
        RouterInterface     $router,
        int                 $id
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(GenerateArmamentType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Armament $armament */
            $armament = $form->getData();

            $armament->setGame($this->gameRepository->find($id));

            $armamentRepository->save($armament);

            return new RedirectResponse($router->generate('game_master_show_game',
                ['id' => $id]
            ));
        }

        return new Response(
            $this->twig->render('game_master/generate_armament.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    // @TODO need to generate from the encyclopedia API and not from scratch
    #[Route('/game-master/games/{id}/generate-monster',
        name: 'game_master_generate_monster',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function generateMonster(
        Request             $request,
        MonsterRepository $monsterRepository,
        RouterInterface     $router,
        int                 $id
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(GenerateMonsterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Monster $monster */
            $monster = $form->getData();

            $monster->setGame($this->gameRepository->find($id));

            $monsterRepository->save($monster);

            return new RedirectResponse($router->generate('game_master_show_game',
                ['id' => $id]
            ));
        }

        return new Response(
            $this->twig->render('game_master/generate_monster.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/game-master/monsters/{id}', name: 'game_master_show_monster', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showGameMasterMonster(
        MonsterRepository $monsterRepository,
        int                 $id
    ): Response
    {
        $monster = $monsterRepository->find($id);

        return new Response(
            $this->twig->render('game_master/show_monster.html.twig', [
                'monster' => $monster,
            ])
        );
    }


    #[Route('/game-master/monsters/{id}/edit',
        name: 'game_master_edit_monster',
        methods: ['GET', 'POST']
    )]
    public function editGameMasterMonster(
        Request                   $request,
        MonsterRepository       $monsterRepository,
        UrlGeneratorInterface     $router,
        #[MapQueryParameter] ?int $id,
    ): Response|RedirectResponse
    {
        $monster = $monsterRepository->find($id);

        if (!$monster) {
            throw new NotFoundHttpException();
        }

        $form = $this->formFactory->create(
            GenerateNonPlayableCharacterType::class,
            $monster
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Monster $monster */
            $monster = $form->getData();

            $monsterRepository->save($monster);

            return new RedirectResponse($router->generate('home'));
        }

        return new Response(
            $this->twig->render('game_master/edit_monster.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/game-master/monsters/{id}/delete',
        name: 'game_master_delete_monster',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteMonster(
        int                   $id,
        UrlGeneratorInterface $router,
        MonsterRepository   $monsterRepository,
    ): Response
    {
        /** @var PersistentCollection $monster */
        $monster = $monsterRepository->find($id);

        if ($monster) {
            $monsterRepository->delete($monster);
        }

        return new RedirectResponse($router->generate('home'));
    }





    // @TODO need to generate from the encyclopedia API and not from scratch
    #[Route('/game-master/games/{id}/generate-non-playable-character',
        name: 'game_master_generate_non_playable_character',
        requirements: ['id' => '\d+'],
        methods: ['GET', 'POST']
    )]
    public function generateNonPlayableCharacter(
        Request             $request,
        NonPlayableCharacterRepository $nonPlayableCharacterRepository,
        RouterInterface     $router,
        int                 $id
    ): Response|RedirectResponse
    {
        $form = $this->formFactory->create(GenerateNonPlayableCharacterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var NonPlayableCharacter $nonPlayableCharacter */
            $nonPlayableCharacter = $form->getData();

            $nonPlayableCharacter->setGame($this->gameRepository->find($id));

            $nonPlayableCharacterRepository->save($nonPlayableCharacter);

            return new RedirectResponse($router->generate('game_master_show_game',
                ['id' => $id]
            ));
        }

        return new Response(
            $this->twig->render('game_master/generate_non_playable_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    #[Route('/game-master/non-playable-characters/{id}', name: 'game_master_show_non_playable_character', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showGameMasterNonPlayableCharacter(
        NonPlayableCharacterRepository $nonPlayableCharacterRepository,
        int                 $id
    ): Response
    {
        $nonPlayableCharacter = $nonPlayableCharacterRepository->find($id);

        return new Response(
            $this->twig->render('game_master/show_non_playable_character.html.twig', [
                'nonPlayableCharacter' => $nonPlayableCharacter,
            ])
        );
    }

    #[Route('/game-master/non-playable-characters/{id}/edit',
        name: 'game_master_edit_non_playable_character',
        methods: ['GET', 'POST']
    )]
    public function editGameMasterNonPlayableCharacter(
        Request                   $request,
        NonPlayableCharacterRepository       $nonPlayableCharacterRepository,
        UrlGeneratorInterface     $router,
        #[MapQueryParameter] ?int $id,
    ): Response|RedirectResponse
    {
        $nonPlayableCharacter = $nonPlayableCharacterRepository->find($id);
        if (!$nonPlayableCharacter) {
            throw new NotFoundHttpException();
        }

        $form = $this->formFactory->create(
             GenerateNonPlayableCharacterType::class,
            $nonPlayableCharacter
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var NonPlayableCharacter $nonPlayableCharacter */
            $nonPlayableCharacter = $form->getData();

            $nonPlayableCharacterRepository->save($nonPlayableCharacter);

            return new RedirectResponse($router->generate('home'));
        }

        return new Response(
            $this->twig->render('game_master/edit_non_playable_character.html.twig', [
                'form' => $form->createView(),
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/game-master/non-playable-characters/{id}/delete',
        name: 'game_master_delete_non_playable_character',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteNonPlayableCharacter(
        int                   $id,
        UrlGeneratorInterface $router,
        NonPlayableCharacterRepository   $nonPlayableCharacterRepository,
    ): Response
    {
        $nonPlayableCharacter = $nonPlayableCharacterRepository->find($id);
        dump($nonPlayableCharacter, $nonPlayableCharacter->getArmaments()->initialize(), $id);

        if ($nonPlayableCharacter) {
            $nonPlayableCharacterRepository->delete($nonPlayableCharacter);
        }

        return new RedirectResponse($router->generate('home'));
    }
}