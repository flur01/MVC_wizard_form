<?php


namespace Controllers;

use Models\User;
use Core\Session;
use Core\App;

class GetController
{

    public function addUser()
    {
        $page = 0;
        if (isset($_SESSION['page'])) {
            $page = $_SESSION['page'];
        }
        $address = App::get('config')['address'];

        $tweetMessage = App::get('config')['tweetMessage'];

        return view()->render('index',[
            'page' => $page,
            'address' => $address,
            'tweetMessage' => $tweetMessage
        ]);
        
    }
    
    public function allMembers()
    {
        $user = new User();
        $data = $user->select()->get();
        $data = $user->setDefaultImage($data);
        return view()->render('all-members', ['data' => $data]);  


    }


    public function error_404()
    {
        $code = '404';
        $message = 'Page not found';

        return view()->render('all-members', [
            'code' => $code,
            'message' => $message
        ]);  

    }

}