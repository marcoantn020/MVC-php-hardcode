<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title> <?php echo $this->controller->data["title"] ?? "Home"; ?> </title>
</head>
<body>
<div class="container">
    <section id="header">
        <h1>master do admin</h1>
        <ul id="nav">
            <li><a href="/"> Home </a></li>
            <li><a href="/signup"> SignUp </a></li>
            <li><a href="/login"> Login </a></li>
        </ul>

        <div >
            <?php echo welcome("user");?>
        </div>
    </section>

    <?php require PATH_VIEWS . $this->controller->view; ?>

</div>
</body>
</html>
