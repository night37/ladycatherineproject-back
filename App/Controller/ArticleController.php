<?php

namespace App\Controller;
use App\Entity\Tags;

class ArticleController extends AbstractPublication
{
    private string $difficulty;
    private Tags $tags;
    public function __construct(string $difficulty, string $published_at, string $title, string $content, Tags $tags)
    {
        $this->difficulty = $difficulty;
        $this->published_at = $published_at;
        $this->title = $title;
        $this->content = $content;
        $this->tags = $tags;
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
