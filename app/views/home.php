<h3>Lista de Uuarios: <?php echo count($this->controller->data["users"]);?></h3>

<ul>
    <?php foreach ($this->controller->data["users"] as $user): ?>
        <li>
            <?php echo $user->firstName . " " . $user->lastName; ?> |
            <a href="/user/show/<?php echo $user->id;?>"> Ver usuario </a>
        </li>
    <?php endforeach;?>
</ul>