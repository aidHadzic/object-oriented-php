<?php

require_once 'core/init.php';

$user = new User();

$id = $user->data()->id;

$user -> displayCourses($id);

