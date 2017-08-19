<?php

namespace App\Social;

use \Facebook\Facebook;

/**
 *
 */
class FacebookHelper
{
    protected $app_id;
    protected $app_secret;
    protected $default_graph_version;
    protected $default_access_token;
    protected $pageid;

    public function __construct()
    {
        $this->app_id = config('services.facebook')['app_id'];
        $this->app_secret = config('services.facebook')['app_secret'];
        $this->default_graph_version = 'v2.10';
        $this->default_access_token = config('services.facebook')['app_access_token'];
        $this->pageid = 497184450327846;
    }

    public function getTextFeedElements($limit = 10)
    {
        $fb = new Facebook([
          'app_id' => $this->app_id,
          'app_secret' => $this->app_secret,
          'default_graph_version' => $this->default_graph_version,
          'default_access_token' => $this->default_access_token, // optional
        ]);
        $response = $fb->get('/497184450327846/posts?fields=id,message,story,created_time,full_picture,link');
        $responseData = ($response->getDecodedBody())['data'];
        $filteredData = array_filter($responseData, function ($data) {
            return !array_key_exists('story', $data) && array_key_exists('message', $data);
        });
        return array_slice($filteredData, 0, $limit);
    }
}
