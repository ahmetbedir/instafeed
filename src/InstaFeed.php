<?php
namespace Ahmetbedir;

use Exception;
use Throwable;

class InstaFeed
{
    /**
     * Intagram Url
     *
     * @var string
     */
    private $url = 'https://www.instagram.com/';

    /**
     * Intagram Username
     *
     * @var string
     */
    private $username;

    /**
     * User Info
     *
     * @var array
     */
    private $userInfo = array();

    /**
     * Init InstaFeed
     *
     * @param string $username
     */
    public function __construct(string $username)
    {
        $this->username = $username;

        $this->userData = $this->prepareUserData();
        $this->feedList = $this->prepareFeedList();
        $this->userInfo = $this->prepareUserInfo();

        unset($this->userData);
    }

    public function prepareUserData()
    {
        $userData = $this->getUserData();

        if (!$this->checkUserData($userData)) {
            throw new Exception("There was a problem accessing or processing the data!");
        }

        return $userData;
    }

    public function getFeedList()
    {
        return $this->feedList;
    }

    public function getUserInfo()
    {
        return $this->userInfo;
    }

    public function getFirstFeed()
    {
        return current($this->feedList);
    }

    private function prepareFeedList()
    {
        $mediaLists = $this->userData['graphql']['user']['edge_owner_to_timeline_media']['edges'];

        $imageList = array_map(function ($media) {
            return new Feed($media['node']);
        }, $mediaLists);

        unset($mediaLists);

        return $imageList;
    }

    private function prepareUserInfo()
    {
        $userData = $this->userData['graphql']['user'];

        unset(
            $userData['edge_felix_video_timeline'],
            $userData['edge_owner_to_timeline_media'],
            $userData['edge_saved_media'],
            $userData['edge_media_collections'],
            $userData['edge_mutual_followed_by'],
            $userData['edge_mutual_followed_by']
        );

        return new User($userData);
    }

    private function getUserData()
    {
        if (!function_exists('curl_init')) {
            $response = file_get_contents($this->getRequestUrl());
            return json_decode($response, true);
        }

        try {
            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL            => $this->getRequestUrl(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
            ]);
            $response = curl_exec($ch);

            curl_close($ch);

            return json_decode($response, true);
        } catch (Throwable $th) {
            throw new Exception($th);
        }
    }

    private function getRequestUrl()
    {
        return $this->url . $this->username . '/?__a=1';
    }

    private function checkUserData($userData)
    {
        return (
            isset($userData['graphql']['user']) &&
            isset($userData['graphql']['user']['edge_owner_to_timeline_media']['edges']) &&
            count($userData['graphql']['user']['edge_owner_to_timeline_media']['edges'])
        );
    }
}
