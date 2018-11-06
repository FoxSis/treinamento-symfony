<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioRepository")
 */
class Comentario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $descricao;

    /**
     * @ORM\Column(type="datetime", name="data_atualizacao")
     */
    private $dataAtualizacao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chamado", inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chamado;

    public function __construct()
    {
        $this->dataAtualizacao = new \DateTime();
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getDataAtualizacao(): ?\DateTimeInterface
    {
        return $this->dataAtualizacao;
    }

    public function setDataAtualizacao(\DateTimeInterface $dataAtualizacao): self
    {
        $this->dataAtualizacao = $dataAtualizacao;

        return $this;
    }

    public function getChamado(): ?Chamado
    {
        return $this->chamado;
    }

    public function setChamado(?Chamado $chamado): self
    {
        $this->chamado = $chamado;

        return $this;
    }
}
