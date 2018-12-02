<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Edit task "<?= $data->getTask()->getTitle(); ?>"</h1>

<form method="post">
    Title: <input value="<?= $data->getTask()->getTitle(); ?>" type="text" name="title" minlength="3"
                  maxlength="50"/><br/>

    Category: <select name="category_id">
        <?php foreach ($data->getCategories() as $category): ?>
            <?php if ($data->getTask()->getCategory()->getId() === $category->getId()) : ?>
                <option selected="selected" value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>

    Description: <input value="<?= $data->getTask()->getDescription(); ?>" type="text" name="description" minlength="3"
                        maxlength="50"/><br/>
    Location:<input value="<?= $data->getTask()->getLocation(); ?>" type="text" name="location"/><br/>
    Started On: <input type="date" name="started_on"/><br/>
    Due Date: <input type="date" name="due_date"/><br/>
    <input type="submit" name="save" value="Save"/><br/>
</form>

<a href="dashboard.php">List</a>