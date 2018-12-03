<?php /** @var \App\Data\UserDTO|null $data */ ?>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>
<h1>USER REGISTRATION</h1>

<form method="POST">
    <div>
        <label>
           Username: <input type="text" name="username" value="<?= $data != null ? $data['username'] : "" ?>">
        </label>
    </div>

    <div>
        <label>
            Password: <input type="text" name="password">
        </label>
    </div>

    <div>
        <label>
            Confirm Password: <input type="text" name="confirm_password">
        </label>
    </div>

    <div>
        <label>
            Full Name: <input type="text" name="fullName" value="<?= $data != null ? $data['fullName'] : "" ?>">
        </label>
    </div>

    <div>
        <label>
          Born On: <input type="date" name="bornOn" value="<?= $data != null ? $data['bornOn'] : "" ?>">
        </label>
    </div>


    <div>
        <input type="submit" name="register" value="Register!">
    </div>

</form>
