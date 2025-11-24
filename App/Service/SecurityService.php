<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Entity\User;

use Mithridatem\Validation\Validator;
use Mithridatem\Validation\Exception\ValidationException;
use App\Utils\StringTools;

class SecurityService
{
    private readonly UserRepository $userRepository;
    private readonly Validator $validator;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->validator = new Validator();
    }

    //Logique métier de la création de compte
    public function addUser(array $user): string
    {
        $result = null;

        //Test si les mots de passe sont identiques
        if ($user["password"] != $user["verif_password"]) {
            $result = "Les mots de passe ne sont pas identiques";
        } elseif ($this->userRepository->isUserExistWithEmail($user["email"])) {
            //Nettoyer les entrées
            $user = StringTools::sanitize_array($user);

            //Test si l'utilisateur existe 
            $result = "Les informations email / password sont incompatibles avec l'ajout d'un compte";
        } else {
            //Nettoyer les entrées
            $user = StringTools::sanitize_array($user);

            //Assigner les valeurs par défault
            $user["imgProfil"] = "profil.png";
            $user["status"] = true;
            $user["grants"] = "ROLE_USER";

            //Hydratation en User
            // $newUser = User::hydrateUser($user);

            try {
                $this->validator->validate($newUser);

                //Hash du password
                $newUser->hashPassword();

                try {
                    //code//Save en BDD du User
                    $this->userRepository->saveUser($newUser);
                    $result = "Le compte " . $newUser->getEmail() . " a été ajouté en BDD";
                } catch (\PDOException $ex) {
                    $result = "Erreur d'enregistrement";
                }
            } catch (ValidationException $e) {
                $result = $e->getMessage();
            }
        }

        return $result;
    }

    //Logique métier de la connexion
    public function connexion(array $post): string
    {
        //Nettoyer
        $user = StringTools::sanitize_array($post);

        //Récupére l'objet User
        $user = $this->userRepository->findUserByEmail($post["email"]);


        //Si le compte n'existe pas 
        if (!isset($user)) {
            return "Les informations de connexion email et ou password sont invalides";
        }

        //test si les champs sont valides
        // try {
        //     $this->validator->validate($user[0]);
        // } catch (ValidationException $e) {
        //     return $e->getMessage();
        // }
        //Test si le password est correct
        $newUser = User::hydrateUser($user);
        if ($user instanceof User && $user->verifPassword($post["password"])) {

            $this->onAuthentificationSuccess($newUser);
            return "Connecté";
        }

        $this->onAuthentificationFailed();

        return "Les informations de connexion email et ou password ne sont pas correctes";
    }

    private function onAuthentificationSuccess(User $user): void
    {
        //Création des super globales de session
        $_SESSION["email"] = $user->getEmail();
        $_SESSION["pseudo"] = $user->getPseudo();
        $_SESSION["profil_image"] = $user->getProfiles_images();
        header("Refresh:2; url=/");
    }

    private function onAuthentificationFailed(): void
    {
        session_destroy();
        header("Refresh:3; url=/login");
    }

    //Logique métier de la déconnexion
    public function deconnexion()
    {
        session_destroy();
        header("Location:/");
    }
}
