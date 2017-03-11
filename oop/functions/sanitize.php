<?php
/**
 * Created by Aid on 7/01/2016 1:13 PM.
 */

require_once 'core/init.php';

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}