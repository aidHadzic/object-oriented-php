<?php
/**
 * Created by Aid on 7/01/2016 2:39 PM.
 */

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
?>

<p>Hello, <a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></a></p>
<p>You can also check your courses at <a href="courses.php?user=<?php echo escape($user->data()->username);?>">this link</a></p>
    <ul>
        <li><a href="update.php">Update Profile</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
<?php

    if($user->hasPermission('admin')) {
        echo '<p>You are a Administrator!</p>';
    }

} else {
    echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register.</a></p>';
}