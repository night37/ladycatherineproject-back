<?php

namespace App\Entity;

use App\Entity\Entity;
use Mithridatem\Validation\Attributes\Email;
use Mithridatem\Validation\Attributes\NotBlank;
use Mithridatem\Validation\Attributes\Pattern;

class User extends Entity
{
    /** Bloc attributs  **/
    private ?int $id;
    #[NotBlank]
    private ?string $pseudo;
    #[Email]
    private ?string $email;
    #[NotBlank]
    private ?string $password;
    private ?string $imgProfil;

    private ?Role $role;

    /** Bloc constructeur   **/

    public function __construct(
        ?string $email = null,
        ?string $password = null,

    ) {
        $this->email = $email;
        $this->password = $password;
    }

    /** Bloc Getters et Setters   **/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getImgProfil(): ?string
    {
        return $this->imgProfil;
    }

    public function setImgProfil(?string $imgProfil): void
    {
        $this->imgProfil = $imgProfil;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }





    /** Bloc méthodes   **/
    /**
     * Méthode pour hasher le password
     * @return void
     */
    public function hashPassword(): void
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    /**
     * Méthode pour vérifier si le hash password est valide
     * @param string $plainPassword mot de passe en clair
     * @return bool true si valide false si invalide
     */
    public function verifPassword(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->password);
    }

    /**
     * Méthode pour hydrater un Objet User à partir d'un tableau de données
     * @param array $userData (tableau de données d'un User)
     * @return User retourne un Objet User
     */
    public static function hydrateUser(array $userData): User
    {
        $user = new User(
            $userData["firstname"] ?? null,
            $userData["lastname"] ?? null,
            $userData["email"] ?? null,
            $userData["password"] ?? null
        );

        $user->setId($userData["id"] ?? null);
        $user->setPseudo($userData["pseudo"] ?? "");
        $user->setImgProfil($userData["imgProfil"] ?? "");

        if (isset($userData["grants"]) && gettype($userData["grants"]) === "string") {
            $user->setGrants($userData["grants"]);
        }

        $user->setStatus($userData["status"] ?? false);

        return $user;
    }

    /**
     * Méthode pour convertir un Objet User en tableau de données
     * @return array retourne un tableau de données d'un User
     */
    public function toArray(): array
    {
        $userData =  [];
        //Crée un tableau de données à partir des attributs de l'objet User
        foreach ($this as $key => $value) {
            if ($key === 'grants' && is_array($value)) {
                $value = implode(',', $value);
            }
            $userData[$key] = $value;
        }
        return $userData;
    }
}
