<?php

require __DIR__ . '/vendor/autoload.php';

use Ahmetbedir\InstaFeed;

$instafeed = new InstaFeed('ahmetbdr43');

echo '<pre>';
var_dump($instafeed->getFirstFeed());

die;

echo '<div style="display:flex; flex-flow: row wrap;justify-content: space-around;">';
foreach ($feed->getFeedList() as $feed) {
    echo '<img src="' . $feed->getThumbnailByIndex(2) . '" />';
}
echo '</div>';
