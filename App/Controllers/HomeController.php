<?php

namespace App\Controllers;

class HomeController
{
    /**
     * Enklast möjliga demometod. Gör ytterligare klasser efter behov.
     * Exempelvis en klass UsersController ifall du ska ha användare och där hanterar du allt med användaren.
     * @return void
     */
    public function index()
    {
        echo "Detta är ett demo. Ersätt mig med riktigt innehåll.<br>";
        echo "Metod: <strong>".request()->getMethod()."</strong><br>";
        echo "URL: <strong>".request()->getURL()."</strong><br>";
    }

}