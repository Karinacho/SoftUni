<?php  /** @var \App\Data\BookDTO[] $data */ ?>

<h1>My Books</h1>

<a href="add_book.php">Add new book</a> |
<a href="profile.php">My profile</a> |
<a href="logout.php">logout</a>

<table border="1">
    <thead>
    <tr>
        <td><b>Title</b></td>
        <td>Author</td>
        <td>Genre</td>
        <td>Edit</td>
        <td>Details</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row->getTitle() ?></td>
            <td><?= $row->getAuthor() ?></td>
            <td><?= $row->getGenre()->getName() ?></td>
            <td><a href="edit_task.php?id=<?= $row->getId(); ?>">edit book</a></td>
            <td><a href="delete_task.php?id=<?= $row->getId(); ?>"">delete book</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>

</table>