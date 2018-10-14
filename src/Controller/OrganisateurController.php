<?php

namespace App\Controller;

use App\Entity\Organisateur;
use App\Form\OrganisateurType;
use App\Repository\OrganisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/organisateur")
 */
class OrganisateurController extends AbstractController
{
    /**
     * @Route("/", name="organisateur_index", methods="GET")
     */
    public function index(OrganisateurRepository $organisateurRepository): Response
    {
        return $this->render('organisateur/index.html.twig', ['organisateurs' => $organisateurRepository->findAll()]);
    }

    /**
     * @Route("/new", name="organisateur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $organisateur = new Organisateur();
        $form = $this->createForm(OrganisateurType::class, $organisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organisateur);
            $em->flush();

            return $this->redirectToRoute('organisateur_index');
        }

        return $this->render('organisateur/new.html.twig', [
            'organisateur' => $organisateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="organisateur_show", methods="GET")
     */
    public function show(Organisateur $organisateur): Response
    {
        return $this->render('organisateur/show.html.twig', ['organisateur' => $organisateur]);
    }

    /**
     * @Route("/{id}/edit", name="organisateur_edit", methods="GET|POST")
     */
    public function edit(Request $request, Organisateur $organisateur): Response
    {
        $form = $this->createForm(OrganisateurType::class, $organisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('organisateur_edit', ['id' => $organisateur->getId()]);
        }

        return $this->render('organisateur/edit.html.twig', [
            'organisateur' => $organisateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="organisateur_delete", methods="DELETE")
     */
    public function delete(Request $request, Organisateur $organisateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organisateur->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($organisateur);
            $em->flush();
        }

        return $this->redirectToRoute('organisateur_index');
    }
}
