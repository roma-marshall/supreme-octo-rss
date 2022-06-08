<head>
    <title>RSS dev98</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<?php
$RSS_URL = 'https://dev98.de/feed/';
$feeds = simplexml_load_file($RSS_URL);

if ($feeds):
$webpage_title = $feeds->channel->title;
$webpage_url = $feeds->channel->link;
?>
<body class="bg-light">
<div class="container bg-white rounded py-3 px-5 my-5">
<div class="row">
    <div class="main">
        <h1 class="display-3">
            <a class="text-decoration-none" href='<?= $webpage_url; ?>' target='_blank'>RSS Feeds dev98</a>
        </h1>
    </div>
    <?php
    foreach ($feeds->channel->item as $item):
        $title = $item->title;
        $description = $item->description;
        $link = $item->link;
        $date = date('Y-m-d', strtotime($item->pubDate));
        $comments = $item->comments;
        ?>
        <div class="feed mt-5 bg-light rounded pt-5 pb-3 px-5">
            <h2>
                <a class="text-dark text-decoration-none display-6" href="<?= $link; ?>" target="_blank">
                   <?= $title; ?>
                </a>
            </h2>
            <p class="text-black-50">
                <?= $date; ?>
                <a class="text-decoration-none" href="<?= $comments; ?>" target="_blank">Comments</a>
            </p>
            <p><?= $description; ?></p>
        </div>
        <?php
    endforeach;
    echo "</div></div></body>";
    else:
        echo "<h1>No RSS feeds found</h1>";
    endif;
