<?php

require_once 'lib/Rout.php';

$rout = new Rout();
$rout->route('GET', '/signIn', 'signIn');
$rout->route('GET', '/user/{id}', 'userPage');
$rout->route('GET', '/users', 'allUsers');
