<?php

namespace App\Controller;

use App\Entity\Chamado;
use App\Entity\Comentario;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ComentarioController extends AbstractController
{
    /**
     * @Route("/comentario/{id}/chamado", name="comentario_new", methods="GET|POST")
     */
    public function index(Chamado $chamado, Request $request)
    {
        if ($request->request->has('comentario')) {
            $comentario = new Comentario();
            $comentario->setChamado($chamado);
            $comentario->setDescricao($request->request->get('comentario')['descricao']);
            
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($comentario);
            $manager->flush();
            
            return $this->redirectToRoute('chamado_show', ['id' => $chamado->getId()]);
        }
        return $this->render('comentario/index.html.twig', [
            'chamado' => $chamado,
        ]);
    }
}
