<?php

namespace app\controllers;

use app\database\models\User;

class Home extends Base
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index($request, $response)
    {
//        $this->user->create(['first_name' => "Alberto", 'last_name' => "Tarasul"]);
//        $this->user->update(['fields' => ['username' => 'Yasuka'], 'where' => ['id' => 4]]);
        $this->user->delete('id', 5);
        $users = $this->user->findBy("username", "Nativo");
        return $this->getTwig()->render($response, $this->setView('site/home'),
        [
            "title" => "Home",
            "users" => $users,
        ]);

    }

}