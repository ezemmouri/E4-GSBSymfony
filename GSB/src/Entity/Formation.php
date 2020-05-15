<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $nbreHeures;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumn()
     */
    private $produit;

    /**
     * @ORM\OneToMany(targetEntity="Inscription",mappedBy="formation")
     * @ORM\JoinColumn()
     */
    private $inscriptions;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getNbreHeures(): ?int
    {
        return $this->nbreHeures;
    }

    public function setNbreHeures(?int $nbreHeures): self
    {
        $this->nbreHeures = $nbreHeures;

        return $this;
    }

    public function getDepartement(): ?int
    {
        return $this->departement;
    }

    public function setDepartement(?int $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getInscriptions()
    {
        return $this->inscriptions;
        
    }
        
    public function getInscriptionsByUser($user_id)
    {
        $criteria = \Doctrine\Common\Collections\Criteria::create()
        ->where(\Doctrine\Common\Collections\Criteria::expr()->eq("user_id", $user_id));
            return $this->inscriptions->matching($criteria);
    }

   
}
