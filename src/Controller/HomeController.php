<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Twig\Environment;

#[AsController]
class HomeController
{
    public function __construct(
        public Environment $twig,
        public Security $security,
        public GameRepository $gameRepository,
    ) {
    }

    #[Route('/', name: 'home', methods: ['GET'])]
    public function showGames(): Response
    {
        $user = $this->security->getUser();
        $allGames = $this->getGamesByGameMaster($user);

        return new Response(
            $this->twig->render('main/main.html.twig', [
                'user' => $user,
                'games' => $allGames,
            ])
        );
    }

    /** @return Game[] */
    private function getGamesByGameMaster(UserInterface $user): array
    {
        $games = [];
        foreach ($this->gameRepository->getGamesAsGameMaster($user) as $game) {
            $games[] = $game;
        }

        return $games;
    }
}
