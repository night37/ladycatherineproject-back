<?php

namespace App\Repository;

use App\Entity\Entity;
use App\Repository\AbstractRepository;
use App\Entity\User;


class UserRepository extends AbstractRepository
{

    public function __construct()
    {
        $this->setConnexion();
    }

    /**
     * Méthode pour trouver une entité par son id
     * @param int $id Id de l'entité à rechercher
     * @return Entity|null
     */
    public function find(int $id): ?User
    {

        return new User;
    }

    /**
     * Méthode pour trouver toutes les entités
     * @return array<User>
     */
    public function findAll(): array
    {
        return [];
    }

    public function findUserByEmail(string $email): ?array
    {

        $request = "SELECT u.id, u.email, u.pseudo, u.password, u.profile_image, u.role_id FROM user AS u WHERE u.email = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $email, \PDO::PARAM_STR);
        $req->execute();
        $userTab = $req->fetch(\PDO::FETCH_ASSOC);
        if (!$userTab) {
            return null;
        }


        return $userTab;
    }
}
