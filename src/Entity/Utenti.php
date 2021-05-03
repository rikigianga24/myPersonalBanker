<?php

namespace App\Entity;

use App\Repository\UtentiRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtentiRepository::class)
 */
class Utenti
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private $cf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cognome;

    /**
     * @ORM\Column(type="string")
     */
    private $cellulare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $via;

    /**
     * @ORM\Column(type="integer")
     */
    private $civico;

    /**
     * @ORM\Column(type="integer")
     */
    private $cap;

    /**
     * @ORM\OneToOne(targetEntity=ContoCorrente::class, mappedBy="cf_proprietario", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="iban", referencedColumnName="iban")
     */
    private $contoCorrente;


    public function getCf(): ?string
    {
        return $this->cf;
    }
    public function setCf(string $cf): self
    {
        $this->cf = $cf;

        return $this;
    }


    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): self
    {
        $this->cognome = $cognome;

        return $this;
    }

    public function getCellulare(): ?int
    {
        return $this->cellulare;
    }

    public function setCellulare(int $cellulare): self
    {
        $this->cellulare = $cellulare;

        return $this;
    }

    public function getVia(): ?string
    {
        return $this->via;
    }

    public function setVia(string $via): self
    {
        $this->via = $via;

        return $this;
    }

    public function getCivico(): ?int
    {
        return $this->civico;
    }

    public function setCivico(int $civico): self
    {
        $this->civico = $civico;

        return $this;
    }

    public function getCap(): ?int
    {
        return $this->cap;
    }

    public function setCap(int $cap): self
    {
        $this->cap = $cap;

        return $this;
    }

    public function getContoCorrente(): ?ContoCorrente
    {
        return $this->contoCorrente;
    }

    public function setContoCorrente(ContoCorrente $contoCorrente): self
    {
        // set the owning side of the relation if necessary
        if ($contoCorrente->getCfProprietario() !== $this) {
            $contoCorrente->setCfProprietario($this);
        }

        $this->contoCorrente = $contoCorrente;

        return $this;
    }

}
