<?php  /** @var \App\Data\TaskDTO[] $data */ ?>
<h1>All Tasks</h1>

<a href="add.php">Add new task</a> | <a href="logout.php">logout</a>

<table border="1">
    <thead>
    <tr>
        <td><b>Title</b></td>
        <td>Category</td>
        <td>Author</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row->getTitle() ?></td>
            <td><?= $row->getCategory()->getName()?></td>
            <td><?= $row->getAuthor()->getUsername() ?></td>
            <td><?php if($_SESSION['id']==$row->getAuthor()->getId()):
                    ?> <a href="edit_task.php?id=<?= $row->getId(); ?>">Edit Task</a>
                <?php
                endif;?></td>
            <td><?php if($_SESSION['id']==$row->getAuthor()->getId()):
                    ?> <a href="delete_task.php?id=<?= $row->getId(); ?>">Delete Task</a>
                <?php
                endif;?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>