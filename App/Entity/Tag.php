<?php

namespace App\Entity;

use App\Entity\Entity;
use Mithridatem\Validation\Attributes\Email;
use Mithridatem\Validation\Attributes\NotBlank;
use Mithridatem\Validation\Attributes\Pattern;

class Tag extends Entity
{
    // Attributs
    private ?string $name;
    protected ?array $tags;

    public function __construct(
        ?string $name = null,
    ){
        $this->name = $name;
        $this->tags = [];
    }

    // Bloc setter et getter
     public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    // Création fonction d'ajout d'un tag
     public function addTags(?string $tag): void
    {
        $this->tags[] = $tag;
    }

    // Création fonction de suppression d'un tag
      public function removeTags(?string $tag): void
    {
        unset($this->tags[array_search($tag, $this->tags)]);
        sort($this->tags);
    }

    // 

}