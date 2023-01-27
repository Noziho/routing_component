<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'home')]
class UserController extends AbstractController
{
    /**
     * Cette méthode retourne la liste des utilisateur de l'application
     * @return Response
     * TODO Définissez la route pour accéder à cette fonction du controller UserController
     */
    #[Route('/', name: 'users_list')]
    public function list(): Response
    {
        $users = ["User1", "User2", "User3", "User4"];
        return $this->render('user/users_list.html.twig', [
            "users" => $users,
        ]);
    }


    /**
     * Cette méthode édite un utilisateur en particulier, elle devra prendre un paramètre supplémentaire pour accéder à l'utilisateur en question.
     * @param int $userID
     * @return Response
     * TODO Définissez cette route, n'oubliez pas de définir le paramètre pour être en mesure d'éditer l'utilisateur.
     */
    #[Route('/edit/{userID}', name: 'edit_user')]
    public function edit(int $userID): Response
    {
        $edited = "edited user " . $userID;

        return $this->render('user/edit_user.html.twig', [
            "edited" => $edited,
        ]);
    }


    /**
     * Cette méthode supprime un utilisateur, elle prend un paramètre supplémentaire qui doit ABSOLUMENT être un entier, j'attend une regex pour celui ci !!!!!
     * @param int $userId
     * @return Response
     * TODO Définissez cette route.
     */
    #[Route('/delete/{userID<\d+>}', name: 'delete_user')]
    public function delete(int $userID): Response
    {
        $deleted = "L'utilisateur " . $userID . " à été supprimer avec succès.";

        return $this->render('user/users_list.html.twig', [
            "deleted" => $deleted,
        ]);
    }

}