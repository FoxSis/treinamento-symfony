<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Chamado;

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
    public function index()
    {
        return $this->render('default/index.html.twig', 
        [
            'aluno_name' => 'Rodrigo Régis',
        ]);
    }

    /**
     * Chamados disponíveis
     *
     * @Route("/", name="chamados_disponiveis_index", methods="GET")
     * @return Response
     */
    public function chamadosDisponiveis(): Response
    {
        $chamados = $this->getDoctrine()
            ->getManager()
            ->getRepository(Chamado::class)
            ->findChamadosDisponiveis();

        // \Doctrine\Common\Util\Debug::dump($chamados);die;

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
    public function chamadosFechados(): Response
    {
        $chamados = $this->getDoctrine()
            ->getManager()
            ->getRepository(Chamado::class)
            ->findChamadosFechados();

        return $this->render(
            'default/chamadosFechados.html.twig', 
            ['chamados'=> $chamados]
        );
    }
}
