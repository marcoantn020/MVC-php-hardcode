<?php

namespace app\controllers;


use app\interfaces\ControllerInterface;
use app\models\activerecord\FindBy;

class User implements ControllerInterface
{
    public array $data = [];
    public string $view;

    public function show(array $args)
    {
        $id = $args[0];
        $user = (new \app\models\User())->execute(new FindBy('id', $id));

        if(!$user) {
            throw new \RuntimeException("Usuario não encontrado");
        }

        $this->view = "user/details.php";
        $this->data = [
            'title' => "Details",
            'user' => $user
        ];

    }

    public function index(array $args)
    {
        // TODO: Implement index() method.
    }

    public function edit(array $args)
    {
        // TODO: Implement edit() method.
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