<?php

namespace app\controllers\site;

use app\classes\BlockNotLogged;
use app\classes\Flash;
use app\interfaces\ControllerInterface;
use app\models\activerecord\FindBy;

class Login implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public $master = 'index.php';

    public function __construct()
    {
        BlockNotLogged::block($this, ['edit', 'show', 'update']);

    }

    public function index(array $args)
    {
        $this->view = "login.php";
        $this->data = [
            'title' => "Login",
        ];

    }

    public function store()
    {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

        $user = (new \app\models\User())->execute(new FindBy('username', $username));

        if(!$user) {
            Flash::set("login","Username/Password incorrect");
            return redirect("/login");
        }

        if(!password_verify($password, $user->password)) {
            Flash::set("login","Username/Password incorrect");
            return redirect("/login");
        }

        unset($user->password);

        $_SESSION["user"] = $user;

        return redirect("/");
    }

    public function destroy(array  $args)
    {
        session_destroy();
        return redirect("/");
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
}