<?php

namespace App\Entity;

use App\Repository\TypesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypesRepository::class)]
class Types
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $starter = null;

    #[ORM\Column(length: 100)]
    private ?string $dish = null;

    #[ORM\Column(length: 100)]
    private ?string $dessert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStarter(): ?string
    {
        return $this->starter;
    }

    public function setStarter(string $starter): static
    {
        $this->starter = $starter;

        return $this;
    }

    public function getDish(): ?string
    {
        return $this->dish;
    }

    public function setDish(string $dish): static
    {
        $this->dish = $dish;

        return $this;
    }

    public function getDessert(): ?string
    {
        return $this->dessert;
    }

    public function setDessert(string $dessert): static
    {
        $this->dessert = $dessert;

        return $this;
    }
}
