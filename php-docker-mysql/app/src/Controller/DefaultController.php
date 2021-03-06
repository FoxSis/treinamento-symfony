<?php

namespace App\Controller;

use App\Entity\Chamado;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * DefaultController
 * 
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(TranslatorInterface $translator)
    {
        return $this->render('default/index.html.twig', 
        [
            'aluno_name' => 'Rodrigo Régis',
            'texto' => $translator->trans('Symfony is great'),
        ]);
    }

    /**
     * Chamados disponíveis
     *
     * @Route("/", name="chamados_disponiveis_index", methods="GET")
     * @return Response
     */
    public function chamadosDisponiveis(Request $request, PaginatorInterface $paginator): Response
    {
        $list = $this->getDoctrine()
            ->getManager()
            ->getRepository(Chamado::class)
            ->findChamadosDisponiveis();

        $chamados = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render(
            'default/chamadosDisponiveis.html.twig', 
            ['chamados'=> $chamados]
        );
    }

    /**
     * Chamados encerrados
     *
     * @Route("/fechados", name="chamados_fechados_index", methods="GET")
     * @return Response
     */
    public function chamadosFechados(Request $request, PaginatorInterface $paginator): Response
    {
        $list = $this->getDoctrine()
            ->getManager()
            ->getRepository(Chamado::class)
            ->findChamadosFechados();

        $chamados = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render(
            'default/chamadosFechados.html.twig', 
            ['chamados'=> $chamados]
        );
    }
}
