<?php

namespace App\Entity;

use App\Repository\ArmyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmyRepository::class)]
class Army
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'armies')]
    private ?Games $relation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRelation(): ?Games
    {
        return $this->relation;
    }

    public function setRelation(?Games $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}
