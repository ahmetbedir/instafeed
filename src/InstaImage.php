<?php
namespace Ahmetbedir;

/**
 * Instagram Image Class
 */
class InstaImage
{
    private $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function getDisplayUrl()
    {
        return $this->image['display_url'];
    }

    public function getDimensions()
    {
        return $this->image['dimensions'];
    }

    public function getThumbnail()
    {
        return $this->image['thumbnail_src'];
    }

    public function getThumbnailByIndex(int $index = null)
    {
        if (!isset($this->image['thumbnail_resources'][$index])) {
            return $this->image['thumbnail_src'];
        }

        return $this->image['thumbnail_resources'][$index]['src'];
    }

    public function getLikeCount()
    {
        return $this->image['edge_liked_by']['count'];
    }

    public function getCommentCount()
    {
        return $this->image['edge_media_to_comment']['count'];
    }

    public function getLocationName()
    {
        return $this->image['location']['name'];
    }

    public function getCaption()
    {
        if (!isset($this->image['edge_media_to_caption']['edges'][0]['node']['text'])) {
            return null;
        }

        return $this->image['edge_media_to_caption']['edges'][0]['node']['text'];
    }

    public function getAutoCaption()
    {
        return $this->image['accessibility_caption'];
    }

    public function isCommentsDisabled()
    {
        return boolval($this->image['comments_disabled']);
    }

    public function isVideo()
    {
        return boolval($this->image['is_video']);
    }

}
