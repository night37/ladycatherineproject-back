<?php

namespace App\Controller;

class ArticleController extends AbstractPublication
{
    private string $difficulty;
    public function __construct(string $difficulty, string $published_at, string $title, string $content)
    {
        $this->difficulty = $difficulty;
        $this->published_at = $published_at;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the value of difficulty
     *
     * @return string
     */
    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     *
     * @param string $difficulty
     *
     * @return self
     */
    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }
}
