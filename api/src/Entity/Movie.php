<?php
// api/src/Entity/Movie.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/** A movie. */
#[ApiResource]
class Movie
{
    /** The id of this movie. */
    private ?int $id = null;

    /** The title of this movie. */
    public string $title = '';

    /** The summary of this movie. */
    public string $summary = '';

    /** The director of this movie. */
    public string $director = '';

    /** The publication date of this movie. */
    public ?\DateTimeInterface $publicationDate = null;

    /** @var Review[] Available reviews for this movie. */
    public iterable $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}