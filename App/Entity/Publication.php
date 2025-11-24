<?php

namespace App\Entity;

class Publication
{
    private int $idPublication;
    private bool $typeOfPublication; // 0 pour un article, 1 pour une lesson
    private ?string $publishedAt;
    private ?string $updatedAt;
    private ?string $image;
    private bool $status = false;
    private string $title;
    private string $content;
    private ?string $difficulty;
    private Tags $tags;
    public function __construct(int $idPublication, bool $typeOfPublication, bool $status, string $title, string $content, Tags $tags)
    {
        $this->idPublication = $idPublication;
        $this->typeOfPublication = $typeOfPublication;
        $this->$status = $status;
        $this->title = $title;
        $this->content = $content;
        $this->tags = $tags;
    }
        /**
         * Get the value of tags
         */
        public function getTags() {
                return $this->tags;
        }

        /**
         * Set the value of tags
         */
        public function setTags($tags): self {
                $this->tags = $tags;
                return $this;
        }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }
    /**
     * Get the value of typeOfPublication
     */
    public function getTypeOfPublication()
    {
        return $this->typeOfPublication;
    }
    /**
     * Set the value of typeOfPublication
     */
    public function setTypeOfPublication($typeOfPublication): self
    {
        $this->typeOfPublication = $typeOfPublication;
        return $this;
    }



    /**
     * Get the value of idPublication
     *
     * @return int
     */
    public function getIdPublication(): int
    {
        return $this->idPublication;
    }

    /**
     * Set the value of idPublication
     *
     * @param int $idPublication
     *
     * @return self
     */
    public function setIdPublication(int $idPublication): self
    {
        $this->idPublication = $idPublication;
        return $this;
    }

    /**
     * Get the value of publishedAt
     *
     * @return ?string
     */
    public function getPublishedAt(): ?string
    {
        return $this->publishedAt;
    }

    /**
     * Set the value of publishedAt
     *
     * @param ?string $publishedAt
     *
     * @return self
     */
    public function setPublishedAt(?string $publishedAt): self
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    /**
     * Get the value of updatedAt
     *
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param ?string $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get the value of image
     *
     * @return ?string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param ?string $image
     *
     * @return self
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get the value of difficulty
     *
     * @return ?string
     */
    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     *
     * @param ?string $difficulty
     *
     * @return self
     */
    public function setDifficulty(?string $difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }
}
