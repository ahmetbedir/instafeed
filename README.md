# InstaFeed
### A package that you can quickly take and use your instagram images. Just give username!
---
## Basic Usage
```php
$feeds = new Ahmetbedir\InstaFeed('ahmetbdr43');

$allFeeds = $feed->getFeedList(); // Get All Feeds By Array

$feed = $allFeeds[0];

// Get Feed Url
echo $feed->getDisplayUrl();

// Get Thumnail Feed Url
echo $feed->getThumbnail();

// Get Feed Dimensions by Array e.g ["width" => 1333, "height" => 750]
echo $feed->getDimensions();

// Get Feed Like Count
echo $feed->getLikeCount();

// Get Feed Comment Count
echo $feed->getCommentCount();

// Get Feed Location Name
echo $feed->getLocationName();

// Get Feed Caption
echo $feed->getCaption();

// Check Feed Is Video. Return to boolean
echo $feed->isVideo();
```