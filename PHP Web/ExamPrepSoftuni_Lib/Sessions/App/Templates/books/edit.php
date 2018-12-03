<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Edit book</h1>

<form method="post">
    Book title: <input value="<?= $data->getBook()->getTitle(); ?>" type="text" name="title"
                 /><br/>
    Book author: <input value="<?= $data->getBook()->getAuthor(); ?>" type="text" name="author"
                       /><br/>
    Description: <textarea  type="text" name="description"
                      ><?= $data->getBook()->getDescription() ?></textarea><br/>
    Image URL: <input value="<?= $data->getBook()->getImage(); ?>" type="text" name="image"
                     /><br/>
    Genre: <select name="genre_id">
        <?php foreach ($data->getGenre() as $category): ?>
            <?php if ($data->getBook()->getGenre()->getId() === $category->getId()) : ?>
                <option selected="selected" value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    <img src="<?php echo $data->getBook()->getImage()?>" alt="No image">
<br>
    <input type="submit" name="edit" value="Edit"/><br/>
</form>
