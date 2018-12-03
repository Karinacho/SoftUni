<?php /** @var \App\Data\BookDTO $data */?>
<h1>VIEW BOOK</h1>

<a href="profile.php">My profile</a>

<form method="POST">
    <div>
        <label>
            <b>Book Title:</b> <?php echo $data->getTitle()?>
        </label>
    </div>

    <div>
        <label>
            <b>Book Author:</b><?php echo $data->getAuthor()?>
        </label>
    </div>

    <div>
        <label>
            <b>Description:</b> <?php echo $data->getDescription()?>
        </label>
    </div>

    <div>
        <label>
           <b>Genre:</b> <?php echo $data->getGenre()->getName()?>
        </label>
    </div>
    <div>
        <label>
             <img src="<?php echo $data->getImage()?>" alt="No image">
        </label>
    </div>

</form>

