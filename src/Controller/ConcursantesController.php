<?php

namespace App\Controller;

use App\Entity\Concursantes;
use App\Form\ConcursantesType;
use App\Repository\ConcursantesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/concursantes")
 */
class ConcursantesController extends AbstractController
{
    /**
     * @Route("/", name="concursantes_index", methods={"GET"})
     */
    public function index(ConcursantesRepository $concursantesRepository): Response
    {
        return $this->render('concursantes/index.html.twig', [
            'concursantes' => $concursantesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="concursantes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $concursante = new Concursantes();
        $form = $this->createForm(ConcursantesType::class, $concursante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concursante);
            $entityManager->flush();

            return $this->redirectToRoute('concursantes_index');
        }

        return $this->render('concursantes/new.html.twig', [
            'concursante' => $concursante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idConcursante}", name="concursantes_show", methods={"GET"})
     */
    public function show(Concursantes $concursante): Response
    {
        return $this->render('concursantes/show.html.twig', [
            'concursante' => $concursante,
        ]);
    }

    /**
     * @Route("/{idConcursante}/edit", name="concursantes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Concursantes $concursante): Response
    {
        $form = $this->createForm(ConcursantesType::class, $concursante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concursantes_index');
        }

        return $this->render('concursantes/edit.html.twig', [
            'concursante' => $concursante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idConcursante}", name="concursantes_delete", methods={"POST"})
     */
    public function delete(Request $request, Concursantes $concursante): Response
    {
        if ($this->isCsrfTokenValid('delete'.$concursante->getIdConcursante(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($concursante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('concursantes_index');
    }
}
