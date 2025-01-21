<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

#[AsController]
class HomeController
{
    public function __construct(
        public Environment $twig,
        public Security $security,
        public GameRepository $gameRepository
    ) {}

    #[Route('/', name: 'home', methods: ['GET'])]
    public function showGames(): Response
    {
        $user = $this->security->getUser();
        $allGames = $this->getGamesByUser($user);

        return new Response(
            $this->twig->render('Home/home.html.twig', [
                'user' => $this->security->getUser(),
                'games' => $allGames,
            ])
        );
    }

    /**
     * @return Game[]
     */
    private function getGamesByUser(): array
    {
        # Retrieve games where user is GM
        $games = [];
        /** @var Game $game */
//        foreach ($this->gameRepository->findBy(['gameMaster' => $this->security->getUser()->getId()]) as $game)
        foreach ($this->gameRepository->getGamesByUser($this->security->getUser()) as $game)
        {
            $games[] = $game;
        }

        # Retrieve games where user is a playable Character
        foreach ($this->gameRepository->getGamesWithPlayableCharacterByUser($this->security->getUser()) as $game)
        {
            if (!in_array($game, $games)) {
                $games[] = $game;
            }
        }

        return $games;
    }
}