<?php

namespace App\Controller;

use App\Entity\Status;
use App\Entity\Chamado;
use App\Form\ChamadoType;
use App\Repository\ChamadoRepository;
use App\Service\ChamadoService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/chamado")
 */
class ChamadoController extends AbstractController
{

    private $chamadoService;

    public function __construct(ChamadoService $chamadoService)
    {
        $this->chamadoService = $chamadoService;
    }

    /**
     * @Route("/atribuir/{id}", name="chamado_atribuir", methods="GET")
     */
    public function atribuir(Request $request, Chamado $chamado): Response
    {
        $chamado = $this->chamadoService->atribuir($chamado, $this->getUser());
        return $this->redirectToRoute('chamado_show', ['id'=> $chamado->getId()]);
    }

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

            $this->addFlash('success', 'chamado_new_success');
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

            $this->addFlash('success', 'chamado_edit_success');
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

    /**
     * Encerrar chamado
     *
     * @Route("/encerrar/{id}", name="chamado_encerrar", methods="GET")
     * @return Response
     */
    public function encerrarChamado(Chamado $chamado): Response 
    {
        try {
            $manager = $this->getDoctrine()->getManager();

            if ($chamado->getStatus()->getId() === Status::FECHADO) {
                throw new \Exception("Este chamado já está encerrado");
            }
    
            $chamado->setDataConclusao();
            $chamado->setStatus(
                $manager->getRepository(Status::class)->find(Status::FECHADO)
            );
    
            $manager->persist($chamado);
            $manager->flush();
    
            $this->addFlash('success', 'Chamado encerrado com sucesso');
        } catch (\Doctrine\ORM\EntityNotFoundException $e) {
            $this->addFlash('error', "Chamado não existe");
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }
        return $this->redirectToRoute('chamado_index');
    }

    
}
