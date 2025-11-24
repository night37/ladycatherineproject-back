<?php

namespace App\Repository;

use App\Repository\AbstractRepository;
use App\Database\MariaDB;
use App\Entity\Entity;
use App\Entity\Publication;


class PublicationRepository extends AbstractRepository
{

    //Constructeur
    public function __construct()
    {
        $this->connexion = (new MariaDB())->connectBdd();
    }

    /**
     * Méthode pour trouver une entité par son id
     * @param int $id Id de l'entité à rechercher
     * @return Entity|null
     */
    public function find(int $id): ?Entity
    {
        $request = "SELECT id_publication, lesson_difficulty, type_of_publication, published_at, updated_at, images, 'status',' title, content, id_user FROM publication WHERE id_publication = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $id, \PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Publication::class);
        $pub = $req->fetch();
        return $pub;
    }

    /**
     * Méthode pour trouver toutes les entités
     * @return array<Entity>
     */
    public function findAll(): array
    {
        $request = "SELECT id_publication, lesson_difficulty, type_of_publication, published_at, updated_at, images, 'status',' title, content, id_user FROM publication";
        $req = $this->connexion->prepare($request);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Publication::class);
        $pubs = $req->fetchAll();
        return $pubs;
    }

    public function findAllByType($typeOfPublication): array
    {
        $request = "SELECT id_publication, lesson_difficulty, type_of_publication, published_at, updated_at, images, 'status',' title, content, id_user FROM publication WHERE type_of_publication = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $typeOfPublication, \PDO::PARAM_BOOL);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Publication::class);
        $pubs = $req->fetchAll();
        return $pubs;
    }

    public function assocTagsWithPub($pubId,  array $tags)
    {

        $request = "INSERT INTO publication_tags (id_publication, id_tag) VALUES (?, ?)";
        $req = $this->connexion->prepare($request);

        foreach ($tags as $tagId) {
            $req->execute([$pubId, $tagId]);
        }
    }
    public function getOrCreateTag(string $name): int
    {
        // Vérifier si le tag existe
        $request = "SELECT id FROM tags WHERE name = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $name, \PDO::PARAM_STR);
        $req->execute();
        $tag = $req->fetch();

        if ($tag) {
            return $tag["id"];
        }

        // Sinon, l'insérer
        $insert = $this->connexion->prepare("INSERT INTO tags (name) VALUES (?)");
        $insert->execute([$name]);

        return $this->connexion->lastInsertId();
    }

    public function savePublication(Publication $publication): void
    {
        $request = "INSERT INTO publication (lesson_difficulty, type_of_publication, published_at, updated_at, images, 'status',' title, content, id_user) VALUES (?,?,?,?,?,?,?,?,?)";

        $req = $this->connexion->prepare($request);

        $req->bindValue(1, $publication->getDifficulty(), \PDO::PARAM_STR);
        $req->bindValue(2, $publication->getTypeOfPublication(), \PDO::PARAM_STR);
        $req->bindValue(3, $publication->getPublishedAt(), \PDO::PARAM_STR);
        $req->bindValue(4, $publication->getUpdatedAt(), \PDO::PARAM_STR);
        $req->bindValue(5, $publication->getImage(), \PDO::PARAM_STR);
        $req->bindValue(6, $publication->getStatus(), \PDO::PARAM_BOOL);
        $req->bindValue(7, $publication->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(8, $publication->getContent(), \PDO::PARAM_STR);
        $req->bindValue(9, $publication->$_SESSION["user"], \PDO::PARAM_INT);
        $req->execute();

        $pubId = $this->connexion->lastInsertId();
        $name = $this->getTag();
        $this->assocTagsWithPub($pubId, $this->getOrCreateTag($name));
    }
}
