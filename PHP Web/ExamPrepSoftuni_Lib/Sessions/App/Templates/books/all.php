<?php  /** @var \App\Data\BookDTO[] $data */ ?>
<h1>All Tasks</h1>

<a href="add_book.php">Add new book</a> | <a href="logout.php">logout</a>

<table border="1">
    <thead>
    <tr>
        <td><b>Title</b></td>
        <td>Author</td>
        <td>Genre</td>
        <td>Added by User</td>
        <td>Details</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row->getTitle() ?></td>
            <td><?= $row->getAuthor() ?></td>
            <td><?= $row->getGenre()->getName() ?></td>
            <td><?= $row->getUser()->getUsername() ?></td>
            <td><a href="details.php?id=<?= $row->getId(); ?>"">Details</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>

</table>