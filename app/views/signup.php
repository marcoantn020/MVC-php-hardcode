<form action="/signup/store" method="post" id="form-create">
    <h3>Cadastro de Usuario</h3>

    <label for="firstName">Primeiro nome:
        <input type="text" name="firstName" id="firstName" value="<?php echo old('firstName');?>"></label>
    <?php echo flash("firstName")?>

    <label for="lastName">Ultimo nome:
        <input type="text" name="lastName" id="lastName" value="<?php echo old('lastName');?>"></label>
    <?php echo flash("lastName")?>

    <label for="email">E-mail:
        <input type="text" name="email" id="email" value="<?php echo old('email');?>"></label>
    <?php echo flash("email")?>

    <label for="username">Nome de usuario:
        <input type="text" name="username" id="username" value="<?php echo old('username');?>"></label>
    <?php echo flash("username")?>

    <label for="password">Senha:
        <input type="text" name="password" id="password" value="<?php echo old('password');?>"></label>
    <?php echo flash("password")?>


    <button type="submit">Criar</button>

</form>