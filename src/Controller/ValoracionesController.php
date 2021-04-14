<?php

namespace App\Controller;

use App\Entity\Valoraciones;
use App\Entity\Equipos;
use App\Form\ValoracionesType;
use App\Repository\ValoracionesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/valoraciones")
 */
class ValoracionesController extends AbstractController
{
    /**
     * @Route("/", name="valoraciones_index", methods={"GET"})
     */
    public function index(ValoracionesRepository $valoracionesRepository): Response
    {
        return $this->render('valoraciones/index.html.twig', [
            'valoraciones' => $valoracionesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="valoraciones_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $valoracione = new Valoraciones();
        
        $form = $this->createForm(ValoracionesType::class, $valoracione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($valoracione);
            $entityManager->flush();
            
            return $this->redirectToRoute('valoraciones_index');
        }

        return $this->render('valoraciones/new.html.twig', [
            'valoracione' => $valoracione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idValoraciones}", name="valoraciones_show", methods={"GET"})
     */
    public function show(Valoraciones $valoracione): Response
    {
        return $this->render('valoraciones/show.html.twig', [
            'valoracione' => $valoracione,
        ]);
    }

    /**
     * @Route("/{idValoraciones}/edit", name="valoraciones_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Valoraciones $valoracione): Response
    {
        $form = $this->createForm(ValoracionesType::class, $valoracione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('valoraciones_index');
        }

        return $this->render('valoraciones/edit.html.twig', [
            'valoracione' => $valoracione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idValoraciones}", name="valoraciones_delete", methods={"POST"})
     */
    public function delete(Request $request, Valoraciones $valoracione): Response
    {
        if ($this->isCsrfTokenValid('delete'.$valoracione->getIdValoraciones(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($valoracione);
            $entityManager->flush();
        }

        return $this->redirectToRoute('valoraciones_index');
    }
}
