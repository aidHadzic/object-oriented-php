<?php
/**
 * Created by Aid on 7/01/2016 1:39 PM.
 */

require_once 'core/init.php';

if(!$username = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User($username);

    if(!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/profilestyle.css">
    </head>
    <body>
        <header>
            <p>International University of Sarajevo</p>
        </header>
        <h3><?php echo escape($data->username); ?></h3>
        <p>Name: <?php echo escape($data->name); ?></p>
    </body>
</html>
<?php
    }
}