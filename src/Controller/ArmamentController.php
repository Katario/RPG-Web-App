<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Armament;
use App\Factory\ArmamentFactory;
use App\FormType\ArmamentType;
use App\Repository\ArmamentRepository;
use App\Repository\ArmamentTemplateRepository;
use App\Repository\GameRepository;
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
class ArmamentController
{
    public function __construct(
        public Environment $twig,
        public readonly FormFactoryInterface $formFactory,
        private readonly RouterInterface $router,
        public ArmamentTemplateRepository $armamentTemplateRepository,
        public ArmamentRepository $armamentRepository,
    ) {}

    #[Route('/armaments/{id}', name: 'show_armament', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showArmament(
        int $id,
    ): Response
    {
        $armament = $this->armamentRepository->find($id);

        return new Response(
            $this->twig->render('armament/show_armament.html.twig', [
                'armament' => $armament,
            ])
        );
    }

    #[Route('/armaments/{id}/edit',
        name: 'edit_armament',
        methods: ['GET', 'POST']
    )]
    public function editArmament(
        Request $request,
        ArmamentRepository $armamentRepository,
        int $id,
    ): Response|RedirectResponse
    {
        $armament = $armamentRepository->find($id);

        if (!$armament) {
            throw new NotFoundHttpException();
        }

        $form = $this->formFactory->create(
            ArmamentType::class,
            $armament
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Armament $armament */
            $armament = $form->getData();

            $armamentRepository->save($armament);

            return new RedirectResponse($this->router->generate('game_master_show_game', [
                'id' => $armament->getGame()->getId()
            ]));
        }

        return new Response(
            $this->twig->render('armament/edit.html.twig', [
                'form' => $form->createView(),
                'armament' => $armament,
            ])
        );
    }

    // @TODO: should be updated to use DELETE HTTP method, but must use AJAX in front to do so
    #[Route('/armaments/{id}/delete',
        name: 'delete_armament',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function deleteArmament(
        int $id,
        ArmamentRepository $armamentRepository,
    ): Response
    {
        /** @var Armament $armament */
        $armament = $armamentRepository->find($id);

        if ($armament) {
            $gameId = $armament->getGame()->getId();
            $armamentRepository->delete($armament);

            return new RedirectResponse($this->router->generate('game_master_show_game', [
                'id' => $gameId
            ]));
        }
    }

    #[Route('/armaments/generate', name: 'generate_armament', methods: ['GET', 'POST'])]
    public function generateArmament(
        Request $request,
        ArmamentFactory $armamentFactory,
    ): Response|RedirectResponse
    {
        if ($request->get('armamentTemplateId')) {
            // Look for the Armament
            $armamentTemplate = $this->armamentTemplateRepository->find($request->get('armamentTemplateId'));
            // Generate Armament
            $armament = $armamentFactory->createOneFromArmamentTemplate($armamentTemplate);
        } else {
            $armament = new Armament();
        }

        $form = $this->formFactory->create(ArmamentType::class, $armament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $armament = $form->getData();

            $this->armamentRepository->save($armament);

            return new RedirectResponse($this->router->generate(
                'show_armament', [
                    'id' => $armament->getId()
                ]
            ));
        }

        return new Response(
            $this->twig->render('armament/generate_armament.html.twig', [
                'form' => $form->createView(),
            ]),
        );
    }

//    #[Route('/game/{id}/generate-armament/select', name: 'generate_armament_select')]
//    public function generateArmamentSelector(
//        #[MapQueryParameter] ?int $id
//    ): Response
//    {
//        $armamentTemplates = $this->armamentTemplateRepository->findAll();
//
//        return new Response(
//            $this->twig->render('armament/generate_armament_select.html.twig', [
//                'armamentTemplates' => $armamentTemplates,
//                'gameId' => $id
//            ])
//        );
//    }

//    #[Route('/generate-armament/confirm', name: 'generate_armament_confirm')]
//    public function generateArmamentConfirm(
//        Request $request,
//        Armament $armament,
//        ArmamentFactory $armamentFactory,
//        GameRepository $gameRepository,
//    ): Response|RedirectResponse
//    {
//        if ($request->get('armamentTemplateId')) {
//            $armamentTemplateId = $request->get('armamentTemplateId');
//            // Retrieve ArmamentTemplate
//            $armamentTemplate = $this->armamentTemplateRepository->find($armamentTemplateId);
//            // convert to Armament via Factory
//            $armament = $armamentFactory->createOneFromArmamentTemplate($armamentTemplate);
//            // Get ids from request
//            $game = $gameRepository->find($request->get('gameId'));
//            // Add Game to it
//            $armament->setGame($game);
//        } else {
//            dd($armament);
//        }
//
//
//        $form = $this->formFactory->create(ArmamentType::class, $armament);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            /** @var Armament $armament */
//            $armament = $form->getData();
//
//            $this->armamentRepository->save($armament);
//
//            return new RedirectResponse($this->router->generate(
//                'show_armament', [
//                    'id' => $armament->getId()
//                ]
//            ));
//        }
//
//        return new Response(
//            $this->twig->render('armament/generate_armament_confirm.html.twig', [
//                'form' => $form->createView(),
//            ])
//        );
//    }
}