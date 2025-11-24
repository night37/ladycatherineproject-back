<?php

namespace App\Controller;

abstract class AbstractPublication
{
    protected int $idPublication;
    protected string $publishedAt;
    protected string $updatedAt;
    protected string $image;
    protected bool $status;
    protected string $abstract;
    protected string $title;
    protected string $content;

    /**
     * Get the value of id_publication
     *
     * @return int
     */
    public function getIdPublication(): int
    {
        return $this->id_publication;
    }

    /**
     * Set the value of id_publication
     *
     * @param int $id_publication
     *
     * @return self
     */
    public function setIdPublication(int $id_publication): self
    {
        $this->id_publication = $id_publication;
        return $this;
    }

    /**
     * Get the value of published_at
     *
     * @return string
     */
    public function getPublishedAt(): string
    {
        return $this->published_at;
    }

    /**
     * Set the value of published_at
     *
     * @param string $published_at
     *
     * @return self
     */
    public function setPublishedAt(string $published_at): self
    {
        $this->published_at = $published_at;
        return $this;
    }

    /**
     * Get the value of updated_at
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @param string $updated_at
     *
     * @return self
     */
    public function setUpdatedAt(string $updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get the value of status
     *
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param bool $status
     *
     * @return self
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the value of abstract
     *
     * @return string
     */
    public function getAbstract(): string
    {
        return $this->abstract;
    }

    /**
     * Set the value of abstract
     *
     * @param string $abstract
     *
     * @return self
     */
    public function setAbstract(string $abstract): self
    {
        $this->abstract = $abstract;
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
}
