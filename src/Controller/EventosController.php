<?php

namespace App\Controller;

use App\Entity\Eventos;
use App\Form\EventosType;
use App\Repository\EventosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/eventos")
 */
class EventosController extends AbstractController
{
    /**
     * @Route("/", name="eventos_index", methods={"GET"})
     */
    public function index(EventosRepository $eventosRepository): Response
    {
        return $this->render('eventos/index.html.twig', [
            'eventos' => $eventosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="eventos_new", methods={"GET","POST"})
     */
    public function new(Request $request, EventosRepository $eventosRepository): Response
    {
        $evento = new Eventos();
        $form = $this->createForm(EventosType::class, $evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evento);
            $entityManager->flush();

            return $this->redirectToRoute('eventos_index');
        }

        return $this->render('eventos/new.html.twig', [
            'eventos' => $eventosRepository->findAll(),
            'evento' => $evento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEvento}", name="eventos_show", methods={"GET"})
     */
    public function show(Eventos $evento): Response
    {
        return $this->render('eventos/show.html.twig', [
            'evento' => $evento,
        ]);
    }

    /**
     * @Route("/{idEvento}/edit", name="eventos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Eventos $evento): Response
    {
        $form = $this->createForm(EventosType::class, $evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eventos_index');
        }

        return $this->render('eventos/edit.html.twig', [
            'evento' => $evento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEvento}", name="eventos_delete", methods={"POST"})
     */
    public function delete(Request $request, Eventos $evento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evento->getIdEvento(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eventos_index');
    }
}
