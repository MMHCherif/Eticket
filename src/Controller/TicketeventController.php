<?php

namespace App\Controller;

use App\Entity\Ticketevent;
use App\Form\TicketeventType;
use App\Repository\TicketeventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ticketevent")
 */
class TicketeventController extends AbstractController
{
    /**
     * @Route("/", name="ticketevent_index", methods="GET")
     */
    public function index(TicketeventRepository $ticketeventRepository): Response
    {
        return $this->render('ticketevent/index.html.twig', ['ticketevents' => $ticketeventRepository->findAll()]);
    }

    /**
     * @Route("/new", name="ticketevent_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $ticketevent = new Ticketevent();
        $form = $this->createForm(TicketeventType::class, $ticketevent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticketevent);
            $em->flush();

            return $this->redirectToRoute('ticketevent_index');
        }

        return $this->render('ticketevent/new.html.twig', [
            'ticketevent' => $ticketevent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ticketevent_show", methods="GET")
     */
    public function show(Ticketevent $ticketevent): Response
    {
        return $this->render('ticketevent/show.html.twig', ['ticketevent' => $ticketevent]);
    }

    /**
     * @Route("/{id}/edit", name="ticketevent_edit", methods="GET|POST")
     */
    public function edit(Request $request, Ticketevent $ticketevent): Response
    {
        $form = $this->createForm(TicketeventType::class, $ticketevent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ticketevent_edit', ['id' => $ticketevent->getId()]);
        }

        return $this->render('ticketevent/edit.html.twig', [
            'ticketevent' => $ticketevent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ticketevent_delete", methods="DELETE")
     */
    public function delete(Request $request, Ticketevent $ticketevent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticketevent->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ticketevent);
            $em->flush();
        }

        return $this->redirectToRoute('ticketevent_index');
    }
}
