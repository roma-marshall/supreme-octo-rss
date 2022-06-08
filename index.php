<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
</html>

<?php
$RSS_URL = 'https://dev98.de/feed/';
$feeds = simplexml_load_file($RSS_URL);

if ($feeds) {
    $webpage_title = $feeds->channel->title;
    $webpage_url = $feeds->channel->link;

    foreach ($feeds->channel->item as $item) {
        $title = $item->title;
        $description = $item->description;
        $link = $item->link;
        $date = date('Y-m-d', strtotime($item->pubDate));
        $comments = $item->comments;
        ?>

        <div class="App">
            <h2>
                <a href="<?= $link; ?>" target="_blank"><?= $title; ?></a>
            </h2>
            <p>
                <?= $date; ?>
                <a href="<?= $comments; ?>" target="_blank">Comments</a>
            </p>
            <p><?= $description; ?></p>
        </div>

        <?php
    }
} else {
    echo "<h1>No RSS feeds found</h1>";
}


?>

<!--<div class="main">-->
<!--    <h1>RSS --><? // //= $webpage_title ?><!--</h1><a href='--><? // //= $webpage_url ?><!--' target='_blank'>--><? // //= $webpage_url ?><!--</a>-->
<!--</div>-->
