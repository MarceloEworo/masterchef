<?php

namespace App\Controller;

use App\Entity\Jueces;
use App\Form\JuecesType;
use App\Repository\JuecesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/jueces")
 */
class JuecesController extends AbstractController
{
    /**
     * @Route("/", name="jueces_index", methods={"GET"})
     */
    public function index(JuecesRepository $juecesRepository): Response
    {
        return $this->render('jueces/index.html.twig', [
            'jueces' => $juecesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="jueces_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $juece = new Jueces();
        $form = $this->createForm(JuecesType::class, $juece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($juece);
            $entityManager->flush();

            return $this->redirectToRoute('jueces_index');
        }

        return $this->render('jueces/new.html.twig', [
            'juece' => $juece,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idJuez}", name="jueces_show", methods={"GET"})
     */
    public function show(Jueces $juece): Response
    {
        return $this->render('jueces/show.html.twig', [
            'juece' => $juece,
        ]);
    }

    /**
     * @Route("/{idJuez}/edit", name="jueces_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Jueces $juece): Response
    {
        $form = $this->createForm(JuecesType::class, $juece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jueces_index');
        }

        return $this->render('jueces/edit.html.twig', [
            'juece' => $juece,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idJuez}", name="jueces_delete", methods={"POST"})
     */
    public function delete(Request $request, Jueces $juece): Response
    {
        if ($this->isCsrfTokenValid('delete'.$juece->getIdJuez(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($juece);
            $entityManager->flush();
        }

        return $this->redirectToRoute('jueces_index');
    }
}
