<form id="login" action="/login/store" method="post">
    <h3>LOGIN</h3>
    <label for=""> Username:
        <input type="text" name="username" placeholder="username" value="marco">
    </label>

    <label for=""> Password:
        <input type="password" name="password" placeholder="password" value="123456">
    </label>
    <br>
    <?php echo flash("login"); ?>

    <label for="">
        <input type="submit" name="login" value="Logar">
    </label>
</form>
