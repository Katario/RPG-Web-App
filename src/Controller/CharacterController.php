<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Character;
use App\FormType\CharacterType;
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
use Twig\Environment;

#[AsController]
class CharacterController
{
    public function __construct(
        public Environment          $twig,
        public FormFactoryInterface $formFactory,
        public Security             $security,
        public CharacterRepository  $characterRepository,
    ) {}

    #[Route('/characters/{id}', name: 'show_character', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showCharacter(
        CharacterRepository $characterRepository,
        int                 $id
    ): Response
    {
        $character = $characterRepository->find($id);

        return new Response(
            $this->twig->render('character/show_character.html.twig', [
                'character' => $character,
            ])
        );
    }
}