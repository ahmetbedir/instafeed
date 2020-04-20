<?php

require __DIR__ . '/vendor/autoload.php';

use Ahmetbedir\InstaFeed;

$feed = new InstaFeed('ahmetbdr43');

echo '<div style="display:flex; flex-flow: row wrap;justify-content: space-around;">';
foreach ($feed->getFeedList() as $feed) {
    echo '<img src="' . $feed->getThumbnailByIndex(2) . '" />';
}
echo '</div>';
