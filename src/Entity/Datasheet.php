<?php

namespace App\Entity;

use App\Repository\DatasheetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatasheetRepository::class)]
class Datasheet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?array $val1 = null;

    #[ORM\Column(nullable: true)]
    private ?array $point = null;

    #[ORM\Column(nullable: true)]
    private ?array $val2 = null;

    #[ORM\Column(nullable: true)]
    private ?array $val3 = null;

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

    public function getVal1(): ?array
    {
        return $this->val1;
    }

    public function setVal1(?array $val1): static
    {
        $this->val1 = $val1;

        return $this;
    }

    public function getPoint(): ?array
    {
        return $this->point;
    }

    public function setPoint(?array $point): static
    {
        $this->point = $point;

        return $this;
    }

    public function getVal2(): ?array
    {
        return $this->val2;
    }

    public function setVal2(?array $val2): static
    {
        $this->val2 = $val2;

        return $this;
    }

    public function getVal3(): ?array
    {
        return $this->val3;
    }

    public function setVal3(?array $val3): static
    {
        $this->val3 = $val3;

        return $this;
    }

}
