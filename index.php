<?php

$url = 'https://dev98.de/feed/';

$feeds = simplexml_load_file($url);

var_dump($feeds);