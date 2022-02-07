<?php

use Pecee\SimpleRouter\SimpleRouter;

// ----- HOME -----
SimpleRouter::get('/', 'HomeController@index');


// ----- USERS -----
SimpleRouter::get('/users/{username}', 'UsersController@show');
