<?php

require __DIR__ . '/vendor/autoload.php';

use Ahmetbedir\InstaFeed;

$instafeed = new InstaFeed('ahmetbdr43');
$userInfo  = $instafeed->getUserInfo();

echo '<pre>';
echo "Username:\t@", $userInfo->username() . PHP_EOL;
echo "Full Name:\t", $userInfo->fullName() . PHP_EOL;
echo "Biography:\t", $userInfo->bio() . PHP_EOL;
echo "Followers:\t", $userInfo->followersCount() . PHP_EOL;
echo "Follow:\t\t", $userInfo->followCount() . PHP_EOL;
echo "Category:\t", $userInfo->category() . PHP_EOL;
echo "Is Private:\t", ($userInfo->isPrivate() ? 'Yes' : 'No') . PHP_EOL;
echo "Is Verified:\t", ($userInfo->isVerified() ? 'Yes' : 'No') . PHP_EOL;
echo "Business Act.:\t", ($userInfo->isBusinessAccount() ? 'Yes' : 'No') . PHP_EOL;
echo "New Account:\t", ($userInfo->isJoinedRecently() ? 'Yes Joined Recently' : 'No') . PHP_EOL;
echo "FB Page:\t", ($userInfo->isConnectedFbPage() ? 'Connected' : 'Not Connected') . PHP_EOL;

echo '<hr>';
echo '<div style="display:flex; flex-flow: row wrap;justify-content: space-around;">';
foreach ($instafeed->getFeedList() as $feed) {
    echo '<img src="' . $feed->getThumbnailByIndex(2) . '" />';
}
echo '</div>';
