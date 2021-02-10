<?php


namespace Controllers;

use Models\User;
use Validators\AddUserValidator;
use Validators\AddMemberValidator;


class PostController
{
    public function addUser()
    {
        $validator = new AddUserValidator($_POST); 

        if ($validator->validate() !== true){
            echo json_encode([
                'success' => 0,
                'errorMessage' => $validator->validate()
                ]);
            return;
        }

        $user = new User();

        $checkEmail = $user->select()->where('email', '=', $_POST['email'])->get();

        if ($checkEmail) {
            echo json_encode([
                'success' => 0,
                'errorMessage' => 'Email already exists'
                ]);
            return;
        }
        
        $user->insert([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'birthdate' => $_POST['birthdate'],
            'report_subject' => $_POST['report_subject'],
            'country' => $_POST['country'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
        ]);

        $_SESSION['userId'] = $user->select('id')->where('email', '=', $_POST['email'])->getFirst()['id'];

        echo json_encode([
            'success' => 1
        ]);
        return;

    }


    public function addInfo()
    {
        $validaData = $_POST;
        $validaData['image'] = $_FILES['image'];

        $validator = new AddMemberValidator($validaData); 

        if ( $validator->validate() !== true){
            echo json_encode([
                'success' => 0,
                'errorMessage' => $validator->validate()
                ]);
            return;
        }

        $dir = str_replace('controllers', '', __DIR__);
        $filename = date('Y-m-d_H-i_') . $_FILES['image']['name'];
        $path = $dir . 'public/images/'.  $filename ;
        
        move_uploaded_file($_FILES['image']['tmp_name'], $path);

        
     
        $member = new User();
        $member->update([
            'company' => $_POST['company'],
            'position' => $_POST['position'],
            'about' => $_POST['about_me'],
            'photo' => $filename ,
            ])
            ->where('id', '=',  $_SESSION['userId'])
            ->set();

        unset($_SESSION['userId']);
       
        echo json_encode(['success' => 1]);
        return;
    }


}