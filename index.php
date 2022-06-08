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
}


?>

<!--<div class="main">-->
<!--    <h1>RSS --><? // //= $webpage_title ?><!--</h1><a href='--><? // //= $webpage_url ?><!--' target='_blank'>--><? // //= $webpage_url ?><!--</a>-->
<!--</div>-->
