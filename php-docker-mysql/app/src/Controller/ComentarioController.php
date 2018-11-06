<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Chamado;

class ComentarioController extends AbstractController
{
    /**
     * @Route("/comentario/{id}/chamado", name="comentario_new")
     */
    public function index(Chamado $chamado)
    {
        return $this->render('comentario/index.html.twig', [
            'chamado' => $chamado,
        ]);
    }
}
