<?php

namespace App\Controller;

class LessonController extends AbstractPublication
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
