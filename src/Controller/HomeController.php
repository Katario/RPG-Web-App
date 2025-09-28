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
        $allGames = $this->getGamesByUser($user);

        return new Response(
            $this->twig->render('main/main.html.twig', [
                'user' => $user,
                'games' => $allGames,
            ])
        );
    }

    /** @return Game[] */
    private function getGamesByUser(UserInterface $user): array
    {
        // Games where User is GM
        $games = [];
        foreach ($this->gameRepository->getGamesByUser($user) as $game) {
            $games[] = $game;
        }

        // Games where User is a playable character
        foreach ($this->gameRepository->getGamesWithCharacterByUser($user) as $game) {
            if (!in_array($game, $games)) {
                $games[] = $game;
            }
        }

        return $games;
    }
}
