<?php

namespace App\Controller;

use App\Entity\Tags;

class LessonController extends AbstractPublication
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
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     */
    public function setDifficulty($difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }
}
