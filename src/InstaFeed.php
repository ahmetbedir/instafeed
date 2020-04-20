<?php
namespace Ahmetbedir;

use Exception;
use Throwable;

class InstaFeed
{
    private $url = 'https://www.instagram.com/';
    private $username;

    /**
     * User Data
     *
     * @var array
     */
    private $userData = array();

    public function __construct(string $username)
    {
        $this->username = $username;
        $this->feedList = $this->prepareFeedList();
    }

    public function getFeedList()
    {
        return $this->feedList;
    }

    public function getFirstFeed()
    {
        return current($this->feedList);
    }

    private function prepareFeedList()
    {
        $this->userData = $this->getUserData();

        if (!$this->checkUsableFeed()) {
            throw new Exception("Error Processing Request", 1);
        }

        $mediaLists = $this->userData['graphql']['user']['edge_owner_to_timeline_media']['edges'];

        unset($this->userData);

        $imageList = array_map(function ($media) {
            return new Feed($media['node']);
        }, $mediaLists);

        unset($mediaLists);

        return $imageList;
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
            throw new Exception($th, 1);
        }
    }

    private function getRequestUrl()
    {
        return $this->url . $this->username . '/?__a=1';
    }

    private function checkUsableFeed()
    {
        return (isset($this->userData['graphql']['user']['edge_owner_to_timeline_media']['edges']) && count($this->userData['graphql']['user']['edge_owner_to_timeline_media']['edges']));
    }
}
