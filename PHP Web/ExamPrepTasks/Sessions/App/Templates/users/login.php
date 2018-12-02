<?php /** @var \App\Data\UserDTO|null $data */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>USER LOGIN</h1>

<form method="POST">
    <div>
        <label>
            Username: <input type="text" name="username">
        </label>
    </div>

    <div>
        <label>
            Password: <input type="text" value="<?= $data != null ? $data['password'] : "" ?>" name="password">
        </label>
    </div>

    <div>
        <input type="submit" name="login" value="Login">
    </div>

</form>
