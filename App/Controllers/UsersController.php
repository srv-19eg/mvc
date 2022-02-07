<?php

namespace App\Controllers;

use App\Models\User;
use App\View;

class UsersController
{
    /**
     * Demoometod med input för id som visas i en vy.
     * Ersätt med riktigt innehåll.;
     * @param string $username
     * @return void
     */
    public function show(string $username) {

        $user = new User(); // Skapa en ny model av klassen vi behöver
        $user->getUser($username); // hämta upp en användare från databasen

        // gör andra saker med användaren, kör fler frågor mot db etc efter behov
        // ...

        // Förbered data till att skicka in till twig
        $data = [
            "username"=>$user->username,
            "name"=>$user->name,
        ];

        View::render('users/show.twig',$data); // rendera vy
    }
}