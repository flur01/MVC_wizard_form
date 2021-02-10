<?php


$router->get('', 'GetController@addUser');

$router->get('all-members', 'GetController@allMembers');


$router->post('add-user', 'PostController@addUser');

$router->post('add-info', 'PostController@addInfo');
