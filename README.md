# InstaFeed
### A package that you can quickly take and use your instagram images. Just give username!
---
## Basic Usage
```php
$username = 'ahmetbedir';

$instafeed = new Ahmetbedir\InstaFeed($username);
```

## User Info Available Methods
```php
$userInfo  = $instafeed->getUserInfo();


// Get Username
$userInfo->username();

// Get Full Name
$userInfo->fullName();

// Get Biography
$userInfo->bio();

// Get Followes Count (int)
$userInfo->followersCount();

// Get Follow Count (int)
$userInfo->followCount();

// Get Account Category
$userInfo->category();

// Get Account Private Status  (boolean)
$userInfo->isPrivate();

// Get Account Verified Status (boolean)
$userInfo->isVerified();

// Get Account Business Status (boolean)
$userInfo->isBusinessAccount();

// Get Account Joined Recently Status (boolean)
$userInfo->isJoinedRecently();

// Get Account Connected Facebook Page Status (boolean)
$userInfo->isConnectedFbPage();
```

## User Feed Available Methods
```php
// Get All Feeds By Feed Object
$allFeeds = $instafeed->getFeedList();

// Get First Feed
$firstFeed = $instafeed->getFirstFeed();

// Get Feed Url
$firstFeed->getDisplayUrl();

// Get Thumnail Feed Url
$firstFeed->getThumbnail();

// Get Feed Dimensions by Array e.g ["width" => 1333, "height" => 750]
$firstFeed->getDimensions();

// Get Feed Like Count
$firstFeed->getLikeCount();

// Get Feed Comment Count
$firstFeed->getCommentCount();

// Get Feed Location Name
$firstFeed->getLocationName();

// Get Feed Caption
$firstFeed->getCaption();

// Get Feed Video Status (Boolean)
$firstFeed->isVideo();
```