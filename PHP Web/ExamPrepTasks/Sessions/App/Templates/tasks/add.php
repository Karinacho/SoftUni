<?php /** @var \App\Data\EditDTO $data */ ?>
<h1>Add new task</h1>

<form method="post">
    Title: <input type="text" name="title" minlength="3" maxlength="50"/><br />

    Category: <select name="category_id">
        <?php var_dump($data);foreach ($data->getCategories() as $category): ?>
            <option value="<?=$category->getId(); ?>"><?= $category->getName(); ?></option>
        <?php endforeach; ?>
    </select><br />

    Description: <input type="text" name="description" minlength="10" maxlength="10000"/><br />
    Location:<input type="text" name="location"  minlength="3" maxlength="100"/><br />
    Started On: <input type="date" name="started_on"/><br />
    Due Date: <input type="date" name="due_date"/><br />
    <input type="submit" name="save" value="Save"/><br />
</form>

<a href="dashboard.php">List</a>