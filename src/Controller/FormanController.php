<?php

namespace App\Controller;

use App\Entity\Forman;
use App\Entity\Equipos;
use App\Form\FormanType;
use App\Repository\FormanRepository;
use App\Repository\EquiposRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forman")
 */
class FormanController extends AbstractController
{
    /**
     * @Route("/", name="forman_index", methods={"GET"})
     */
    public function index(FormanRepository $formanRepository, EquiposRepository $equipo): Response
    {
        
        return $this->render('forman/index.html.twig', [
            'formen' => $formanRepository->findAll(),
           
            
        ]);
    }

    /**
     * @Route("/new", name="forman_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $forman = new Forman();
        $form = $this->createForm(FormanType::class, $forman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($forman);
            $entityManager->flush();

            return $this->redirectToRoute('forman_index');
        }

        return $this->render('forman/new.html.twig', [
            'forman' => $forman,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{nombreEquipo}", name="forman_show", methods={"GET"})
     */
    public function show(Forman $forman): Response
    {
        return $this->render('forman/show.html.twig', [
            'forman' => $forman,
        ]);
    }

    /**
     * @Route("/{nombreEquipo}/edit", name="forman_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Forman $forman): Response
    {
        $form = $this->createForm(FormanType::class, $forman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forman_index');
        }

        return $this->render('forman/edit.html.twig', [
            'forman' => $forman,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{nombreEquipo}", name="forman_delete", methods={"POST"})
     */
    public function delete(Request $request, Forman $forman): Response
    {
        if ($this->isCsrfTokenValid('delete'.$forman->getNombreEquipo(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($forman);
            $entityManager->flush();
        }

        return $this->redirectToRoute('forman_index');
    }
}
