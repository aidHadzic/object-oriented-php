<?php
/**
 * Created by Aid on 6/30/2016 4:25 PM.
 */

class Hash {
    
    //funkcija koja hashuje odredjeni string, dodavajuci vrijednost $salt varijable
    public static function make($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    //funkcija koja generise salt
    public static function salt($length) {
        return mcrypt_create_iv($length);
    }

    //funkcija koja pravi jedinstveni id
    public static function unique() {
        return self::make(uniqid());
    }
}