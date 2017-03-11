<?php
/**
 * Created by Aid on 7/01/2016 1:35 PM.
 */

require_once 'core/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');