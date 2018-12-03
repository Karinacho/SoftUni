<?php /** @var \App\Data\UserDTO $data */ ?>
<h1>Hello, <?php echo($data->getFullName()) ?></h1>

<a href="add_book.php">Add new book</a> | <a href="logout">logout</a>
<br/><br>

<a href="my_books.php">My books</a><br>
<a href="all_books.php">All books</a>