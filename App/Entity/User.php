<?php

namespace App\Entity;

use App\Entity\Entity;
use Mithridatem\Validation\Attributes\Email;
use Mithridatem\Validation\Attributes\NotBlank;
use Mithridatem\Validation\Attributes\Pattern;

class User extends Entity
{
    /** Bloc attributs  **/
    private ?int $id_user;
    #[Email]
    private ?string $email;
    #[NotBlank]
    private string $password;
    private ?string $profiles_image = "";
    private string $pseudo = "";

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
        return $this->id_user;
    }

    public function setId(?int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getEmail(): ?string
    {
        return $this->pseudo;
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

    public function getProfiles_images(): ?string
    {
        return $this->profiles_image;
    }

    public function setProfiles_images(?string $profiles_image): void
    {
        $this->profiles_image = $profiles_image;
    }



    /** Bloc méthodes   **/
    /**
     * Méthode pour hasher le password
     * @return void
     */

    /**
     * Méthode pour vérifier si le hash password est valide
     * @param string $plainPassword mot de passe en clair
     * @return bool true si valide false si invalide
     */


    /**
     * Méthode pour hydrater un Objet User à partir d'un tableau de données
     * @param array $userData (tableau de données d'un User)
     * @return User retourne un Objet User
     */
    // public static function hydrateUser(array $userData): User
    // {
    //     $user = new User(
    //         $userData["firstname"] ?? null,
    //         $userData["lastname"] ?? null,
    //         $userData["email"] ?? null,
    //         $userData["password"] ?? null
    //     );

    //     $user->setId($userData["id"] ?? null);
    //     $user->setPseudo($userData["pseudo"] ?? "");
    //     $user->setImgProfil($userData["imgProfil"] ?? "");

    //     if (isset($userData["grants"]) && gettype($userData["grants"]) === "string") {
    //         $user->setGrants($userData["grants"]);
    //     }

    //     $user->setStatus($userData["status"] ?? false);

    //     return $user;
    // }

    /**
     * Méthode pour convertir un Objet User en tableau de données
     * @return array retourne un tableau de données d'un User
     */
    // public function toArray(): array
    // {
    //     $userData =  [];
    //     //Crée un tableau de données à partir des attributs de l'objet User
    //     foreach ($this as $key => $value) {
    //         if ($key === 'grants' && is_array($value)) {
    //             $value = implode(',', $value);
    //         }
    //         $userData[$key] = $value;
    //     }
    //     return $userData;
    // }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }


    public static function hydrateUser(array $userData): User
    {
        $user = new User(
            $userData["email"] ?? null,
            $userData["pseudo"] ?? null,
            $userData["password"] ?? null,
            $userData["profile_image"] ?? null,
            $userData["role_id"] ?? null
        );

        $user->setId($userData["id"] ?? null);
        // dd($user);
        return $user;
    }
}
