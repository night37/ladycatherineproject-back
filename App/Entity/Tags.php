<?php

namespace App\Entity;

use App\Entity\Entity;

class Tags extends Entity
{
    private int $id_tags;
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }


    /**
     * Get the value of id_tags
     *
     * @return int
     */
    public function getIdTags(): int
    {
        return $this->id_tags;
    }

    /**
     * Set the value of id_tags
     *
     * @param int $id_tags
     *
     * @return self
     */
    public function setIdTags(int $id_tags): self
    {
        $this->id_tags = $id_tags;
        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
