<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicule $vehiculeCible = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $ecritPar = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehiculeCible(): ?Vehicule
    {
        return $this->vehiculeCible;
    }

    public function setVehiculeCible(?Vehicule $vehiculeCible): static
    {
        $this->vehiculeCible = $vehiculeCible;

        return $this;
    }

    public function getEcritPar(): ?Utilisateur
    {
        return $this->ecritPar;
    }

    public function setEcritPar(?Utilisateur $ecritPar): static
    {
        $this->ecritPar = $ecritPar;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): static
    {
        $this->Contenu = $Contenu;

        return $this;
    }
}
