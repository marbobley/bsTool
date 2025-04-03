<?php

namespace App\Service;

use potibm\Bluesky\Response\RecordResponse;
use potibm\Bluesky\BlueskyApi;
use potibm\Bluesky\BlueskyPostService;
use potibm\Bluesky\Feed\Post;

class BlueService
{
    //cid : bafyreia5hne6evfsrzbmrqtuoplbwhvcbf2wfso2zz6y43hgg3qkm4bvym
    //$postService = new \potibm\Bluesky\BlueskyPostService($api);
    private ?BlueskyApi $api = null;
    private ?BlueskyPostService $postService = null;

    public function __construct(private string $account, private string $password)
    {
        if($this->api === null)
        {
            $this->api = new BlueskyApi($this->account, $this->password);
        }
        if($this->postService === null)
        {
        }
    }
    
    public function SendMessage(string $message): RecordResponse
    {           
        $post = Post::create($message);
        return $this->api->createRecord($post);
    }

    public function AddMessage(string $uri , string $message)
    {
        $api = new BlueskyApi($this->account, $this->password);
        $postService = new \potibm\Bluesky\BlueskyPostService($api);
        $post = \potibm\Bluesky\Feed\Post::create('✨ example mentioning @atproto.com to share the URL 👨‍❤️‍👨 https://en.wikipedia.org/wiki/CBOR.');
        $response = $api->createRecord($post);

        $post = \potibm\Bluesky\Feed\Post::create('example of a reply');
        $post = $postService->addReply(
            $post, 
            $response->getUri()->getUri()
        );
        /*
        $post = Post::create($message);
        $post = $this->postService->addReply(
            $post, 
            $uri
        );*/
    }

    public function QuoteMessage(string $uri , string $message)
    {
        $post = Post::create($message);
        $post = $this->postService->addQuote(
            $post, 
            $uri
);
    }





}