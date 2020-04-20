<?php
namespace Ahmetbedir;

/**
 * Instagram Feed
 */
class Feed
{
    private $feed;

    public function __construct($feed)
    {
        $this->feed = $feed;
    }

    public function getDisplayUrl()
    {
        return $this->feed['display_url'];
    }

    public function getDimensions()
    {
        return $this->feed['dimensions'];
    }

    public function getThumbnail()
    {
        return $this->feed['thumbnail_src'];
    }

    public function getThumbnailByIndex(int $index = null)
    {
        if (!isset($this->feed['thumbnail_resources'][$index])) {
            return $this->feed['thumbnail_src'];
        }

        return $this->feed['thumbnail_resources'][$index]['src'];
    }

    public function getLikeCount()
    {
        return $this->feed['edge_liked_by']['count'];
    }

    public function getCommentCount()
    {
        return $this->feed['edge_media_to_comment']['count'];
    }

    public function getLocationName()
    {
        return $this->feed['location']['name'];
    }

    public function getCaption()
    {
        if (!isset($this->feed['edge_media_to_caption']['edges'][0]['node']['text'])) {
            return null;
        }

        return $this->feed['edge_media_to_caption']['edges'][0]['node']['text'];
    }

    public function getAutoCaption()
    {
        return $this->feed['accessibility_caption'];
    }

    public function isCommentsDisabled()
    {
        return boolval($this->feed['comments_disabled']);
    }

    public function isVideo()
    {
        return boolval($this->feed['is_video']);
    }

}
