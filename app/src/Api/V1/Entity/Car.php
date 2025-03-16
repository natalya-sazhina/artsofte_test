<?php

declare(strict_types=1);

namespace App\Api\V1\Entity;

use App\Api\V1\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'car')]
#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Model::class)]
    #[ORM\JoinColumn(name: 'id_model', referencedColumnName: 'id', nullable: false)]
    private Model $model;

    #[ORM\Column(name: 'photo', type: 'string', nullable: false)]
    private string $photo;

    #[ORM\Column(name: 'price', type: 'integer', nullable: false)]
    private int $price;

    public function getId(): int
    {
        return $this->id;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel(Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
