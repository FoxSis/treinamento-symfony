<?php

namespace App\Controller;

use App\Entity\Chamado;
use App\Form\ChamadoType;
use App\Repository\ChamadoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chamado")
 */
class ChamadoController extends AbstractController
{
    /**
     * @Route("/", name="chamado_index", methods="GET")
     */
    public function index(ChamadoRepository $chamadoRepository): Response
    {
        return $this->render('chamado/index.html.twig', ['chamados' => $chamadoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="chamado_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $chamado = new Chamado();
        $form = $this->createForm(ChamadoType::class, $chamado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chamado);
            $em->flush();

            return $this->redirectToRoute('chamado_index');
        }

        return $this->render('chamado/new.html.twig', [
            'chamado' => $chamado,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chamado_show", methods="GET")
     */
    public function show(Chamado $chamado): Response
    {
        return $this->render('chamado/show.html.twig', ['chamado' => $chamado]);
    }

    /**
     * @Route("/{id}/edit", name="chamado_edit", methods="GET|POST")
     */
    public function edit(Request $request, Chamado $chamado): Response
    {
        $form = $this->createForm(ChamadoType::class, $chamado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chamado_edit', ['id' => $chamado->getId()]);
        }

        return $this->render('chamado/edit.html.twig', [
            'chamado' => $chamado,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chamado_delete", methods="DELETE")
     */
    public function delete(Request $request, Chamado $chamado): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chamado->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chamado);
            $em->flush();
        }

        return $this->redirectToRoute('chamado_index');
    }
}
