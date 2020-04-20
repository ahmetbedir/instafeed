# InstaFeed
### A package that you can quickly take and use your instagram images. Just give username!
---
## Basic Usage
```php
$instafeed = new Ahmetbedir\InstaFeed('ahmetbdr43');

$allFeeds = $instafeed->getFeedList(); // Get All Feeds By Feed Object

$firstFeed = $instafeed->getFirstFeed();

// Get Feed Url
echo $firstFeed->getDisplayUrl();

// Get Thumnail Feed Url
echo $firstFeed->getThumbnail();

// Get Feed Dimensions by Array e.g ["width" => 1333, "height" => 750]
echo $firstFeed->getDimensions();

// Get Feed Like Count
echo $firstFeed->getLikeCount();

// Get Feed Comment Count
echo $firstFeed->getCommentCount();

// Get Feed Location Name
echo $firstFeed->getLocationName();

// Get Feed Caption
echo $firstFeed->getCaption();

// Check Feed Is Video. Return to boolean
echo $firstFeed->isVideo();
```