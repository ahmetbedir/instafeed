<?php

namespace Ahmetbedir;

class User
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function id()
    {
        return intval($this->user['id']);
    }

    public function username()
    {
        return $this->user['username'];
    }

    public function fullName()
    {
        return $this->user['full_name'];
    }

    public function photoSmall()
    {
        return $this->user['profile_pic_url'];
    }

    public function photoLarge()
    {
        return $this->user['profile_pic_url_hd'];
    }

    public function followersCount()
    {
        return intval($this->user['edge_followed_by']['count']);
    }

    public function followCount()
    {
        return intval($this->user['edge_follow']['count']);
    }

    public function bio()
    {
        return $this->user['biography'];
    }

    public function category()
    {
        return $this->user['business_category_name'];
    }

    public function isPrivate()
    {
        return boolval($this->user['is_private']);
    }

    public function isVerified()
    {
        return boolval($this->user['is_verified']);
    }

    public function isBusinessAccount()
    {
        return boolval($this->user['is_business_account']);
    }

    public function isJoinedRecently()
    {
        return boolval($this->user['is_joined_recently']);
    }

    public function isConnectedFbPage()
    {
        return boolval($this->user['connected_fb_page']);
    }
}
