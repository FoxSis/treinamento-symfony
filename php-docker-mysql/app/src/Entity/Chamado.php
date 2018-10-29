<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChamadoRepository")
 */
class Chamado
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data_abertura;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data_atualizacao;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $data_conclusao;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $assunto;

    /**
     * @ORM\Column(type="text")
     */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prioridade", inversedBy="chamados")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prioridade;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tipo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataAbertura(): ?\DateTimeInterface
    {
        return $this->data_abertura;
    }

    public function setDataAbertura(\DateTimeInterface $data_abertura): self
    {
        $this->data_abertura = $data_abertura;

        return $this;
    }

    public function getDataAtualizacao(): ?\DateTimeInterface
    {
        return $this->data_atualizacao;
    }

    public function setDataAtualizacao(\DateTimeInterface $data_atualizacao): self
    {
        $this->data_atualizacao = $data_atualizacao;

        return $this;
    }

    public function getDataConclusao(): ?\DateTimeInterface
    {
        return $this->data_conclusao;
    }

    public function setDataConclusao(?\DateTimeInterface $data_conclusao): self
    {
        $this->data_conclusao = $data_conclusao;

        return $this;
    }

    public function getAssunto(): ?string
    {
        return $this->assunto;
    }

    public function setAssunto(string $assunto): self
    {
        $this->assunto = $assunto;

        return $this;
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

    public function getPrioridade(): ?Prioridade
    {
        return $this->prioridade;
    }

    public function setPrioridade(?Prioridade $prioridade): self
    {
        $this->prioridade = $prioridade;

        return $this;
    }

    public function getTipo(): ?Tipo
    {
        return $this->tipo;
    }

    public function setTipo(?Tipo $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }
}
