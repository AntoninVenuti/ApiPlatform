<?php

namespace App\Entity;

use App\Repository\BookRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: BookRepository::class)]

#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
    itemOperations: ['get', 'put', 'delete',         
    
        'get' => [
        
            'path' => '/livre/{id}',

            'requirements' => ['id' => '\d+'],

            'defaults' => ['color' => 'brown'],

            'options' => ['my_option' => 'my_option_value'],

            'schemes' => ['https'],

            'host' => '{subdomain}.api-platform.com',

        ]
    ]
)]

#[ApiFilter(SearchFilter::class, properties: ['title' => 'partial'])]
#[ApiFilter(DateFilter::class, properties: ['createdAt'])]
#[ApiFilter(BooleanFilter::class, properties: ['available'])]
#[ApiFilter(OrderFilter::class, properties: ['title'], arguments: ['orderParameterName' => 'order'])]


class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'integer')]
    private $releaseYear;

    #[ORM\Column(type: 'string', length: 255)]
    private $author;

    #[ORM\Column(type: 'date', length: 255)]
    #[Groups(["read"])]
    private $createdAt;

    #[ORM\Column(type: 'boolean')]
    private $available;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getReleaseYear(): ?int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int $releaseYear): self
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCreatedAt(): ?date
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }
}
