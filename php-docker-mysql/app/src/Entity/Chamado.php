<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChamadoRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\Column(type="datetime", name="data_abertura")
     */
    private $dataAbertura;

    /**
     * @ORM\Column(type="datetime", name="data_atualizacao")
     */
    private $dataAtualizacao;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="data_conclusao")
     */
    private $dataConclusao;

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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentario", mappedBy="chamado")
     */
    private $comentarios;

    public function __construct()
    {
        $this->dataAbertura = new \DateTime();
        $this->dataAtualizacao = new \DateTime();
        $this->comentarios = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->assunto;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataAbertura(): ?\DateTimeInterface
    {
        return $this->dataAbertura;
    }

    public function setDataAbertura(\DateTimeInterface $dataAbertura): self
    {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }

    public function getDataAtualizacao(): ?\DateTimeInterface
    {
        return $this->dataAtualizacao;
    }

    /**
     * Seta a data de atualização do chamado
     *
     * @ORM\PreUpdate
     * @param \DateTimeInterface $dataAtualizacao
     * @return self
     */
    public function setDataAtualizacao(): self
    {
        $this->dataAtualizacao = new \DateTime();

        return $this;
    }

    public function getDataConclusao(): ?\DateTimeInterface
    {
        return $this->dataConclusao;
    }

    public function setDataConclusao(): self
    {
        $this->dataConclusao = new \DateTime();

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

    /**
     * @return Collection|Comentario[]
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(Comentario $comentario): self
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios[] = $comentario;
            $comentario->setChamado($this);
        }

        return $this;
    }

    public function removeComentario(Comentario $comentario): self
    {
        if ($this->comentarios->contains($comentario)) {
            $this->comentarios->removeElement($comentario);
            // set the owning side to null (unless already changed)
            if ($comentario->getChamado() === $this) {
                $comentario->setChamado(null);
            }
        }

        return $this;
    }
}
