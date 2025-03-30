<?php

namespace App\Service;

use potibm\Bluesky\Response\RecordResponse;

class BlueService 
{
    
    public static function SendMessage(string $message, string $account ,string $password): RecordResponse
    {
        $api = new \potibm\Bluesky\BlueskyApi($account, $password);
        $postService = new \potibm\Bluesky\BlueskyPostService($api);
        $post = \potibm\Bluesky\Feed\Post::create($message);
        return $api->createRecord($post);
    }

}