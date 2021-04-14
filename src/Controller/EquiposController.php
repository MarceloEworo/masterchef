<?php

namespace App\Controller;

use App\Entity\Equipos;
use App\Form\EquiposType;
use App\Repository\EquiposRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/equipos")
 */
class EquiposController extends AbstractController
{
    /**
     * @Route("/", name="equipos_index", methods={"GET"})
     */
    public function index(EquiposRepository $equiposRepository): Response
    {
        return $this->render('equipos/index.html.twig', [
            'equipos' => $equiposRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="equipos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $equipo = new Equipos();
        $form = $this->createForm(EquiposType::class, $equipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipo);
            $entityManager->flush();

            return $this->redirectToRoute('equipos_index');
        }

        return $this->render('equipos/new.html.twig', [
            'equipo' => $equipo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{nombreEquipo}", name="equipos_show", methods={"GET"})
     */
    public function show(Equipos $equipo): Response
    {
        return $this->render('equipos/show.html.twig', [
            'equipo' => $equipo,
        ]);
    }

    /**
     * @Route("/{nombreEquipo}/edit", name="equipos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Equipos $equipo): Response
    {
        $form = $this->createForm(EquiposType::class, $equipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipos_index');
        }

        return $this->render('equipos/edit.html.twig', [
            'equipo' => $equipo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{nombreEquipo}", name="equipos_delete", methods={"POST"})
     */
    public function delete(Request $request, Equipos $equipo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipo->getNombreEquipo(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($equipo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equipos_index');
    }
}
