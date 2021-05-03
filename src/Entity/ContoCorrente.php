<?php

namespace App\Entity;

use App\Repository\ContoCorrenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContoCorrenteRepository::class)
 */
class ContoCorrente
{
  
    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $saldo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $stato;

    /**
     * @ORM\OneToOne(targetEntity=Utenti::class, inversedBy="contoCorrente", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="cf", referencedColumnName="cf")
     */
    private $cf_proprietario;

    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private $iban;


    public function __construct()
    {
        $this->transazioni = new ArrayCollection();
    }


    public function getIban(): string
    {
        return $this->iban;
    }

    public function setIban(string $iban) : self
    {
        $this->iban=$iban;
        return $this;
    }

    public function getSaldo(): ?string
    {
        return $this->saldo;
    }

    public function setSaldo(string $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getStato(): ?bool
    {
        return $this->stato;
    }

    public function setStato(bool $stato): self
    {
        $this->stato = $stato;

        return $this;
    }

    public function getCfProprietario(): ?Utenti
    {
        return $this->cf_proprietario;
    }

    public function setCfProprietario(Utenti $cf_proprietario): self
    {
        $this->cf_proprietario = $cf_proprietario;

        return $this;
    }

}
