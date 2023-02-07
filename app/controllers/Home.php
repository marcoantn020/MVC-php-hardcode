<?php

namespace app\controllers;

use app\interfaces\ControllerInterface;
use app\models\activerecord\Find;
use app\models\User;

class Home implements ControllerInterface
{
    public array $data = [];
    public string $view;

    public function index(array $args)
    {
        $users = (new User())->execute(new Find());

        $this->view = "home.php";
        $this->data = [
            "title" => "Home",
            "users" => $users
        ];
    }

    public function edit(array $args)
    {

    }

    public function show(array $args)
    {
        // TODO: Implement show() method.
    }

    public function update(array $args)
    {
        // TODO: Implement update() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function destroy(array $args)
    {
        // TODO: Implement destroy() method.
    }
}