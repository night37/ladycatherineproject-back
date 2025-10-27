<?php

namespace App\Repository;

use App\Entity\Entity;
use App\Repository\AbstractRepository;
use App\Entity\Tag;


class TagsRepository extends AbstractRepository
{
    //Constructeur
    public function __construct()
    {
        $this->setConnexion(); // changer le nom si besoin
    }

    /**
     * Méthode pour enregistrer un Tag en BDD
     * @param User $user (Objet User à ajouter en BDD)
     * @return void ne retourne rien
     */
    public function save(Tag $tag): void
    {
        //1 écrire la requête SQL
        $request = "INSERT INTO tags(name)
        VALUE (?)";
        //2 préparation de la requête
        $req = $this->connexion->prepare($request);
        //3 assigner les paramètres
        $req->bindValue(1, $tag->getName(), \PDO::PARAM_STR);
        //4 exécuter la requête
        $req->execute();
    }

    /**
     * Méthode pour rechercher un Tag avec son id
     * @param int $id id du Tag à chercher en BDD
     * @return Entity|null retourne un Objet User(Entity) ou null
     */
    public function find(int $id): ?Entity
    {
        $request = "SELECT id, name
        FROM tags WHERE id = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $id, \PDO::PARAM_INT);
        $req->execute();
        $tag = $req->fetch(\PDO::FETCH_ASSOC);
        return $tag;
    }


    /**
     * Méthode pour rechercher tous les Tags
     * @return array<Entity> retourne un tableau avec tous les User
     */
    public function findAll(): array
    {
        $request = "SELECT id, name FROM tags";
        $req = $this->connexion->prepare($request);
        $req->execute();
        $tag = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $tag;
    }

    /**
     * Méthode qui vérifie si un tag existe déjà
     * @param string $email
     * @return bool true si existe false si n'existe pas
     */
    public function isTagExistWithName(string $name): bool
    {
        $request = "SELECT name FROM tags WHERE name = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $name, \PDO::PARAM_STR);
        $req->execute();
        $tagTab = $req->fetch(\PDO::FETCH_ASSOC);
        
        //Test si l'utilisateur n'existe pas
        if (!$tagTab) {
            return false;
        }

        return true;
    }






}
