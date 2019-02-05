<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', __DIR__);
require_once ROOT . '/lib/Rout.php';

$rout = new Rout();
$rout->route('GET', '/signIn', 'signIn');
$rout->route('GET', '/user/{id}', 'userPage');
$rout->route('POST', '/verifyUser', 'verifyUser');
$rout->route('GET', '/users', 'showUsers');
$rout->route('GET', '/editUser/{userName}', 'editUser');
$rout->route('POST', '/updateUser/{id}', 'updateUser');
$rout->route('GET', '/signUp', 'signUp');
$rout->route('POST', '/checkUser', 'checkUser');
$rout->route("POST", '/addToDB', 'addToDB');
$rout->route('DELETE', '/deleteUser/{id}', 'deleteUser');
$rout->route('GET', '/', 'main');
$rout->route('GET', '/logOut', 'logOut');