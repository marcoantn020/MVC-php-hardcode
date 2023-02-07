<?php

namespace app\core;

use app\interfaces\AppInterface;

class MyApp
{
    private AppInterface $appInterface;
    private $controller;

    public function __construct(AppInterface $appInterface)
    {
        $this->appInterface = $appInterface;
    }

    public function controller(): void
    {
        $controller = $this->appInterface->controller();
        $method = $this->appInterface->methods($controller);
        $param = $this->appInterface->params();

        $this->controller = new $controller;
        $this->controller->$method($param);
    }

    public function view(): void
    {
        if($_SERVER["REQUEST_METHOD"] === "GET") {

            if(!isset($this->controller->data)) {
                throw new \RuntimeException("A propriedade [data] é obrigatoria");
            }

            if(!array_key_exists('title', $this->controller->data)) {
                throw new \RuntimeException("A propriedade [title] é obrigatoria em data.");
            }

            require PATH_VIEWS . "index.php";
        }
    }
}