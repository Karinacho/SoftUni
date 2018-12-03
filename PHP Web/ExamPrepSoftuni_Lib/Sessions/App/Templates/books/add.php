<?php /** @var \App\Data\editDTO $data */?>
<h1>ADD NEW BOOK</h1>
<br>
<a href="profile.php">My profile</a>
<form method="post">
    Book Title: <input type="text" name="title"/><br />
    Book Author: <input type="text" name="author"/><br/>
    Description: <textarea name="description"></textarea><br/>
    Image URL: <input type="text" name="image"/><br/>
    Genre: <select name="genre_id">
        <?php foreach ($data->getGenre() as $category): ?>
            <option value="<?=$category->getId(); ?>"><?= $category->getName(); ?></option>
        <?php endforeach; ?>
    </select><br />
    <input type="submit" name="add" value="Add"/><br />
</form>

