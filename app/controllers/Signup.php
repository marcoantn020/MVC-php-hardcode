<?php

namespace app\controllers;

use app\classes\Validate;
use app\interfaces\ControllerInterface;
use app\models\activerecord\Insert;

class Signup implements ControllerInterface
{
    public array $data = [];
    public string $view;

    public function index(array $args)
    {

        $this->view = "signup.php";
        $this->data = [
            "title" => "Signup",
        ];
    }

    public function edit(array $args)
    {
        // TODO: Implement edit() method.
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
        $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

        $validate = new Validate;
        $validate->handle([
            'firstName' => [REQUIRED, MINLENGTH.':3'],
            'lastName' => [REQUIRED],
            'email' => [REQUIRED, EMAIL],
            'username' => [REQUIRED,MINLENGTH.':3'],
            'password' => [REQUIRED, MAXLENGTH.':10', MINLENGTH.':4']
        ]);

        if($validate->errors) {
            return redirect("/signup");
        }

        $user = new \app\models\User;
        $user->firstName = $validate->data['firstName'];
        $user->lastName = $validate->data['lastName'];
        $user->email = $validate->data['email'];
        $user->username = $validate->data['username'];
        $user->password = password_hash($validate->data['password'], PASSWORD_DEFAULT);
        $created = $user->execute(new Insert);

        if($created) {
            return redirect("/");
        }
    }

    public function destroy(array $args)
    {
        // TODO: Implement destroy() method.
    }
}