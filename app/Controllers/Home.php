<?php

namespace App\Controllers;
use Hybridauth\Provider\Facebook;
class Home extends BaseController
{
    public function index()
    {
    // $config = [
    // 'callback' => 'http://localhost/codeIgniter/appstarter/',
    // 'keys' => [
    //     'id' => '844763669686236',
    //     'secret' => '849945e9e5b30d14ad3d1c2af1cd4162',
    //     ],
    // ];
    // try {
    //     $facebook = new Facebook($config);
    //     $facebook->authenticate();
    //     var_dump($facebook); exit;
    //     //$accessToken = $facebook->getAccessToken();
    //     $userProfile = $facebook->getUserProfile();
    //     //$apiResponse = $facebook->apiRequest('statuses/home_timeline.json');
    //     var_dump($userProfile); exit;
    // }
    // catch (\Exception $e) {
    //     echo 'Oops, we ran into an issue! ' . $e->getMessage();
    // }
        $data = [
            'title'=>'Home Page'
        ];
        return view('welcome_message',$data);
    }
}

?>
