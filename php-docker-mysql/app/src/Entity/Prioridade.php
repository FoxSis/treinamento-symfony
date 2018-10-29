<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrioridadeRepository")
 */
class Prioridade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $descricao;

    /**
     * @ORM\Column(type="integer")
     */
    private $peso;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chamado", mappedBy="prioridade")
     */
    private $chamados;

    public function __construct()
    {
        $this->chamados = new ArrayCollection();
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

    public function getPeso(): ?int
    {
        return $this->peso;
    }

    public function setPeso(int $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * @return Collection|Chamado[]
     */
    public function getChamados(): Collection
    {
        return $this->chamados;
    }

    public function addChamado(Chamado $chamado): self
    {
        if (!$this->chamados->contains($chamado)) {
            $this->chamados[] = $chamado;
            $chamado->setPrioridade($this);
        }

        return $this;
    }

    public function removeChamado(Chamado $chamado): self
    {
        if ($this->chamados->contains($chamado)) {
            $this->chamados->removeElement($chamado);
            // set the owning side to null (unless already changed)
            if ($chamado->getPrioridade() === $this) {
                $chamado->setPrioridade(null);
            }
        }

        return $this;
    }
}
