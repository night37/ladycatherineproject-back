<?php

namespace App\Entity;

use App\Entity\Entity;
use Mithridatem\Validation\Attributes\Email;
use Mithridatem\Validation\Attributes\NotBlank;
use Mithridatem\Validation\Attributes\Pattern;

class Role extends Entity
{
    /** Bloc attributs  **/
    private ?int $id_role;
    private ?string $name;

    /** Bloc constructeur   **/

    public function __construct(
        ?string $id_role = null,



        ?string $name = null,

    ) {
        $this->id_role = $id_role;
        $this->name = $name;
    }

    /** Bloc Getters et Setters   **/

    public function getId(): ?int
    {
        return $this->id_role;
    }

    public function setId(?int $id_role): void
    {
        $this->id_role = $id_role;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
