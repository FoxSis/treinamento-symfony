<?php

namespace App\Controller;

use App\Entity\Prioridade;
use App\Form\PrioridadeType;
use App\Repository\PrioridadeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prioridade")
 */
class PrioridadeController extends AbstractController
{
    /**
     * @Route("/", name="prioridade_index", methods="GET")
     */
    public function index(PrioridadeRepository $prioridadeRepository): Response
    {
        return $this->render('prioridade/index.html.twig', ['prioridades' => $prioridadeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="prioridade_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $prioridade = new Prioridade();
        $form = $this->createForm(PrioridadeType::class, $prioridade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prioridade);
            $em->flush();

            return $this->redirectToRoute('prioridade_index');
        }

        return $this->render('prioridade/new.html.twig', [
            'prioridade' => $prioridade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prioridade_show", methods="GET")
     */
    public function show(Prioridade $prioridade): Response
    {
        return $this->render('prioridade/show.html.twig', ['prioridade' => $prioridade]);
    }

    /**
     * @Route("/{id}/edit", name="prioridade_edit", methods="GET|POST")
     */
    public function edit(Request $request, Prioridade $prioridade): Response
    {
        $form = $this->createForm(PrioridadeType::class, $prioridade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prioridade_edit', ['id' => $prioridade->getId()]);
        }

        return $this->render('prioridade/edit.html.twig', [
            'prioridade' => $prioridade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prioridade_delete", methods="DELETE")
     */
    public function delete(Request $request, Prioridade $prioridade): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prioridade->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prioridade);
            $em->flush();
        }

        return $this->redirectToRoute('prioridade_index');
    }
}
