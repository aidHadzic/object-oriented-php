<?php
/**
 * Created by Aid on 6/29/2016 2:29 PM.
 */

class Config {
    
    
    // umjesto $GLOBALS['config']['mysql']['host'] omogucava koristenje mzsql/host
    public static function get($path = null) {
        if ($path){
            $config = $GLOBALS['config'];
            
            //explode funkcija uklanja '/' iz $path varijable
            $path = explode('/', $path);

            foreach($path as $bit) {
                if(isset($config[$bit])) {
                    $config = $config[$bit];
                }
            }

            return $config;
        }

        return false;
    }
}
