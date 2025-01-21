<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\PlayableCharacter;
use App\FormType\PlayableCharacterType;
use App\Repository\GameRepository;
use App\Repository\PlayableCharacterRepository;
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
use Twig\Environment;

#[AsController]
class PlayableCharacterController
{
    public function __construct(
        public Environment $twig,
        public FormFactoryInterface $formFactory,
        public Security $security,
        public PlayableCharacterRepository $playableCharacterRepository,
    ) {}

    #[Route('/playable-characters/{id}', name: 'show_playable_character', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showPlayableCharacter(
        PlayableCharacterRepository $playableCharacterRepository,
        int $id
    ): Response
    {
        $playableCharacter = $playableCharacterRepository->find($id);

        return new Response(
            $this->twig->render('PlayableCharacter/show_playable_character.html.twig', [
                'playableCharacter' => $playableCharacter,
            ])
        );
    }
}